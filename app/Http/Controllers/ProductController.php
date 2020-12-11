<?php

namespace App\Http\Controllers;

use App\Model\Product;
use Illuminate\Http\Request;
use Response;
use DataTables;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function getAll()
     {
        $products = Product::with('variants')->get();
        return $this->sendResponse($products->toArray(),'Products retrieved successfully');
     }

     
}