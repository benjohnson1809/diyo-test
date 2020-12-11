<?php

namespace App\Http\Controllers;

use App\Model\Inventory;
use Illuminate\Http\Request;
use Response;
use DataTables;

class InventoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function getAll()
     {
        $data = Inventory::All();
        return $this->sendResponse($data->toArray(),'Products retrieved successfully');
     }

    

}