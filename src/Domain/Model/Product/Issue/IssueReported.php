<?php

namespace Issuetracker\Domain\Model\Product\Issue;


use Issuetracker\Domain\Event\Event;
use Issuetracker\Domain\Model\Product\ProductId;
use Issuetracker\Domain\Model\Product\TenantId;

class IssueReported extends Event
{
    /**
     * @var TenantId
     */
    private $tenantId;

    /**
     * @var ProductId
     */
    private $productId;

    /**
     * @var IssueId
     */
    private $issueId;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $summary;

    /**
     * @var IssueType
     */
    private $type;

    /**
     * @var Severity
     */
    private $severity;

    public function __construct(
        TenantId $tenantId,
        ProductId $productId,
        IssueId $issueId,
        string $description,
        string $summary,
        IssueType $type,
        Severity $severity
    ) {
        $this->tenantId = $tenantId;
        $this->productId = $productId;
        $this->issueId = $issueId;
        $this->description = $description;
        $this->summary = $summary;
        $this->type = $type;
        $this->severity = $severity;
        $this->eventVersion = 1;
        $this->occurredOn = new \DateTimeImmutable();
    }

    public function getDescription() :string
    {
        return $this->description;
    }


    public function getIssueId() :IssueId
    {
        return $this->issueId;
    }

    public function getProductId() :ProductId
    {
        return $this->productId;
    }

    public function getSeverity() :Severity
    {
        return $this->severity;
    }

    public function getSummary() :string
    {
        return $this->summary;
    }

    public function getTenantId() :TenantId
    {
        return $this->tenantId;
    }

    public function getType() :IssueType
    {
        return $this->type;
    }
}