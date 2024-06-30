<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class KategoriController extends Controller
{
    public function viewkategori($origin)
    {
        $items = Item::where('origin', $origin)->get();
        $title = 'FYP';
        $active = $origin;

        return view('kategori', compact('items', 'title', 'active', 'origin'));
    }
}
