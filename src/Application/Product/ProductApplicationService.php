<?php

namespace Issuetracker\Application\Product;


use Issuetracker\Domain\Model\Product\IssueAssigner;
use Issuetracker\Domain\Model\Product\Product;
use Issuetracker\Domain\Model\Product\ProductId;
use Issuetracker\Domain\Model\Product\ProductManager;
use Issuetracker\Domain\Model\Product\ProductRepository;
use Issuetracker\Domain\Model\Product\Tenant\TenantId;

class ProductApplicationService
{
    /**
     * @var ProductRepository
     */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function createProduct(
        string $tenantId,
        string $name,
        string $description,
        string $productManagerId,
        string $issueAssignerId
    ) {
        $product = new Product(
                new TenantId($tenantId),
                new ProductId(),
                $name,
                $description,
                new ProductManager($productManagerId),
                new IssueAssigner($issueAssignerId)
            );

        $this->productRepository->save($product);
    }

}