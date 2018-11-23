<?php
/**
 * Created by PhpStorm.
 * User: FabulousPC
 * Date: 22/11/2018
 * Time: 17:40
 */

namespace App\Product;


use App\Entity\Product;

class ProductFactory
{
    public function handle(ProductRequest $productRequest): Product
    {
        $product = new Product();

        $product->setName($productRequest->getName());
        $product->setDescription($productRequest->getDescription());
        $product->setPrice($productRequest->getPrice());
        $product->setImage($productRequest->getImage());
        $product->setImage($productRequest->getImage());
    }
}