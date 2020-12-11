<?php

use Illuminate\Database\Seeder;
use App\Model\Sales;
use App\Model\SalesProduct;

class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    // set data for product and product variant
    protected $data = [
       ["total_price"=> 57000,"payment_method"=>"OVO",
        "product"=>[
   					 ["id_product"=> 1,"id_variant"=> 1],
   					 ["id_product"=> 1,"id_variant"=> 2],
   					 ["id_product"=> 2,"id_variant"=> 4],
			   	   ]
   	   ],
    ];

    public function run()
    {
        foreach ($this->data as $key => $value) {
          $sales = new Sales;

          $sales->total_price = $value['total_price'];
          $sales->payment_method = $value['payment_method'];
          $sales->save();

          foreach ($value['product'] as $key => $product) {
          	$sales_product = new SalesProduct;

	        $sales_product->id_sales = $sales->id;
	        $sales_product->id_product = $product['id_product'];
	        $sales_product->id_variant = $product['id_variant'];
	        $sales_product->save();
          }
        }
    }
}
