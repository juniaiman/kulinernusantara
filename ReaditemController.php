<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Favorit;




class ReaditemController extends Controller
{
    public function view()
    {
        $dataItems = Item::all();
        return view('adminBarang', 
        [
            'title' => 'FYP',
            'active' => 'AdminBarang',
            'items' =>  $dataItems ?? NULL,
            'data' => json_encode(Item::all()),
            'no' => 0,
        ]);
    }

    public function menuPage()
    {

        return view('menupage', 
        [
            'title' => 'FYP',
            'active' => 'MenuPage',
            'items' => Item::all(),
        ]);
    }

    public function detail($slug){
        $item = Item::find($slug);

        if($item)
        {
            return view('detailProduk', [
                'title' => 'FYP',
                'active' => 'Product Detail',
                'item' => $item
            ]);
        }
        else
        {
            redirect()->back()->with('error', 'Item Not Found');
        }
    }
}
