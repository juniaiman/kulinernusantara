<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Item;

class checkoutController extends Controller
{
    public function checkout(Request $request)
    {
        switch ( $request->input('action') )
        {
            case 'increament':
                $cart = Cart::find($request->input('idCart'));
                $cart->qty = $cart->qty + 1;
                $cart->save();

                return redirect()->route('cart.add');
                break;
            case 'decreament':
                $cart = Cart::find($request->input('idCart'));
                $cart->qty = $cart->qty - 1;
                $cart->save();

                return redirect()->route('cart.add');
                break;
            case 'delete':
                $cart = Cart::find($request->input('idCart'));
                $cart->delete();

                return back()->with("deleteCart", "Delete cart success");
                break;
            case 'checkout':
                $validate = $request->validate([
                    'itemCart' => 'required',
                ]);
                foreach($validate as $data)
                {
                    $slug = $data;
                    $dataItems = Item::whereIn('slug', $slug)->get();
                    $dataCarts = Cart::whereIn('slug', $slug)->where('email', [auth()->user()->email])->get();
                }
                
                $totalHarga = $request->input('totalHarga');
                $totalItem = $request->input('totalItem');
                $title = "FYP";
                $active = "Checkout";
                
                session()->put('slug', $slug);
                
                session()->put('totalHarga', $totalHarga);
                
                session()->put('totalItem', $totalItem);

                session()->put('from', "checkout");


                return redirect()->route('checkout');
                break;
        }
        
    }

    public function buyNow(Request $request)
    {
        $validate = $request->validate([
            'qty' => 'required',
        ]);

        $slug[] = $request->input('slug');

        session()->put('totalHarga', $request->input('totalHarga') * $request->input('qty'));

        session()->put('slug', $slug);
        $qty = session()->put('totalQtyBuyNow', $request->input('qty'));

        session()->put('buyNow', TRUE);

        session()->put('from', "buyNow");

        return redirect()->route('checkout');

    }

    public function checkoutView()
    {
        if(session()->has('slug'))
        {
            $slugSession = session()->get('slug');
            $totalHargaSession = session()->get('totalHarga');
            $buyNow = session()->get('buyNow');
            $totalqtyBuyNow= session()->get('totalQtyBuyNow');
            $from = session()->get('from');

            if($from != 'buyNow')
            {
                session()->forget('buyNow');
            }
            
            foreach($slugSession as $data)
            {
                $slug[] = $data;
                $dataItems = Item::whereIn('slug', $slug)->get();
                $dataCarts = Cart::whereIn('slug', $slug)->where('email', [auth()->user()->email])->get();
            }
    
            $totalHarga = $totalHargaSession;
            session()->put('total', $totalHargaSession + 10000 + 2000);
            foreach($dataCarts as $data)
            {
                $qty = $data;
                $totalQty[] = $qty['qty'];
            }
            session()->put('totalQty', $totalQty);
            $qty = (array_sum(session()->get('totalQty')));
            $total = session()->get('total');
            $title = "FYP";
            $active = "Checkout";


    
            return view('beliproduk', compact('buyNow','totalqtyBuyNow','dataCarts','dataItems','totalHarga', 'total', 'qty' , 'title', 'active'));
        }else{

            return redirect()->route('cart');
        }
    }
}
