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
                <h2 class="text-4xl ml-[60px] font-bold font-['Poppins']">Favorit</h2>
                <hr class="w-full border-t-2 border-black mt-3">
            </div>
            <div class="mt-6 grid p-5 grid-cols-2 gap-2  md:grid-cols-3 md:px-5 ">
                @foreach ($items as $item)
                    @include('components.itemCard')
                @endforeach
            </div>
        </div>
    </div>

   @endsection