<?php

namespace App\Controllers;

use App\Redirect;
use App\Services\Comment\Delete\DeleteCommentService;
use App\Services\Products\All\AllProductRequest;
use App\Services\Products\All\AllProductService;
use App\Services\Products\Buy\BuyProductRequest;
use App\Services\Products\Buy\BuyProductService;
use App\Services\Products\Delete\DeleteProductRequest;
use App\Services\Products\Delete\DeleteProductService;
use App\Services\Products\Insert\InsertProductRequest;
use App\Services\Products\Insert\InsertProductService;
use App\View;

class ProductControllers
{
    public function index(): View
    {

        $srv = new AllProductService();
        $result = $srv->execute(new AllProductRequest());

        return new View('Products/index.html', [

            'results' => $result

        ]);
    }

    public function add(): Redirect
    {

        $srv = new InsertProductService();
        $srv->execute(new InsertProductRequest($_POST['name'], $_POST['description'], $_POST['price'], $_POST['amount'], $_POST['date']));

        return new Redirect('/product');
    }

    public function delete(array $vars): Redirect
    {
        $srv = new DeleteProductService();
        $srv->execute(new DeleteProductRequest($vars));

        return new Redirect('/product');
    }

    public function buy(array $vars): View
    {

        $srv = new BuyProductService();
        $result = $srv->execute(new BuyProductRequest($vars));

        return new View('Products/buy.html', [

            'results' => $result

        ]);
    }

}