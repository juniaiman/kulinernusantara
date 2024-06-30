<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('registrasi',
    [
        'title' => 'FYP',
        'active' => 'Registration'
    ]);
    }
    public function create(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:255',
            'date' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required',
            'repassword' => 'required',
            'address' => 'required',
            'role' => 'required',
            'photo' => 'required'
        ]);

        if($validate['repassword'] === $validate['password'])
        {
            $validate['name'] = Str::ucfirst($validate['name']);
            $validate['password'] = Bcrypt($validate['password']);
            $validate['photo'] = $request->file('photo')->store('profile'); 
            

    
            User::create($validate);
            return redirect('/login');
        }
            return back()->with('registerError', 'Password not macth!');


    }
}
