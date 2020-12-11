<?php

use Illuminate\Database\Seeder;
use App\Model\Product;
use App\Model\ProductVariant;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    // set data for product and product variant
   	protected $data = [
       ["name"=>"Nasi Goreng","price"=>20000,"description"=>"Nasi goreng dengan ayam,sosis dan campuran sayuran"
   	   ,"product_variant"=>[
		   	   					["name"=>"Original","additional_price"=>0],
		   	   					["name"=>"Extra Pedas","additional_price"=>2000],
   	   						]
   	   ],
   	   ["name"=>"Nasi Uduk","price"=>25000,"description"=>"Nasi uduk dengan ayam serundeng,tempe dan sambal kacang serta dui tambah dengan berbagai sayuran"
   	   ,"product_variant"=>[
		   	   					["name"=>"Original","additional_price"=>0],
		   	   					["name"=>"Semur","additional_price"=>10000],
   	   						]
        ],
        ["name"=>"Ayam Rica","price"=>30000,"description"=>"Ayam rica-rica adalah salah satu makanan khas Manado, rica berasal dari bahasa Manado yang berarti pedas"
   	    ,"product_variant"=>[
		   	   					["name"=>"Original","additional_price"=>0],
		   	   					["name"=>"Ayam Satu ekor ","additional_price"=>15000],
   	   						]
        ],
        ["name"=>"Ayam Woku","price"=>40000,"description"=>"Ayam woku dengan bumbu kuning pedas adalah favoritnya di masakan Minahasa."
   	    ,"product_variant"=>[
		   	   					["name"=>"Original","additional_price"=>0],
		   	   					["name"=>"Pedas","additional_price"=>2000],
   	   						]
        ],
        ["name"=>"Sambal Roa","price"=>15000,"description"=>"Sambal Roa Asli Manado Pedas Mantap."
   	    ,"product_variant"=>[
		   	   					["name"=>"Original","additional_price"=>0],
		   	   					["name"=>"Extra Pedas","additional_price"=>1000],
   	   						]
        ],
        ["name"=>"Es Pisang Ijo","price"=>10000,"description"=>"Es Pisang Ijo terbuat dari bahan utama pisang yang dibalut dengan adonan tepung berwarna hijau"
   	    ,"product_variant"=>[
		   	   					["name"=>"No Ice","additional_price"=>0],
		   	   					["name"=>"Extra Sugar","additional_price"=>1000],
   	   						]
        ],
        ["name"=>"Es Kacang Merah","price"=>15000,"description"=>"Es kacang merah adalah sebuah minuman yang umum ditemukan di Hong Kong dengan isian kacang merah"
   	    ,"product_variant"=>[
		   	   					["name"=>"Less Ice","additional_price"=>0],
		   	   					["name"=>"Less Sugar","additional_price"=>1000],
   	   						]
        ],
        ["name"=>"Bubur sumsum","price"=>22000,"description"=>"Bubur sumsum adalah sejenis makanan berupa bubur berwarna putih yang terbuat dari tepung beras dan dimakan dengan kuah manis"
   	    ,"product_variant"=>[
		   	   					["name"=>"Original","additional_price"=>0],
   	   						]
        ],
        ["name"=>"Kolak","price"=>10000,"description"=>"Kolak atau kolek adalah makanan asal Indonesia berbahan dasar pisang atau ubi jalar yang direbus dengan santan dan gula aren."
   	    ,"product_variant"=>[
		   	   					["name"=>"Original","additional_price"=>0],
   	   						]
        ],
        ["name"=>"Es Cendol","price"=>15000,"description"=>"Cendol merupakan minuman penutup es manis yang mengandung tetesan tepung beras hijau, santan, dan sirup gula aren."
   	    ,"product_variant"=>[
		   	   					["name"=>"Original","additional_price"=>0],
   	   						]
        ],     
    ];

    public function run()
    {
        foreach ($this->data as $key => $value) {
          $product = new Product;

          $product->name = $value['name'];
          $product->price = $value['price'];
          $product->description = $value['description'];
          $product->save();

          foreach ($value['product_variant'] as $key => $variant) {
          	$product_variant = new ProductVariant;

	        $product_variant->id_product = $product->id;
	        $product_variant->name = $variant['name'];
	        $product_variant->additional_price = $variant['additional_price'];
	        $product_variant->save();
          }
        }
    }
}
