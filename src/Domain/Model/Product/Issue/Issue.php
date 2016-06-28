<?php
namespace Issuetracker\Domain\Model\Product\Issue;

use Issuetracker\Domain\Model\Product\ProductId;
use Issuetracker\Domain\Model\Product\Tenant\TenantId;

class Issue
{
    /**
     * @var string
     */
    private $assignedBacklogItemId;

    /**
     * @var string
     */
    private $description;

    /**
     * @var IssueId
     */
    private $issueId;

    /**
     * @var ProductId
     */
    private $productId;

    /**
     * @var Severity
     */
    private $severity;

    /**
     * @var string
     */
    private $summary;

    /**
     * @var TenantId
     */
    private $tenantId;

    /**
     * @var IssueType
     */
    private $type;

    public function __construct(
        TenantId $tenantId,
        ProductId $productId,
        IssueId $issueId,
        string $description,
        string $summary,
        IssueType $type,
        Severity $severity
    )
    {
        $this->tenantId = $tenantId;
        $this->productId = $productId;
        $this->issueId = $issueId;
        $this->description = $description;
        $this->summary = $summary;
        $this->type = $type;
        $this->severity = $severity;
//@todo fix this with some PHP flavor
//        DomainEventPublisher.instance().publish(
//            new IssueReported(
//                this.tenantId(), this.productId(), this.issueId(),
//                this.description(), this.summary(), this.type(), this.severity()));

    }

    public function changeDescription(string $description)
    {
        $this->description = $description;
    }

    public function changeSummary(string $summary)
    {
        $this->summary = $summary;
    }

    public function changeType(IssueType $type)
    {
        $this->type = $type;
    }

    public function description() :string
    {
        return $this->description;
    }

    public function isDefect() :bool
    {
        return $this->type->isDefect();
    }

    public function isFeatureRequest() :bool
    {
        return $this->type->isFeatureRequest();
    }

    public function isHighSeverity() :bool
    {
        return $this->severity == Severity::HIGH;
    }

    public function isMediumSeverity() :bool
    {
        return $this->severity == Severity::MEDIUM;
    }

    public function isLowSeverity() :bool
    {
        return $this->severity == Severity::LOW;
    }

    public function productId() :ProductId
    {
        return $this->productId;
    }

    public function issueId() :IssueId
    {
        return $this->issueId;
    }

    public function severity() :Severity
    {
        return $this->severity;
    }

    public function summary() :string
    {
        return $this->summary;
    }

    public function tenantId() :TenantId
    {
        return $this->tenantId;
    }

    public function type() :IssueType
    {
        return $this->type;
    }
}