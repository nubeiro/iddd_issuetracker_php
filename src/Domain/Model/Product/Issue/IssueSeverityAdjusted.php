<?php

namespace Issuetracker\Domain\Model\Product;


use Issuetracker\Domain\Event\Event;
use Issuetracker\Domain\Model\Product\Issue\IssueId;
use Issuetracker\Domain\Model\Product\Issue\Severity;
use Issuetracker\Domain\Model\Product\Tenant\TenantId;

class IssueSeverityAdjusted extends Event
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
     * @var Severity
     */
    private $currentSeverity;

    /**
     * @var Severity
     */
    private $previousSeverity;


    public function __construct(
        TenantId $tenantId,
        ProductId $productId,
        IssueId $issueId,
        Severity $currentSeverity,
        Severity $previousSeverity
    ) {

        $this->tenantId = $tenantId;
        $this->productId = $productId;
        $this->issueId = $issueId;
        $this->currentSeverity = $currentSeverity;
        $this->previousSeverity = $previousSeverity;
        $this->eventVersion = 1;
        $this->occurredOn = new \DateTimeImmutable();
    }

    public function currentSeverity() :Severity
    {
        return $this->currentSeverity;
    }

    public function issueId():IssueId
    {
        return $this->issueId;
    }
    
    public function previousSeverity() :Severity
    {
        return $this->previousSeverity;
    }

    public function productId() :ProductId
    {
        return $this->productId;
    }

    public function tenantId() :TenantId
    {
        return $this->tenantId;
    }
}