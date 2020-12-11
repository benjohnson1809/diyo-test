<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// call list of seeder
        $this->call('ProductSeeder');
        $this->call('ClientSeeder');
        $this->call('SalesSeeder');
        $this->call('InventorySeeder');

    }
}
