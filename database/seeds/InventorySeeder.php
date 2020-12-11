<?php

use Illuminate\Database\Seeder;
use App\Model\Inventory;

class InventorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // set default data for storing in database
    protected $data = [
       ["name"=>"Rice","price"=>1000000,"amount"=>70,"unit"=>"Litres"],
       ["name"=>"Chilie","price"=>200000,"amount"=>5,"unit"=>"Kg"],
       ["name"=>"Chiken","price"=>35000,"amount"=>30,"unit"=>"Pieces"],
    ];

    public function run()
    {
    	// insert data
        foreach ($this->data as $key => $value) {
          $inventory = new Inventory;

          $inventory->name = $value['name'];
          $inventory->price = $value['price'];
          $inventory->amount = $value['amount'];
          $inventory->unit = $value['unit'];
          $inventory->save();
        }
    }
}
