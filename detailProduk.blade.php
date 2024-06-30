@extends('layout.templateKategori')

@section('content')

<div class="flex items-center justify-center">
<div class="w-[700px] h-[500px]">
  <div class="flex w-full h-[80%]justify-center space-x-8 pt-[75px] ">
     <img src="/storage/{{ $item->thumbnail }}" alt="rawon" class="w-[340px] h-[250px] rounded-[10px]">

     <div>
         <h2 class="font-bold font-['Poppins'] text-xl">{{ $item->title }},{{ $item->origin }}</h2>
         <p class="mt-4"> {{ $item->rating }} (tersisa {{ $item->stock }})</p>
         <p class="font-bold font-['Poppins'] text-xl mt-4">Rp. {{ number_format($item->price) }}</p>

         {{-- <div class="flex mt-4 space-x-7">
          <div class="flex bg-green-600 rounded-[20px] w-[100px] h-[35px] items-center justify-center space-x-4">
          <i data-feather="heart"></i>
          <p>favorit</p>
          </div>
          <div class=" bg-green-600 rounded-[20px] w-[80px] h-[35px] flex items-center justify-center ">
          <i data-feather="shopping-cart"></i>
          </div>

         </div> --}}

         <div class="flex mt-4 space-x-8 ">
         <form action="{{ route('user.buyNow') }}" method="post">
          @csrf
            <div class="">
              {{-- <button class="px-2 py-2 text-white  bg-gray-400"><</button> --}}
              <input type="hidden" name="slug" id="slug" value="{{ $item->slug }}">
              <input type="hidden" name="totalHarga" id="totalHarga" value="{{ $item->price }}">
              <input type="number" name="qty" id="" placeholder="Please insert quantity" required>
              {{-- <button class="px-2 py-2 text-white  bg-gray-400">></button> --}}
            </div>
  
            <div class=" bg-green-600 rounded-[20px] w-[130px] h-[35px] flex justify-center items-center mt-4">
              <button>beli sekarang</button>
            </div>
  
         </form>
         </div>
     </div>
  </div>

  <div >
    <h1 class="text-2xl font-bold">Deskripsi:</h1>
    <p>{{ strip_tags($item->description) }}.</p>
  </div>


</div>
</div>



@endsection