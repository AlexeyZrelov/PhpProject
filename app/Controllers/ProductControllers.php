<?php

namespace App\Controllers;

use App\Redirect;
use App\Services\Products\All\AllProductRequest;
use App\Services\Products\All\AllProductService;
use App\Services\Products\Buy\BuyProductRequest;
use App\Services\Products\Buy\BuyProductService;
use App\Services\Products\Confirm\ConfirmProductRequest;
use App\Services\Products\Confirm\ConfirmProductService;
use App\Services\Products\Delete\DeleteProductRequest;
use App\Services\Products\Delete\DeleteProductService;
use App\Services\Products\Insert\InsertProductRequest;
use App\Services\Products\Insert\InsertProductService;
use App\View;

class ProductControllers
{
    private InsertProductService $insertProductService;
    private AllProductService $allProductService;
    private DeleteProductService $deleteProductService;
    private BuyProductService $buyProductService;
    private ConfirmProductService $confirmProductService;

    public function __construct(InsertProductService $insertProductService, AllProductService $allProductService, DeleteProductService $deleteProductService, BuyProductService $buyProductService, ConfirmProductService $confirmProductService)
    {
        $this->insertProductService = $insertProductService;
        $this->allProductService = $allProductService;
        $this->deleteProductService = $deleteProductService;
        $this->buyProductService = $buyProductService;
        $this->confirmProductService = $confirmProductService;
    }

    public function index(): View
    {

        $result = $this->allProductService->execute(new AllProductRequest());

        return new View('Products/index.html', [

            'results' => $result

        ]);
    }

    public function add(): Redirect
    {

        $this->insertProductService->execute(new InsertProductRequest($_POST['name'], $_POST['description'], $_POST['price'], $_POST['amount'], $_POST['date']));

        return new Redirect('/product');
    }

    public function delete(array $vars): Redirect
    {

        $this->deleteProductService->execute(new DeleteProductRequest($vars));

        return new Redirect('/product');
    }

    public function buy(array $vars): View
    {

        $result = $this->buyProductService->execute(new BuyProductRequest($vars));

        return new View('Products/buy.html', [

            'results' => $result

        ]);
    }

    public function confirm(): Redirect
    {

        $this->confirmProductService->execute(new ConfirmProductRequest($_POST['name'], $_POST['description'], $_POST['price'], $_POST['amount'], $_POST['date'], $_POST['id']));

        return new Redirect('/product');
    }
}