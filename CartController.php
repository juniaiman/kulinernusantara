<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Cart;


class CartController extends Controller
{
    public function view()
    {
        $dataCarts = Cart::where('email', [auth()->user()->email])->get();
        $i = 0;
        $a = 0;
        $b = 0;
        $c = 0;
        foreach($dataCarts as $key)
        {
            $data[$i++] = $key['slug'];
            $dataid[$b++] = $key['id'];
            $dataItems[] = Item::find($data[$a++]);
            $dataCart[] = Cart::find($dataid[$c++]);

        }
        return view('keranjang2',[
            'title' => 'FYP',
            'active' => 'Cart',
            'dataItems' => $dataItems ?? null,
            'dataCart' => $dataCart ?? null,
        ]);
    }

    public function addCart(Request $request)
    {
        $itemData = Item::find($request->input('slug'));
        if($itemData)
        {
            $data = Cart::where('email', [auth()->user()->email])->where('slug', [$request->input('slug')])->get();
            if(!$data->isEmpty())
            {
                foreach($data as $item)
                {
                    $item->qty = $item->qty + $request->input('qty');
                    $item->save();
                    
                    return redirect()->route('cart')->with('cartIncreament', 'Item succes');
                }
            }
            else{
                $item = new Cart;
                $item->slug = $itemData->slug;
                $item->qty = $request->input('qty');
                $item->email = Auth()->user()->email;
                $item->save();
    
                return redirect()->route('cart')->with('cartSuccess', 'Item succes add to cart');
            }
        }
    }
}
