<?php

namespace App\Services\Products\Delete;

use App\Repositories\Products\PdoProductRepository;
use App\Repositories\Products\ProductRepository;

class DeleteProductService
{
    private ProductRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoProductRepository();
    }

    public function execute(DeleteProductRequest $request)
    {
        $this->repo->deleteById($request->getVars());
    }
}