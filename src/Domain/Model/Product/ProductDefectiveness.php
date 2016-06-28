<?php

namespace Issuetracker\Domain\Model\Product;


use Issuetracker\Domain\Model\Product\Tenant\TenantId;

class ProductDefectiveness
{
    /**
     * @var float
     */
    private $defectRanking;

    /**
     * @var string
     */
    private $name;

    /**
     * @var ProductId
     */
    private $productId;

    /**
     * @var TenantId
     */
    private $tenantId;

    public function __construct(
        Product $aProduct,
        float $aDefectRanking
    ) {
        $this->defectRanking = $aDefectRanking;
        $this->name = $aProduct->name();
        $this->productId = $aProduct->productId();
        $this->tenantId = $aProduct->tenantId();
    }

    public function defectRanking() :float
    {
        return $this->defectRanking;
    }

    public function name() :string
    {
        return $this->name;
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