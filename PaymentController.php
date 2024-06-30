<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Item;

class PaymentController extends Controller
{
    public function view()
    {
            
            $total = session()->get('total');
            $slugSession = session()->get('slug');
            $qty = session()->get('totalQty');
            $orderNum = session()->get('orderNum');
    
            $title = "FYP";
            $active = "Payment";
    
            return view('buktipembayaran', compact('total', 'orderNum' ,'title', 'active'));

    }

    public function create(Request $request)
    {
        $total = session()->get('total');
        $slugSession = session()->get('slug');
        $qty = session()->get('totalQty');
        $validate = $request->validate([
            'bank' => 'required',
        ]);

        $num = range(0,99999);
        shuffle($num);
        $orderNum = array_slice($num, 0, 5);

        $order = new Order;
        $order->slug =  implode(',',$slugSession);
        $order->qty =  implode(',', $qty);
        $order->total =  $total;
        $order->note =  $request->input('note');
        $order->method =  $request->input('bank');
        $order->status =  "Waiting for payment";
        $order->email =  auth()->user()->email;
        $order->OrderNum = implode($orderNum);
        $order->save();

        session()->put('orderNum', implode($orderNum));
        return redirect()->route('user.payment');
    }



    public function createPay($orderNum)
    {
        $datas = Order::where('orderNum', $orderNum)->get();
        foreach ($datas as $data)
        {
            $qtys = array_map('intval', explode(',', $data['qty']));
            $slugs = array_map('strval', explode(',', $data['slug']));
            $total = $data->total;
        }
        $slug = session()->put('slug', $slugs);
        $qty = session()->put('totalQty', $qtys);
        $orderNum = session()->put('orderNum', $orderNum);
        $total = session()->put('total', $total);
        
        return redirect()->route('user.payment');
    }

    

    public function receipt(Request $request, $orderNum)
    {
        $slugSession = session()->get('slug');
        $qty = session()->get('totalQty');
        $a = 0;
        $b = 0;
        
        $order = Order::find($orderNum);
        $order->receipt = $request->file('receipt')->store('receipt');
        $order->status = "Waiting for approval";
        $order->save();
        
        
        $items = Item::whereIn('slug', $slugSession)->get();
        foreach ($items as $item)
        {
            $item->stock = $item->stock - $qty[$a++];
            $item->sold = $item->sold + $qty[$b++];
            $item->save();
        }

        return redirect()->route('profile.status');
    }

   
}
