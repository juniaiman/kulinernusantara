@extends('layout.adminPage')

@section('content')
<div class="flex">
<div class="w-[600px] h-min-full rounded-[10px] bg-green-500 p-5">
                    <h1 class="text-white text-[3rem] font-bold font-[poppins]">Tambah Makanan</h1>

                    <form action="/admin" method="post" class="mt-5" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <input type="text" placeholder="Nama makanan" name="title" id="title"
                                class="w-[100%] h-[40px] rounded-[10px] pl-3 bg-black bg-opacity-20 placeholder-white">
                        </div>
                        <select name="origin" id="Daerah"
                            class="w-[100%] h-[40px] rounded-[10px] mt-2 text-white bg-black bg-opacity-20"
                            style="text-indent: 5px;">
                            <option value="">daerah Makanan</option>
                            <option value="Jawa">Jawa</option>
                            <option value="Sumatra">Sumatra</option>
                            <option value="Kalimantan">Kalimantan</option>
                            <option value="Sulawesi">Sulawesi</option>
                            <option value="bali">bali</option>
                        </select>
                        <div class="mt-2">
                            <input type="number" name="price" id="Harga"
                                class="w-[100%] h-[40px] rounded-[10px] pl-3 bg-black bg-opacity-20 placeholder-white"
                                placeholder="Harga">
                        </div>
                        <input type="number" name="stock" id="" placeholder="stock" class="mt-2 w-[100%] h-[40px] rounded-[10px] pl-3 bg-black bg-opacity-20 placeholder-white">
                        <div class="mt-2">
                            <input id="x" type="hidden" name="description" >
                            <trix-editor input="x" class="w-[100%] h-[150px]  bg-black bg-opacity-20 border-0 "></trix-editor>
                        </div>
                        <input type="hidden" name="rating" value="0" id="">
                        <input type="hidden" name="sold" value="0" id="">
                        <div class="mt-2">
                            <label for="Gambar" class="block text-sm font-medium text-gray-700 text-center">Pilih Gambar</label>
                            <div class="mt-1 flex flex-col items-center justify-center">

                                <input type="file" id="Gambar" name="thumbnail" accept="image/*"
                                    class="sr-only bg-black bg-opacity-20 text-white">
                                <label for="Gambar"
                                    class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-900 hover:bg-indigo-700 cursor-pointer mb-2">
                                    Pilih File
                                </label>
                                <button class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-900 hover:bg-indigo-700 cursor-pointer mb-2">Masukkan Barang</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="w-[400px] h-[300px] bg-green-500 rounded-[8px] ml-5 r">
        <h2 class="text-white text-[2rem] font-bold font-[poppins] text-center mt-5">Tambah Kategori</h2>
        <p class="text-center mt-4">Kategori</p>
        <form action="" class="w-full flex justify-center mt-2">
            <select id="kategori" name="kategori" class="bg-gray-100 rounded-md w-[50%] h-[30px]">
                <option value="Jawa">Jawa</option>
                <option value="Sumatra">Sumatra</option>
                <option value="Bali">Bali</option>
                <option value="Kalimantan">Kalimantan</option>
            </select>
        </form>
    </div>
</div>
              

               
@endsection