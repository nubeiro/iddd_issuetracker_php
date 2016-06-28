<?php

namespace Issuetracker\Domain\Model\Product;


use Issuetracker\Domain\Model\Product\Tenant\TenantId;

interface ProductRepository
{
    public function allProductsOfTenant(TenantId $tenantId) :array;

    public function save(Product $product) :void;
}