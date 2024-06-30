<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use App\Models\Favorit;
use App\Models\Item;
use App\Models\Order;


class ProfileController extends Controller
{
    public function view() {
        $string = Str::of( auth()->user()->date )->split('/[\s-]+/');
        $monthName = date("F", mktime(0, 0, 0, $string[1], 10));
        $title = 'FYP';
        $active = 'profile';
        return view('profil', compact('string', 'monthName', 'title', 'active') );
    }

    public function edit(User $user)
    {
        if ($user) {
            return view('profile', compact('user'));
        } else {
            return redirect()->back()->with('error', 'Profil Tidak Ditemukan');
        }
    }

    public function update(Request $request, User $user, $email)
    {
        $user = User::find($email);
        if($user)
        {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->address = $request->input('address');
            $user->date = $request->input('date');
            $user->save();

            $userCart = Cart::find($email);
            $userCart->user = $request->input('email');
            $userCart->save();

            $userFav = Favorit::find($email);
            $userFav->user = $request->input('email');
            $userFav->save();

            return redirect()->route('profile')->with('success', 'Profil Berhasil Di Update');
        }
        else 
        {
            return redirect()->back()->with('error', 'Profil Tidak Ditemukan');
        }
    }

    public function changePhoto(Request $request, User $user, $email)
    {
        $user = User::find($email);
        if($user)
        {
            Storage::delete($user->photo);
            $user->photo = $request->file('changePhoto')->store('profile');
            $user->save();

            return redirect()->route('profile')->with('success', 'Profil Berhasil Di Update');
        }
        else 
        {
            return redirect()->back()->with('error', 'Profil Tidak Ditemukan');
        }
    }

    public function viewFav()
    {
        $fav = Favorit::where('email', auth()->user()->email)->get();
        foreach ($fav as $data)
        {
            $slug = $data['slug'];
            $items[] = Item::find($slug);
        }
        $title = 'FYP';
        $active = 'Favorite';
        return view('favorit', compact('items', 'title', 'active'));
    }

    
    public function changeLoc(Request $request, $email)
    {
        $dataUser = User::find($email);
        $dataUser->address = $request->input('address');
        $dataUser->save();

        return redirect()->route('checkout');
    }

    public function viewStat()
    {
        $title = 'FYP';
        $active = 'Status';
        $items = Order::where('email', auth()->user()->email)->get();

        return view('statusItem', compact('items', 'title', 'active'));
    }

}
