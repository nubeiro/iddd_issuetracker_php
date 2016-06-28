<?php

namespace Issuetracker\Domain\Model\Product\Issue;

use Issuetracker\Domain\Event\Event;
use Issuetracker\Domain\Model\Product\ProductId;
use Issuetracker\Domain\Model\Product\Tenant\TenantId;

class IssueAssignedToNewBacklogItem extends Event
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
     * @var IssueType
     */
    private $issueType;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $summary;

    public function __construct(
        TenantId $tenantId,
        ProductId $productId,
        IssueId $issueId,
        IssueType $issueType,
        string $description,
        string $summary
    ) {
        $this->tenantId = $tenantId;
        $this->productId = $productId;
        $this->issueId = $issueId;
        $this->issueType = $issueType;
        $this->description = $description;
        $this->summary = $summary;
    }

    public function description() :string
    {
        return $this->description;
    }

    public function issueId() :IssueId
    {
        return $this->issueId;
    }

    public function issueType() :IssueType
    {
        return $this->issueType;
    }
    
    public function productId() :ProductId
    {
        return $this->productId;
    }

    public function summary() :string
    {
        return $this->summary;
    }

    public function tenantId() :TenantId
    {
        return $this->tenantId;
    }
}