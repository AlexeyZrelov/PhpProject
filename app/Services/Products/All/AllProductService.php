<?php

namespace App\Services\Products\All;

use App\Repositories\Products\PdoProductRepository;
use App\Repositories\Products\ProductRepository;

class AllProductService
{
    private ProductRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoProductRepository();
    }

    public function execute(AllProductRequest $request): array
    {
        return $this->repo->all();
    }
}