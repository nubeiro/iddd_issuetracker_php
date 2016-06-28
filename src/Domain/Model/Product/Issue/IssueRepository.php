<?php

namespace Issuetracker\Domain\Model\Product;

use Issuetracker\Domain\Model\Product\Tenant\TenantId;

interface IssueRepository
{
    /**
     * @param TenantId $tenantId
     * @param ProductId $productId
     * @return array of Issue's
     */
    public function allOutstandingDefectsOfProduct(
        TenantId $tenantId,
        ProductId $productId
    ) :array;
}