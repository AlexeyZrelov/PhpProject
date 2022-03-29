<?php

namespace App\Services\Products\Buy;

use App\Repositories\Products\PdoProductRepository;
use App\Repositories\Products\ProductRepository;

class BuyProductService
{
    private ProductRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoProductRepository();
    }

    public function execute(BuyProductRequest $request): array
    {
        return $this->repo->buyId($request->getVars());
    }
}