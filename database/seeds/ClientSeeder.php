<?php

use Illuminate\Database\Seeder;
use App\Model\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // set data for product and product variant
    protected $data = [
       ["name"=>"Resto Kribo"],
    ];

    public function run()
    {
        foreach ($this->data as $key => $value) {
          $client = new Client;
          $key = 'client-'.\Illuminate\Support\Str::random(32); //generate key for api token

          $client->name = $value['name'];
          $client->api_token = $key;
          $client->save();
        }
    }
}
