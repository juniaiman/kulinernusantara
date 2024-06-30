@extends('layout.dashboard2')
   @section('content')

   <div class="flex w-full h-[600px]">
     <div class="w-[300px] h-full">
      <div class=" mt-[80px] ml-[30px]">
         <div class="flex space-x-4">
          <i data-feather="user" class="w-[27px] h-[34px] text-[#61AE77]"></i>
          <a href="/profil" class="text-3xl text-[#61AE77]">Profil</a>
      </div>

         <div class="flex mt-6 space-x-4">
           <i data-feather="shopping-cart" class="w-[27px] h-[34px] text-[#61AE77]"></i>
           <a href="/cart" class="text-3xl text-[#61AE77]">Keranjang</a>
        </div>
    </div>
    </div>

    <div class="w-[59%] h-full ml-[190px]">
     <div class="mt-[60px]">
       <h2 class="text-4xl ml-[60px] font-bold font-['Poppins']">My Profil</h2>
       <hr class="w-full border-t-2 border-black mt-3">
     </div>

     <div class="flex">
        <div>
        <img src="" alt="" class="w-[222px] h-[187px] rounded-[40px]">
        <form action="" class="mt-3 flex items-center justify-center">
                <input type="file" id="fileInput" class="hidden">
                <label for="fileInput" class="cursor-pointer  rounded-full text-black">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                   
                </label>
                <h2 class="ml-2">Change Photo</h2>
            </form>

        </div>
        
        
          
        <div>
        <div class=" ml-6">
            <p>FULL NAME</p>
            <div class="w-[655px] h-[62px] rounded-lg bg-[#D9D9D9]"></div>
            <p>GENDER</p>
            <div class="w-[655px] h-[62px] rounded-lg bg-[#D9D9D9]"></div>
            <p>EMAIL</p>
            <div class="w-[655px] h-[62px] rounded-lg bg-[#D9D9D9]"></div>
            <p>NO HP</p>
            <div class="w-[271px] h-[62px] rounded-lg bg-[#D9D9D9]"></div>

            <div class="flex justify-between">
                <div>
                <p>Date</p>
                 <div class="w-[201px] h-[62px] rounded-lg bg-[#D9D9D9]"></div>
                </div>
                <div>
                <p>Month</p>
                 <div class="w-[201px] h-[62px] rounded-lg bg-[#D9D9D9]"></div>
                </div>
                <div>
                <p>Year</p>
                 <div class="w-[201px] h-[62px] rounded-lg bg-[#D9D9D9]"></div>
                </div>
            
           
            </div>

            <div class="flex justify-end mt-6">
        <button class="w-[286px] h-[62px] bg-[#61AE77] rounded-[10px]">Update profil</button>
    </div>
        </div>
        
        </div>
       
        
        
     

     
     </div>
   </div>
   @endsection