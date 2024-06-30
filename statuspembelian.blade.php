@extends('layout.dashboard2')
   @section('content')

    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-6 text-center mt-3">status pembelian</h2>
        <div class="overflow-x-auto items-center flex justify-center">
            <table class="w-[80%] bg-white border border-gray-200 ">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Nama Makanan</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">FOTO</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Jumlah makanan</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Sub Total</th>
                        <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">Nasi Goreng</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">
                            <img src="https://via.placeholder.com/100" alt="Nasi Goreng" class="w-16 h-16 object-cover rounded">
                        </td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">3</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">Rp60,000</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">
                            <span class="px-2 py-1 rounded-full bg-green-500 text-white text-xs">dimasak</span>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

@endsection
