<?php


namespace Issuetracker\Domain\Model\Product;


use Issuetracker\Domain\Model\Product\Tenant\TenantId;

class ProductDefectivenessRanker
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @todo missing implementation
     *
     * @param TenantId $tenantId
     * @param SeverityWeights $severityWeights
     * @return ProductDefectiveness
     */
    public function mostDefectiveProduct(
        TenantId $tenantId,
        SeverityWeights $severityWeights
    ) :ProductDefectiveness
    {

        return null;
    }

    public function rankedDefectiveProducts(
        TenantId $tenantId,
        SeverityWeights $severityWeights
    ) :array
    {

        return null;
    }

    private function allProductsOfTenant(TenantId $tenantId) :array
    {
        return $this->productRepository->allProductsOfTenant($tenantId);
    }
}