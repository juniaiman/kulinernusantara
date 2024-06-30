<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Favorit;
use App\Models\Item;
use App\Models\Cart;
use App\Models\Order;


class UserController extends Controller
{
    public function datapengguna(){
        return view('datapengguna',
        [
        'title' => 'FYP',
        'active' => 'datapengguna',
        'user' => User::all(),
        ]);
    }

    public function gantirole(Request $request,$email){
        $user = User::find($email);
        $user->role = $request->input('role');
        $user->save();
        return back()->with('success','Role Berhasil Diubah');
    }

    public function delete($email)
    {
        $userCart = Cart::where('user', $email);
        if($userCart->count() > 0)
        {
            $userCart->delete();
        }

        
        $userFavorit = Favorit::where('user', $email);
        if($userFavorit->count() > 0)
        {
            $userFavorit->delete();
        }

        $user = User::find($email);
        Storage::delete($user->photo);
        $user->delete();
        
        return back()->with('delete','User Telah Dihapus');
    }

    public function favorit(Request $request)
    {
        $fav = new Favorit;
        $fav->slug = $request->input('favorit');
        $fav->email = auth()->user()->email;
        $fav->save();

        $cekItem = Item::find($request->input('favorit'));
        $cekItem->favorite += 1;
        $cekItem->save();

        return redirect()->route('profile.favorite');
    }

    public function deleteFavorite(Request $request)
    {
        $cekFav = Favorit::where('slug', $request->input('favorit'))->where('user', auth()->user()->email);
        $cekFav->delete();

        $cekItem = Item::find($request->input('favorit'));
        $cekItem->favorite -= 1;
        $cekItem->save();

        return redirect()->route('profile.favorite');
    }

    public function status()
    {
        $title = 'FYP';
        $active = 'Status';
        $items = Order::all();

        return view('status', compact('items', 'title', 'active'));
    }

    public function changeStatus(Request $request, $orderNum)
    {
        $orders = Order::where('orderNum', $orderNum)->get();
        foreach ($orders as $order)
        {
            $order->status = $request->input('status');
        }
        $order->save();

        return back();
    }

    public function deleteStatus($orderNum)
    {
        $order = Order::find($orderNum);
        if(!$order->receipt == NULL)
        {
            Storage::delete($order->receipt);
        }
        $order->delete();

        return back();
    }
}