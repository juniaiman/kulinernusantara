@extends('layout.dashboard2')
   @section('content')

   <div class="w-[1000px] h-[100vh] mx-auto">
        <div class="pt-[60px]">
            <h2 class="text-3xl font-bold font-['poppins'] ml-[50px]">checkout</h2>
                <div class="w-[95%] h-[2px] bg-black mx-auto">

                </div>
        </div>

        <form method="post" action="{{ route('user.payment') }}">
            @csrf
            <div class="w-full h-[1000px] mt-[50px]">
                <div class="w-[900px] h-[200px] bg-[#D9D9D9] mx-auto">
                    <div class="flex justify-between pt-6 px-3">
                        <div class="flex space-x-2">
                            <i data-feather="map-pin"></i>
                            <p>Alamat pengiriman</p>
                        </div>
                        
                    </div>
    
                    <div class="flex">
                        <div class="w-[200px] h-[50px] ml-[40px] block mt-4">
                            <p>{{ auth()->user()->name }}</p>
                        </div>
                        <div class="w-[600px] h-[50px] ml-[8px] mt-4 block">
                            <p>{{ auth()->user()->address }}</p>
                        </div>
                        <div class="flex mt-5 space-x-5 mr-4">
                            <a href="#" id="editLink"><i data-feather="edit-2"></i></a>
                        </div>
                    </div>
                    <hr class="w-full h-[20px] flex items-center justify-center mt-5">
                </div>
    
                <div class="w-[900px] h-[374px] bg-[#D9D9D9] mx-auto mt-6">
                    <table class="ml-6">
                        <tr class="">
                            <td class="w-[30%] pt-6">Makanan di pesan</td>
                            <td class="w-[30%] pt-6">Harga satuan</td>
                            <td class="w-[30%] pt-6">jumlah</td>
                            <td class="w-[30%] pt-6">Total harga</td>
                        </tr>
                        @if(session()->has('buyNow'))
                            @foreach ($dataCarts as $index => $cart)

                                <tr>
                                    <td class="flex mt-4"><img src="/storage/{{ $dataItems[$index]->thumbnail }}" alt="" class="w-[130px] h-[100px]"><p class="ml-6 mt-6">{{ $dataItems[$index]->title }},<br>{{ $dataItems[$index]->origin }}</p></td>
                                    <td class="pl-2">Rp {{ number_format($dataItems[$index]->price) }}</td>
                                    <td class="pl-2">{{ $totalqtyBuyNow }}</td>
                                    <td class="pl-2">Rp {{ number_format($totalqtyBuyNow * $dataItems[$index]->price) }}</td>
                                </tr>   
                            @endforeach
                        @else
                            @foreach ($dataCarts as $index => $cart)
                                <tr>
                                    <td class="flex mt-4"><img src="/storage/{{ $dataItems[$index]->thumbnail }}" alt="" class="w-[130px] h-[100px]"><p class="ml-6 mt-6">{{ $dataItems[$index]->title }},<br>{{ $dataItems[$index]->origin }}</p></td>
                                    <td class="pl-2">Rp {{ number_format($dataItems[$index]->price) }}</td>
                                    <td class="pl-2">{{ $cart->qty }}</td>
                                    <td class="pl-2">Rp {{ number_format($cart->qty * $dataItems[$index]->price) }}</td>
                                </tr>
                            @endforeach
                        @endif

                        <tr>
                            <td class="flex mt-4">catatan:
                                <input type="text" name="note" id="note" placeholder="note" class="bg-[#A5A5A5] rounded-[10px] ml-6">
                            </td>
                        </tr>
                        <tr>
                            <td class="pt-5">opsi pengiriman:</td>
                            <td class="cols-span-1 pt-5 font-bold">reguler <span class="ml-14 text-[#07511B]">ubah</span><br><p  class="text-sm ">Akan di terima 24 menit</p></td>
                            <td></td>
                            <td class="pt-5">Rp {{ number_format($totalHarga) }}</td>
                        </tr>
                    </table>
                    <div class="w-[95%] h-[2px] bg-black mx-auto mt-6">
                        <table>
                            <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>
                            <tr>
                            <td colspan="3" class="border-b"></td>
                            <td colspan="1" class="pt-6 text-right w-[100%] font-bold">Total Pesanan ({{ $qty }} Makanan): <span class="ml-[70px] mr-[50px] text-[#07511B]">Rp. {{ number_format($totalHarga) }}</span></td>
                            </tr>
                        </table>
    
                </div>
            </div>
    
            <div class="w-[900px] h-[550px] bg-[#D9D9D9] mx-auto mt-6">
                <div class="w-[600px] h-[100px]  items-center flex justify-between">
    
                    <div class="pl-[50px]">
                        <h2>metode pembayaran</h2>
                    </div>
    
                    <div class="w-[100px] h-[50px] bg-[#A5A5A5]  text-center flex items-center justify-center rounded-[10px]">
                        <p class="text-white font-bold">COD</p>
                    </div>
    
                    <div class="w-[160px] h-[50px] bg-[#07511B] flex items-center justify-center rounded-[10px]">
                        <p class="text-white font-bold">Transfer bank</p>
                    </div>
    
                </div>
    
                <div class="w-[95%] h-[2px] bg-black mx-auto">
    
                </div>
                @error('bank')
                    <div class="invalid-feedback text-center text-red-600">
                        {{ "Please selet one of the bank" }}
                    </div>
                @enderror
                <div class="w-[350px] h-[100px]  items-center flex justify-between">
                    <div class="pl-[50px]">
                        <h2>pilih bank:</h2>
                    </div>
    
                    <div>
                        <input type="checkbox" name="bank" value="bni">
                    </div>
    
                    <div class="w-[50px] h-[50px] border border-green-600 flex items-center justify-center">
                        <img src="/img/WhatsApp Image 2024-06-28 at 14.05.47_67ba990a.jpg" alt="" class="w-[35px] h-[35px]">
                    </div>
    
                    <div>
                        <h2>Bank BNI</h2>
                    </div>
                </div>
    
                <div class="w-[95%] h-[2px] bg-black mx-auto">
    
                </div>
    
                <div class="w-full h-[200px]  flex justify-end mt-5">
                    <div class="w-[260px] h-[170px]  mr-6">
                        <div class="flex justify-between">
                            <h2>Subtotal makanan:</h2>
                            <h2>Rp {{ number_format($totalHarga) }}</h2>
                        </div>
                        <div class="flex justify-between mt-3">
                            <h2>Total Ongkos Kirim:</h2>
                            <h2>Rp 10.000</h2>
                        </div>
                        <div class="flex justify-between mt-3">
                            <h2>Biaya Pelayanan:</h2>
                            <h2>Rp 2.000</h2>
                        </div>
                        <div class="flex justify-between mt-3">
                            <h2>Total Pembayaran:</h2>
                            <h2  class="text-xl text-[#07511B] font-bold">Rp {{ number_format($total) }}</h2>
                        </div>
                    </div>
                </div>
    
                <div class="w-full h-[100px]  flex justify-end ">
                    <button class="w-[190px] h-[60px] bg-[#07511B] mr-6 text-white" >buat pesanan</button>   
                </div>
    
                <div class="w-[95%] h-[2px] bg-black mx-auto">
    
                </div>
            </div>
        </form>
    </div>


<div id="editModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg w-full max-w-md">
            <h2 class="text-xl mb-4">Edit alamat</h2>
            <form id="editForm" method="post" action="{{ route('profile.location', auth()->user()->email ) }}">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="address" class="block text-gray-700">alamat lengkap:</label>
                    <input type="text" id="address" name="address" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" value="{{ auth()->user()->address }}">
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelButton" class="mr-2 bg-gray-500 text-white py-2 px-4 rounded">Cancel</button>
                    <button type="submit" class="bg-[#07511B] text-white py-2 px-4 rounded">simpan</button>
                </div>
            </form>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', () => {
            feather.replace();
            const editLink = document.getElementById('editLink');
            const editModal = document.getElementById('editModal');
            const cancelButton = document.getElementById('cancelButton');
            const editForm = document.getElementById('editForm');

            editLink.addEventListener('click', (e) => {
                e.preventDefault();
                editModal.classList.remove('hidden');
            });

            cancelButton.addEventListener('click', () => {
                editModal.classList.add('hidden');
            });

            // document.getElementById('editForm').addEventListener('submit', (e) => {
            //     e.preventDefault();
                
            //     editForm.action = `/profile/location/${auth()->user()->email}`; // dynamically set form action
            //     editModal.classList.add('hidden');
            // });
        });
    </script>

@endsection
