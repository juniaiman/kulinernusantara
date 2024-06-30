<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RifadController extends Controller
{

    public function home(){
        return view('home',
    [
        'title' => 'FYP',
        'active' => 'Home'
    ]);
}
    public function pembayaran(){
        return view('pembayaran',
    [
        'title' => 'FYP',
        'active' => 'pembayaran'
    ]);
}
    public function buktipembayaran(){
        return view('buktipembayaran',
    [
        'title' => 'FYP',
        'active' => 'buktipembayaran'
    ]);
}
    public function opsipengiriman(){
        return view('opsipengiriman',
    [
        'title' => 'FYP',
        'active' => 'opsipengiriman'
    ]);
}
    
    public function daftaralamat(){
        return view('daftaralamat',
    [
        'title' => 'FYP',
        'active' => 'daftaralamat'
    ]);
    }
    public function menupage(){
        return view('menupage',
    [
        'title' => 'FYP',
        'active' => 'Menupage'
    ]);
    }
    public function keranjang(){
        return view('keranjang',
    [
        'title' => 'FYP',
        'active' => 'keranjang'
    ]);
    }
    public function resetpassword(){
        return view('resetpassword',
    [
        'title' => 'FYP',
        'active' => 'resetpassword'
    ]);
    }
    public function lupapassword(){
        return view('lupapassword',
    [
        'title' => 'FYP',
        'active' => 'lupapassword'
    ]);
    }
    public function detailProduk(){
        return view('detailProduk',
    [
        'title' => 'FYP',
        'active' => 'Product Detail'
    ]);
    }
    public function kategori(){
        return view('kategori',
    [
        'title' => 'FYP',
        'active' => 'Category'
    ]);
}
    public function profil(){
        return view('profil',
    [
        'title' => 'FYP',
        'active' => 'profil'
    ]);
    }
    public function admin(){
        return view('admin',
    [
        'title' => 'FYP',
        'active' => 'Admin'
    ]);
    }
    public function profil2(){
        return view('profil2',
    [
        'title' => 'FYP',
        'active' => 'profil2'
    ]);
    }
    public function keranjang2(){
        return view('keranjang2',
    [
        'title' => 'FYP',
        'active' => 'keranjang2'
    ]);
}
    public function adminproduk(){
        return view('adminproduk',
    [
        'title' => 'FYP',
        'active' => 'adminproduk'
    ]);
    }
    public function beliProduk(){
        return view('beliProduk',
    [
        'title' => 'FYP',
        'active' => 'beliProduk'
    ]);
}
    public function test(){
        return view('test',
    [
        'title' => 'FYP',
        'active' => 'tes'
    ]);
}
    public function statuspembelian(){
        return view('statuspembelian',
    [
        'title' => 'FYP',
        'active' => 'statuspembelian'
    ]);
    }
    public function edit(){
        return view('adminBarang',
    [
        'title' => 'FYP',
        'active' => 'Admin'
    ]);
    }

}
