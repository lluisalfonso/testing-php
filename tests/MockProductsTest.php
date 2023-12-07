<?php

use App\ProductRepository;
use PHPUnit\Framework\TestCase;

class MockProductsTest extends TestCase
{

    /** @group db */
    public function testMockProductsAreReturned()
    {
        $mockRepo = $this->createMock(ProductRepository::class);

        $mockProductsArray = [
            ['id' => 1, 'name' => 'Acme Radio Knobs'],
            ['id' => 2, 'name' => 'Apple iPhone']
        ];

        $mockRepo->method('fetchProducts')->willReturn($mockProductsArray);

        $prodcuts = $mockRepo->fetchProducts();

        $this->assertEquals('Acme Radio Knobs', $prodcuts[0]['name']);
    }
}