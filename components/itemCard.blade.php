<div class=" w-[359px] h-[300px] bg-white rounded-[10px] shadow">
    <img class=" w-full h-[200px] rounded-[10px]" src="/storage/{{ $item->thumbnail }}" />
    <div class="px-[3px] bg-white rounded-[5px] ">
        <div class=" flex align-center rounded-md">
            <?php
                $cekFav = App\Models\Favorit::where('slug', $item->slug)->where('email', auth()->user()->email);
                if ($cekFav->count() == 0){
            ?>
            <form method="post" action="{{ route('user.favorite') }}">
                @csrf
                <input type="hidden" name="favorit" id="" value="{{ $item->slug }}">
                <button><i class="w-[17px] h-[15px] text-yellow-600" data-feather="star"></i></button>
            </form>
            <?php
                }else{
            ?>
            <form method="post" action="{{ route('user.deleteFavorite', auth()->user()->email) }}">
                @csrf
                @method('delete')
                <input type="hidden" name="favorit" id="" value="{{ $item->slug }}">
                <button><i class="w-[17px] h-[15px] text-yellow-600" data-feather="trash-2"></i></button>
            </form>
            <?php
                }
            ?>
            {{ $item->favorite }}({{ $item->sold }})
        </div>
        <p>{{ $item->title }}, {{ $item->origin }}</p>
        <p>Rp {{ number_format($item->price) }}</p>

        <div class="flex justify-between mt-3">
            <a href="{{ route('produk.show', $item->slug) }}"><button
                    class="success-button py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-900 hover:bg-indigo-700 cursor-pointer mb-2">Buy</button></a>
            <form method="post" action="{{ route('cart.add') }}">
                @csrf
                <input type="number" name="qty" id="slug" min="1" required placeholder="please input quantity">
                <input type="hidden" name="slug" id="slug" value="{{ $item->slug }}">
                <button
                    class="edit-button py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-yellow-600 hover:bg-yellow-800 cursor-pointer mb-2">cart</button>
            </form>
        </div>
    </div>
</div>