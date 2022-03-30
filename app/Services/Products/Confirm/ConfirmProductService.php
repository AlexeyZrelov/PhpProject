<?php

namespace App\Services\Products\Confirm;

use App\Repositories\Products\PdoProductRepository;
use App\Repositories\Products\ProductRepository;

class ConfirmProductService
{
    private ProductRepository $repo;

    public function __construct()
    {
        $this->repo = new PdoProductRepository();
    }

    public function execute(ConfirmProductRequest $req)
    {
        $this->repo->confirm($req->getName(), $req->getDescription(), $req->getPrice(), $req->getAmount(), $req->getDate(), $req->getId());
    }

}