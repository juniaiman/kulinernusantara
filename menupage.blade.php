
   @extends('layout.dashboard')
   @section('content')

  

   <div class="ml-4 mt-4 ">
    <h2 class="text-3xl font-bold"> Hi {{ auth()->user()->name }}</h2>
    <h2 class="text-3xl font-bold mt-3">Makanan daerah mana yang kamu mau hari ini?</h2>
   </div>

    <form action="{{ route('user.searchMenu') }}" method="post" class="relative mt-[30px] left-[14px] flex items-center">
        @csrf
        <div class="relative flex items-center">
            <input type="text" placeholder="Cari apa" name="query"
                class="w-[700px] h-[70px] pl-[50px] bg-zinc-300 rounded-[20px] pr-4 placeholder-lg">
            <i data-feather="search" class="absolute left-0 top-0 mt-6 ml-3 text-gray-400"></i>

        </div>

        <div class="w-[70px] h-[70px] bg-[#61AE77] rounded-[10px] ml-2 flex items-center justify-center">
            <a href="">
                <i data-feather="list" class="w-[42px] h-[42px] text-white"></i>
            </a>
        </div>
    </form>

    <div class=" mt-[10px] grid grid-cols-2  md:grid-cols-5 md:p-4 ">

        <a href="/kategori/Jawa">
            <div class="w-[280px] h-[200px] relative shadow">
                <img class="w-[239.32px] h-[133.33px] left-[21.78px] top-[17.78px] absolute rounded-[20px]"
                    src="/img/peta-daerah/Jawa.jpeg" />
                <p
                    class="w-28 h-[48.89px] left-[84px] top-[155px] absolute text-center text-black text-[20px] font-bold font-['poppins']">
                    jawa</p>
            </div>
        </a>
        <a href="/kategori/Bali">
            <div class="w-[280px] h-[200px] relative shadow">
                <img class="w-[239.32px] h-[133.33px] left-[21.78px] top-[17.78px] absolute rounded-[20px]"
                    src="/img/peta-daerah/Bali.jpeg" />
                <p
                    class="w-28 h-[48.89px] left-[84px] top-[155px] absolute text-center text-black text-[20px] font-bold font-['poppins']">
                    bali</p>
            </div>
        </a>
        <a href="/kategori/Sulawesi">
            <div class="w-[280px] h-[200px] relative shadow">
                <img class="w-[239.32px] h-[133.33px] left-[21.78px] top-[17.78px] absolute rounded-[20px]"
                    src="/img/peta-daerah/Sulawesi.jpeg" />
                <p
                    class="w-28 h-[48.89px] left-[84px] top-[155px] absolute text-center text-black text-[20px] font-bold font-['poppins']">
                    sulawesi</p>
            </div>
        </a>
        <a href="/kategori/Sumatra">
            <div class="w-[280px] h-[200px] relative shadow">
                <img class="w-[239.32px] h-[133.33px] left-[21.78px] top-[17.78px] absolute rounded-[20px]"
                    src="/img/peta-daerah/Sumatra.jpeg" />
                <p
                    class="w-28 h-[48.89px] left-[84px] top-[155px] absolute text-center text-black text-[20px] font-bold font-['poppins']">
                    sumatra</p>
            </div>
        </a>
        <a href="/kategori/Kalimantan">
            <div class="w-[280px] h-[200px] relative shadow">
                <img class="w-[239.32px] h-[133.33px] left-[21.78px] top-[17.78px] absolute rounded-[20px]"
                    src="/img/peta-daerah/Papua.jpeg" />
                <p
                    class="w-28 h-[48.89px] left-[84px] top-[155px] absolute text-center text-black text-[20px] font-bold font-['poppins']">
                    kalimantan</p>
            </div>
        </a>


    </div>



    <div class="mt-6">
        <img src="img/Banner2.png" alt="">
    </div>

    <div class="mt-6 grid p-5 grid-cols-2 gap-2  md:grid-cols-3 
        md:px-5 ">

        @foreach($items as $item)
            @include('components.itemCard')
        @endforeach

    </div>
     
    <div class="flex justify-end mr-4">
    <button class="w-[250px] h-[62px]  mb-4  bg-[#61AE77]  text-white rounded-[10px]">
        selengkapnya
    </button>
    </div>
   

   @endsection