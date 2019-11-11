<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoriesController extends Controller
{
    public function index()
    {
        return view('calendars.inventories.index');
    }
}
