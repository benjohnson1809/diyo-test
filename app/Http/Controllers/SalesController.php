<?php

namespace App\Http\Controllers;

use App\Model\Sales;
use App\Model\SalesProduct;
use App\Model\Product;
use App\Model\ProductVariant;
use Illuminate\Http\Request;
use Response;
use DataTables;

class SalesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function getAll()
     {
        // get all data sales
        $data = Sales::All();
        foreach ($data as $keyX => $sales) {
            // get data product where has relationship with sales
            $id_product = SalesProduct::where('id_sales',$sales->id)
                          ->groupBy('id_product')->get(['id_product']);
            $in_id_product = [];

            foreach ($id_product as $key => $value) {
              $in_id_product[$key] = $value->id_product;
            }
            // manual mapping carts to sales
            $data[$keyX]->carts = Product::whereIn('id',$in_id_product)->get();
            foreach ($data[$keyX]->carts as $keyY => $product) {
                // get data variant where has relationship with sales and product

                $id_variant = SalesProduct::where([['id_sales',$sales->id],['id_product',$product->id]])
                              ->groupBy('id_variant')->get(['id_variant']);
                $in_id_variant = [];
                foreach ($id_variant as $keyZ => $variant) {
                    $in_id_variant[$keyZ] = $variant->id_variant;
                }
                
              //  manual mapping variant to carts
               $data[$keyX]->carts[$keyY]->variant = ProductVariant::whereIn('id',$in_id_variant)->get();
            }
        }
        return $this->sendResponse($data->toArray(),'Products retrieved successfully');
     }

    

}