@extends('layout.adminPage')

@section('content')

<div class="container mx-auto">
        <table class="min-w-full bg-white border border-gray-200 mt-6">
            <thead>
                <tr class="w-full bg-gray-100">
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Nama Makanan</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Foto</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Harga</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Jumlah</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Total</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">hapus</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4 border-b border-gray-200 text-sm">Nasi Goreng</td>
                    <td class="px-6 py-4 border-b border-gray-200 text-sm">
                        <img src="https://via.placeholder.com/50" alt="Nasi Goreng" class="w-16 h-16 object-cover">
                    </td>
                    <td class="px-6 py-4 border-b border-gray-200 text-sm">Rp20,000</td>
                    <td class="px-6 py-4 border-b border-gray-200 text-sm">
                        <button class="px-2 py-1 bg-red-500 text-white rounded-md focus:outline-none" onclick="decrement(this)">-</button>
                        <span class="px-3" id="quantity-1">1</span>
                        <button class="px-2 py-1 bg-green-500 text-white rounded-md focus:outline-none" onclick="increment(this)">+</button>
                    </td>
                    <td class="px-6 py-4 border-b border-gray-200 text-sm" id="total-1">Rp20,000</td>
                    <td class="px-6 py-4 border-b border-gray-200 text-sm">
                    <a href="#">
                      <i data-feather="trash-2" class=" w-[35px] h-[30px]"></i>
                    </a>
                    </td>
                    <td class="px-6 py-4 border-b border-gray-200 text-sm">
                        <button class="px-3 py-1 bg-blue-500 text-white rounded-md">beli</button>
                    </td>
                </tr>
                <!-- Repeat for other rows as needed -->
            </tbody>
        </table>
    </div>

@endsection