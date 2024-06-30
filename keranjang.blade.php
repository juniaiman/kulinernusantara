@extends('layout.templateKategori')

@section('content')

  <div class="flex w-full h-[600px]">

    <div class="w-[300px] h-full">
     <div class=" mt-[80px] ml-[30px]">
        <div class="flex space-x-4">
          <i data-feather="user" class="w-[30px] h-[30px]"></i>
          <a href="" class="text-3xl text-[#61AE77]">Profil</a>
       </div>

         <div class="flex mt-6 space-x-4">
           <i data-feather="shopping-cart" class="w-[30px] h-[30px] "></i>
           <a href="" class="text-3xl text-[#61AE77]">Keranjang</a>
        </div>
    </div>
    </div>
      
    <div class="w-[60%] h-full ml-[200px]">
     <div class="mt-[65px]">
       <h2 class="text-4xl ml-[60px]">Keranjang belanja</h2>
       <hr class="w-full border-t-2 border-black mt-3">
     </div>


      <div class="w-full  h-[23px]  rounded-[20px] flex justify-between ">
         <div class="">
            <form action="" class="ml-2">
            <input type="checkbox">
            <label for="">Pilih semua</label>
            </form>                    
         </div>
         <div class="flex gap-16 mr-6">
           <a href="">harga satuan</a>
           <a href="">kuantitas</a>
           <a href="">total harga</a>
           <a href="">aksi</a>
         </div>
       </div>




      <div class="w-full bg-[#61AE77] h-[200px] mt-3 rounded-[20px] py-10">
    <div class="flex justify-between items-center px-5">
        <input type="checkbox">
        <div>
            <img src="" alt="" class="w-[100px] h-[100px] rounded-[10px]">
        </div>
        <h2 class="text-white font-['Poppins']">nasi timbel, sunda</h2>
        <h2 class="text-white font-['Poppins']">Rp.20.000</h2>
        <div>
            <button class="px-2 py-1 bg-grey-500 text-white rounded-md focus:outline-none"><</button>
            <span class="px-3" id="quantity-1">1</span>
            <button class="px-2 py-1 bg-grey-500 text-white rounded-md focus:outline-none">></button>
        </div>
        <p class="text-white font-['Poppins']">total harga</p>
        <a href="#">
            <i data-feather="trash-2" class="w-[35px] h-[30px]"></i>
        </a>
    </div>
</div>

      <div class="w-full bg-[#61AE77] h-[100px] mt-6 rounded-[20px] py-7">
    <div class="flex justify-between items-center px-5">
        <input type="checkbox">
        <h2 class="text-white font-['Poppins']">pilih semua<br>(1)</h2>
        <h2 class="text-white font-['Poppins']">total makanan(1)</h2>
        <p class="text-white font-['Poppins']">Rp.20.000</p>
        <a href="#">
        <button class="px-3 py-1 bg-red-500 text-white rounded-md">order</button>
        </a>
    </div>
</div>



      
     </div>
    </div>
    

    

    


  </div>




   @endsection