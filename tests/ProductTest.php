<?php

use Issuetracker\Domain\Model\Product\Issue\Issue;
use Issuetracker\Domain\Model\Product\Issue\IssueType;
use Issuetracker\Domain\Model\Product\Issue\Severity;
use Issuetracker\Domain\Model\Product\IssueAssigner;
use Issuetracker\Domain\Model\Product\Product;
use Issuetracker\Domain\Model\Product\ProductManager;
use Issuetracker\Domain\Model\Product\Release\DefectsStatistics;
use Issuetracker\Domain\Model\Product\Release\KLOCMeasurement;
use Issuetracker\Domain\Model\Product\Tenant\TenantId;
use Issuetracker\Domain\Model\Product\ProductId;
use Issuetracker\Domain\Model\Product\Issue\IssueId;
use Rhumsaa\Uuid\Uuid;

class ProductTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Product
     */
    private $product;

    public function setUp()
    {
        $tenantId = new TenantId(Uuid::uuid4());
        $productId = new ProductId();
        $sampleDefects = [
            new Issue(
                $tenantId,
                $productId,
                new IssueId('xyz'),
                'my test',
                'my summary',
                new IssueType(IssueType::DEFECT),
                new Severity(Severity::HIGH)
            ),
            new Issue(
                $tenantId,
                $productId,
                new IssueId('abc'),
                'my test',
                'my summary',
                new IssueType(IssueType::DEFECT),
                new Severity(Severity::HIGH)
            )
        ];
        $this->product = new Product(
            $tenantId,
            $productId,
            'my awesome product',
            'this is really awesome, seriously',
            new ProductManager(Uuid::uuid4()),
            new IssueAssigner(Uuid::uuid4()),
            $sampleDefects
        );
    }

    public function testDetermineDefectStatistics()
    {
        $expected = 0.1;
        $actual = $this->product->determineStatistics(new KLOCMeasurement(20));
        $this->assertInstanceOf(DefectsStatistics::class, $actual);
        $this->assertEquals(
            $expected,
            $actual->defectDensity()
        );

    }

    public function testReportDefect()
    {
        $this->product->reportDefect();

        $this->assertAttributeCount(
            3,
            'knownDefects',
            $this->product
        );
    }
}
