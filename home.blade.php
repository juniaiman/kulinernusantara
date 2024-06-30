@extends('layout.dashboard')

@section('content')

<div class="relative w-full h-[760px]">
    <img src="img/Bg Home.jpeg" alt="" class="w-full h-full object-cover">
    <div class="absolute inset-0 flex items-center justify-center text-white text-7xl font-bold">
    <h2 >
        Ragam menu hari ini
    </h2>
   
 
    </div>
    <div class="absolute inset-0 w-[80%] h-[2px] bg-white mx-auto"></div>
    
    
</div>

<!-- <div class="slideshow-container relative w-full overflow-hidden">
    <div class="mySlides fade">
        <img src="img/Bg Home.jpeg" alt="Background Image 1" class="w-full h-[600px] object-cover bg-repeat" style="background-size: 600px;">
        <div class="absolute inset-0 flex items-center justify-center flex-col text-center text-white px-4">
            <p class="text-[30px] sm:text-[40px] md:text-[50px] lg:text-[70px] font-bold font-Lalezar">RAGAM MENU PILIHAN 1</p>
            <div class="w-full md:w-[510px] h-[0px] border-[3px] border-white mt-3"></div>
            <a href="/menupage1">
                <button class="bg-[#61AE77] w-[175px] sm:w-[225px] h-[50px] sm:h-[75px] rounded-[10px] mt-[20px] sm:mt-[30px]">Selengkapnya</button>
            </a>
        </div>
    </div> -->
    <!-- <div class="mySlides fade">
        <img src="img/Bg Home.jpeg" alt="Background Image 2" class="w-full h-full object-cover bg-repeat" style="background-size: 600px;">
        <div class="absolute inset-0 flex items-center justify-center flex-col text-center text-white px-4">
            <p class="text-[30px] sm:text-[40px] md:text-[50px] lg:text-[70px] font-bold font-Lalezar">RAGAM MENU PILIHAN 2</p>
            <div class="w-full md:w-[510px] h-[0px] border-[3px] border-white mt-3"></div>
            <a href="/menupage2">
                <button class="bg-[#61AE77] w-[175px] sm:w-[225px] h-[50px] sm:h-[75px] rounded-[10px] mt-[20px] sm:mt-[30px]">Selengkapnya</button>
            </a>
        </div>
    </div>
    <div class="mySlides fade">
        <img src="img/Bg Home3.jpeg" alt="Background Image 3" class="w-full h-full object-cover bg-repeat" style="background-size: 600px;">
        <div class="absolute inset-0 flex items-center justify-center flex-col text-center text-white px-4">
            <p class="text-[30px] sm:text-[40px] md:text-[50px] lg:text-[70px] font-bold font-Lalezar">RAGAM MENU PILIHAN 3</p>
            <div class="w-full md:w-[510px] h-[0px] border-[3px] border-white mt-3"></div>
            <a href="/menupage3">
                <button class="bg-[#61AE77] w-[175px] sm:w-[225px] h-[50px] sm:h-[75px] rounded-[10px] mt-[20px] sm:mt-[30px]">Selengkapnya</button>
            </a>
        </div>
    </div> -->
<!-- </div> -->


    <div class="relative w-full h-auto bg-[#61AE77] py-10">
        <div class="grid grid-cols-1 gap-5 md:grid-cols-3 md:gap-3 justify-items-center">
            <div class="w-[220px] h-auto flex flex-col justify-center items-center mt-5">
                <div class="w-full h-auto p-5 flex flex-col items-center">
                    <div class="relative w-[150px] h-[150px] md:w-[200px] md:h-[200px] bg-green-900 rounded-full flex justify-center items-center">
                        <img class="w-[100px] h-[100px] md:w-[150px] md:h-[150px] rounded-full shadow" src="img/Icon Terfav.jpeg" />
                    </div>
                    <h2 class="mt-2 text-white text-[20px] md:text-[30px] font-normal font-Lalezar">Terfavorit</h2>
                </div>
            </div>
            <div class="w-[220px] h-auto flex flex-col justify-center items-center mt-5">
                <div class="w-full h-auto p-5 flex flex-col items-center">
                    <div class="relative w-[150px] h-[150px] md:w-[200px] md:h-[200px] bg-green-900 rounded-full flex justify-center items-center">
                        <img class="w-[100px] h-[100px] md:w-[150px] md:h-[150px] rounded-full shadow" src="img/Icon Terlaris.jpeg" />
                    </div>
                    <h2 class="mt-2 text-white text-[20px] md:text-[30px] font-normal font-Lalezar">Terlaris</h2>
                </div>
            </div>
            <div class="w-[220px] h-auto flex flex-col justify-center items-center mt-5">
                <div class="w-full h-auto p-5 flex flex-col items-center">
                    <div class="relative w-[150px] h-[150px] md:w-[200px] md:h-[200px] bg-green-900 rounded-full flex justify-center items-center">
                        <img class="w-[100px] h-[100px] md:w-[150px] md:h-[150px] rounded-full shadow" src="img/Icon Ekstra Diskon.jpeg" />
                    </div>
                    <h2 class="mt-2 text-white text-[20px] md:text-[30px] font-normal font-Lalezar">Ekstra Diskon</h2>
                </div>
            </div>
        </div>
        <div class="absolute left-1/2 transform -translate-x-1/2 mt-[30px] w-[90%] md:w-[1300px] h-[0px] border-2 border-white"></div>
    </div>


    @endsection