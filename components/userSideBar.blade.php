    <div class="flex space-x-4">
        <i data-feather="user" class="w-[27px] h-[34px] text-[#61AE77]"></i>
        <a href="/profil" class="text-3xl text-[#61AE77]">Profil</a>
    </div>

    <div class="flex mt-6 space-x-4">
        <i data-feather="shopping-cart" class="w-[27px] h-[34px] text-[#61AE77]"></i>
        <a href="/cart" class="text-3xl text-[#61AE77]">Keranjang</a>
   </div>

    <div class="flex mt-6 space-x-4">
        <i data-feather="star" class="w-[27px] h-[34px] text-[#61AE77]"></i>
        <a href="/profile/favorite" class="text-3xl text-[#61AE77]">Favorit</a>
   </div>

    <div class="flex mt-6 space-x-4">
        <i data-feather="activity" class="w-[27px] h-[34px] text-[#61AE77]"></i>
        <a href="/profile/status" class="text-3xl text-[#61AE77]">Status</a>
   </div>

    @if(auth()->user()->role == 'admin')
        <div class="flex mt-6 space-x-4">
            <i data-feather="codepen" class="w-[27px] h-[34px] text-[#61AE77]"></i>
            <a href="/admin" class="text-3xl text-[#61AE77]">admin</a>
        </div>
    @endif

    <div class="flex mt-6 space-x-4">
        <i data-feather="log-out" class="w-[27px] h-[34px] text-[#61AE77]"></i>
        <a href="/logout" class="text-3xl text-[#61AE77]">Logout</a>
    </div>
