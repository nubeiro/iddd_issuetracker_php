<?php

namespace Issuetracker\Domain\Model\Product;

use Issuetracker\Domain\Model\Product\Issue\Issue;
use Issuetracker\Domain\Model\Product\Issue\IssueId;
use Issuetracker\Domain\Model\Product\Issue\IssueType;
use Issuetracker\Domain\Model\Product\Issue\Severity;
use Issuetracker\Domain\Model\Product\Release\DefectsStatistics;
use Issuetracker\Domain\Model\Product\release\KLOCMeasurement;
use Issuetracker\Domain\Model\Product\Release\Release;
use Issuetracker\Domain\Model\Product\Tenant\TenantId;

class Product
{
    /**
     * @var Release;
     */
    private $currentRelease;

    /**
     * @var TenantId
     */
    private $tenantId;

    /**
     * @var ProductId
     */
    private $productId;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var ProductManager
     */
    private $productManager;

    /**
     * @var IssueAssigner
     */
    private $issueAssigner;

    /**
     * @var SeverityTotals
     */
    private $severityTotals;

    /**
     * Product constructor.
     * @param TenantId $tenantId
     * @param ProductId $productId
     * @param string $name
     * @param string $description
     * @param ProductManager $productManager
     * @param IssueAssigner $issueAssigner
     */
    public function __construct(
        TenantId $tenantId,
        ProductId $productId,
        string $name,
        string $description,
        ProductManager $productManager,
        IssueAssigner $issueAssigner
    ) {

        $this->description = $description;
        $this->issueAssigner = $issueAssigner;
        $this->name = $name;
        $this->productId = $productId;
        $this->productManager = $productManager;
        $this->severityTotals = new SeverityTotals(0, 0, 0);
        $this->tenantId = $tenantId;
    }


    public function determineStatistics(KLOCMeasurement $kloc)
    {
        $totalDefects = 0;
        /**
         * @var Issue $issue
         */
        $totalDefects = $this->knownDefects($totalDefects);

        return new DefectsStatistics($totalDefects, $kloc);
    }

    public function reportDefect(string $summary, string $description)
    {
        return new Issue(
            $this->tenantId,
            $this->productId,
            new IssueId('xxxxxxyz'),
            $description,
            $summary,
            new IssueType(IssueType::DEFECT),
            new Severity(Severity::HIGH)
        );
    }

    /**
     * @todo this is broken
     * @param $totalDefects
     * @return mixed
     */
    private function knownDefects($totalDefects)
    {
        foreach ($this->releaseIssues as $issue) {
            if ($issue->isDefect()) {
                $totalDefects++;
            }
        }
        return $totalDefects;
    }

    public function currentRelease() :Release
    {
        return $this->currentRelease;
    }

    public function description() :string
    {
        return $this->description;
    }

    public function issueAssigner() :IssueAssigner
    {
        return $this->issueAssigner;
    }

    public function name() :string
    {
        return $this->name;
    }

    public function productId() :ProductId
    {
        return $this->productId;
    }

    public function productManager() :ProductManager
    {
        return $this->productManager;
    }

    public function tenantId() :TenantId
    {
        return $this->tenantId;
    }
}