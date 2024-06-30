@extends('layout.templateKategori')

@section('content')

    <div class=" ml-[50px]   text-black text-[30px] font-bold font-['Poppins']">
        Hi {{ auth()->user()->name }}</div>

    <div class="ml-[50px] mt-[10px]  text-black text-[30px] font-bold font-['Poppins']">
        Selamat datang di {{ $origin }},mau makan apa?</div>



    <div class="mt-[3px] grid p-5 grid-cols-2 gap-2  md:grid-cols-3 md:gap-3
        ">
        @foreach ($items as $item)
            @include('components.itemCard')
        @endforeach
    </div>

    <button class="w-[250px] h-[62px] absolute bg-[#61AE77] text-white rounded-[10px] right-6">
        Selengkapnya
    </button>

    @endsection


   