<?php

namespace App;

class Inventory
{
    private array $products;

    public function __construct(private ProductRepository $productRepo)
    {
    }

    public function setProducts()
    {
        $this->products = $this->productRepo->fetchProducts();
    }

    public function getProducts()
    {
        return $this->products;
    }
}