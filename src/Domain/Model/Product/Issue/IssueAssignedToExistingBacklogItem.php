<?php

namespace Issuetracker\Domain\Model\Product;

use Issuetracker\Domain\Event\Event;
use Issuetracker\Domain\Model\Product\Issue\IssueId;
use Issuetracker\Domain\Model\Product\Issue\IssueType;
use Issuetracker\Domain\Model\Product\Tenant\TenantId;

class IssueAssignedToExistingBacklogItem extends Event
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
    private $backlogItemId;

    public function __construct(
        TenantId $tenantId,
        ProductId $productId,
        IssueId $issueId,
        IssueType $issueType,
        string $backlogItemId
    ) {
        $this->tenantId = $tenantId;
        $this->productId = $productId;
        $this->issueId = $issueId;
        $this->issueType = $issueType;
        $this->backlogItemId = $backlogItemId;
    }

    public function backlogItemId() :string
    {
        return $this->backlogItemId;
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

    public function tenantId() :TenantId
    {
        return $this->tenantId;
    }
}