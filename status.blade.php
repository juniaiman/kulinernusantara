@extends('layout.adminPage')

@section('content')


<div class="container mx-auto p-4">
        <table class="min-w-full bg-white border border-green-400">
            <thead class="bg-green-200">
                <tr>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Nama Makanan</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Jumlah makanan</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Sub Total</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Note</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Status</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">diterima</th>
                    <th class="px-6 py-3 border-b border-gray-200 text-gray-600 text-left text-sm uppercase font-bold">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ Str::replace('-', ' ',$item->slug) }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ $item->qty }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">Rp {{ number_format($item->total) }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ $item->note }}</td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">
                            <form action="{{ route('user.changeStatus', $item->orderNum) }} " method="post">
                                @csrf
                                @method('PUT')
                                <select name="status" id="" class="border border-green-400" onchange="this.form.submit()">
                                    <option value="{{ $item->status }}"><span class="px-2 py-1 rounded-full bg-green-500 text-white text-xs">{{ $item->status }}</span></option>
                                    <option value="cooking on proses"><span class="px-2 py-1 rounded-full bg-green-500 text-white text-xs">cooking on proses</span></option>
                                    <option value="order is on the way"><span class="px-2 py-1 rounded-full bg-green-500 text-white text-xs">order is on the way</span></option>
                                    <option value="order recieve"><span class="px-2 py-1 rounded-full bg-green-500 text-white text-xs">order recieve</span></option>
                                </select>
                            </form>
                        </td>
                        <td class="px-6 py-4 border-b border-gray-200 text-sm">{{ $item->created_at }}</td>
                        <td>
                            <form action="{{ route('user.deleteStatus', $item->orderNum) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection