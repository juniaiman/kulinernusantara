<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchMenu(Request $request)
    {
        $query = $request->input('query');
        $items = Item::where('title', 'like' ,"%$query%")->orWhere('origin', 'like', "%$query%")->get();
        $title = "FYP";
        $active = "MenuPage";

        return view('menupage', compact('items','active','title'));
    }

    public function searchKategori(Request $request, $origin)
    {
        $query = $request->input('query');
        $items = Item::where('title', 'like' ,"%$query%")->where('origin', $origin)->get();
        $title = "FYP";
        $active = $origin;

        return view('kategori', compact('items','active','title','origin'));
    }

    public function searchStatus(Request $request,$active)
    {
        switch ($active){
            case 'Status':
                $query = Str::replace(' ', '-', $request->input('query'));
                $items = Order::where('slug', 'like' ,"%$query%")->orWhere('orderNum', $query)->get();
                $title = "FYP";
                
                return view('status', compact('items','active','title'));
                
                break;
            case 'AdminBarang':
                $query = $request->input('query');
                $title = "FYP";
                

                $items = Item::where('title', 'like' ,"%$query%")->get();
                $data = json_encode($items);
                $no = 0;

                return view('adminBarang', compact('items','data','no','active','title'));
                break;
            case 'datapengguna':
                $query = $request->input('query');
                $title = "FYP";

                $user = User::where('name', 'like' , "%$query%")
                ->orWhere('date', 'like', "%$query%")
                ->orWhere('email', 'like', "%$query%")
                ->orWhere('address', 'like', "%$query%")
                ->orWhere('role', 'like', "%$query%")
                ->orWhere('created_at', 'like', "%$query%")
                ->orWhere('updated_at', 'like', "%$query%")
                ->get();

                return view('datapengguna', compact('user', 'title', 'active'));
                break;
        }

    }

}
