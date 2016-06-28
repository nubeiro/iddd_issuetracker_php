<?php

namespace Issuetracker\Domain\Model\Product;


class ProductManager
{
    /**
     * @var string
     */
    private $productManagerId;

    public function __construct(string $productManagerId)
    {
        $this->productManagerId = $productManagerId;
    }

    public function productManagerId() :string
    {
        return $this->productManagerId;
    }
    
}