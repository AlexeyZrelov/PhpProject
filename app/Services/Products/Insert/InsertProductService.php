<?php

namespace App\Services\Products\Insert;

use App\Repositories\Products\PdoProductRepository;
use App\Repositories\Products\ProductRepository;

class InsertProductService
{
    private ProductRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoProductRepository();
    }

    public function execute(InsertProductRequest $request)
    {
        $this->repo->add($request->getName(), $request->getDescription(), $request->getPrice(), $request->getAmount(), $request->getDate());
    }
}