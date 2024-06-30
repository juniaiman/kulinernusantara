<nav class="flex justify-between items-center bg-[#61AE77] h-[90px] px-[50px]">
        <div class="flex items-center">
            <a href="#">
                <i data-feather="menu" class="text-white w-[35px] h-[30px]"></i>
            </a>
            <div class="w-[120px] h-[120px] flex">
                <img src="/img/logo1.png" alt="">
            </div>
        </div>

        @isset($origin)

            <form action="{{ route('user.searchKategori', $origin) }}" method="post" class="flex items-center justify-center flex-grow">
                @csrf
                <div class="relative flex items-center">
                    <input type="text" placeholder="Cari apa" name="query"
                        class="w-[900px] h-[70px] pl-[50px] bg-zinc-300 rounded-[20px] pr-4 placeholder-lg">
                        <i data-feather="search" class="absolute left-0 top-0 mt-6 ml-3 text-gray-400"></i>
                        <input type="hidden" name="origin" id="origin" value="{{ $origin }}">
                </div>
            </form>
        @endisset

        <div class="flex items-center">
            <div class="flex items-center">
                <a href="/cart" class="mr-5">
                    <i data-feather="shopping-cart" class=" text-white w-[35px] h-[30px]"></i>
                </a>
                <a href="/profile/favorite" class="mr-5">
                    <i data-feather="star" class=" text-white w-[35px] h-[30px]"></i>
                </a>
                @auth
            <a href="/profil" class="mr-6 text-white">Welcome {{ auth()->user()->name }}!</a>
        @else
            <a href="/login" class="mr-6 text-white">
                <p>login</p>
            </a>
        @endauth
            </div>
        </div>
    </nav>