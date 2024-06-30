@extends('layout.dashboard2')
   @section('content')

   

    <div class="flex w-full h-[600px]">
        <div class="w-[300px] h-full">
            <div class=" mt-[80px] ml-[30px]">
                @include('components.userSideBar')
            </div>
        </div>

        <div class="w-[59%] h-full ml-[190px]">
            <div class="mt-[60px]">
                <h2 class="text-4xl ml-[60px] font-bold font-['Poppins']">Status</h2>
                <hr class="w-full border-t-2 border-black mt-3">
            </div>
                <table class="w-[100%] bg-white border border-gray-200 mt-3">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Nama Makanan</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Jumlah makanan</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Sub Total</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Note</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Status</th>
                            <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ Str::replace('-', ' ',$item->slug) }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ $item->qty }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 text-sm">Rp {{ number_format($item->total) }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ $item->note }}</td>
                                <td class="px-6 py-4 border-b border-gray-200 text-sm">
                                    <span class="px-2 py-1 rounded-full bg-green-500 text-white text-xs">{{ $item->status }}</span>
                                </td>
                                @if($item->receipt == NULL)
                                    <td class="px-6 py-4 border-b border-gray-200 text-sm">
                                        <form action="{{ route('user.pay', $item->orderNum) }}" method="post">
                                            @csrf
                                            <button class="px-2 py-1 rounded-full bg-green-500 text-white text-xs">
                                                Bayar
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>

 @endsection