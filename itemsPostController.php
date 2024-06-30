<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Cart;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class itemsPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin',
    [
        'title' => 'FYP',
        'active' => 'Admin'
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $item = new Item;
        $item->title = str::ucfirst($request->input('title'));
        $item->origin = $request->input('origin');  
        $item->stock = $request->input('stock');  
        $item->favorite = $request->input('favorite');  
        $item->sold = $request->input('sold');
        $item->thumbnail = $request->file('thumbnail')->store('thumbnail');  
        $item->price = $request->input('price');  
        $item->description = $request->input('description');  
        $item->save();

        return redirect()->back()->with('success', 'Succeed');
    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        // $items = Item::get();
        // foreach($items as $item){
        //     $title[] = $item->title;
        //     $origin[] = $item->origin;
        //     $stock[] = $item->stock;
        //     $rating[] = $item->rating;
        //     $sold[] = $item->sold;
        //     $thumbnail[] = $item->thumbnail;
        //     $slug[] = $item->slug;
        //     $price[] = $item->price;
        //     $description[] = $item->description;
        // }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        if ($item) {
            return view('adminBarang', compact('item'));
        } else {
            return redirect()->back()->with('error', 'Item Tidak Ditemukan');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item, $slug)
    {
        $itemSlug = Item::find($slug);
        if($itemSlug)
        {
            $itemSlug->title = str::ucfirst($request->input('title'));
            $itemSlug->origin = $request->input('origin');  
            $itemSlug->stock = $request->input('stock');  
            $itemSlug->favorite = $itemSlug->favorite;  
            $itemSlug->sold = $itemSlug->sold;  
            if ($request->hasFile('thumbnail')) {
                Storage::delete($itemSlug->thumbnail);
                $itemSlug->thumbnail = $request->file('thumbnail')->store('thumbnail');
            }
            $itemSlug->price = $request->input('price');  
            $itemSlug->description = $request->input('description');  
            $itemSlug->save();

            $cart = Cart::where('slug', $slug)->get();
            foreach($cart as $data)
            {
                $data->slug = $itemSlug->slug;
                $data->save();
            }


            return redirect()->route('item.store')->with('success', 'Item Berhasil Di Update');
        }
        else 
        {
            return redirect()->back()->with('error', 'Item Tidak Ditemukan');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }

    public function delete($slug){
        $item = Item::where('slug', $slug)->first();
        if ($item) {
            Storage::delete($item->thumbnail);
            $cart = Cart::where('slug', $slug)->get();
            foreach($cart as $data)
            {
                $data->delete();
            }
            $item->delete();
            return redirect()->back()->with('success', 'Item Berhasil Dihapus');
        } else {
            return redirect()->back()->with('error', 'Item Tidak Ditemukan');
        }
    }
}


