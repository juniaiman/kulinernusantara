@extends('layout.dashboard2')

@section('content')

  <div class="flex w-full h-[600px]">

    <div class="w-[300px] h-full">
     <div class=" mt-[80px] ml-[30px]">
        @include('components.userSideBar')
      </div>
    </div>
      
    <div class="w-[60%] h-full ml-[200px]">
     <div class="mt-[65px]">
       <h2 class="text-4xl ml-[60px]">Keranjang belanja</h2>
       <hr class="w-full border-t-2 border-black mt-3">
     </div>

     <script>
      function toggle(source) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i] != source)
                checkboxes[i].checked = source.checked;
                const cb = document.querySelectorAll('input[type="checkbox"]:checked').length;
                document.getElementById('totalMkn').innerHTML = cb;

                const formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'IDN',

                // These options are needed to round to whole numbers if that's what you want.
                //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
                //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
                });

                let tots = 0;
        
                // Add Checkbox values
                $(".checks:checked").each(function() {
                  tots += $(this).data("price");

                });
                
                // Update with new Number
                $('#tots').text(formatter.format(tots));
                document.getElementById('totalHarga').value = tots;

        }
      }

      function check(source)
      {
        const cb = document.querySelectorAll('input[type="checkbox"]:checked').length;
        document.getElementById('totalMkn').innerHTML = cb;
      }

      const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'IDN',

        // These options are needed to round to whole numbers if that's what you want.
        //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
        //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
      });

      // Total Price Calculator
      function calc() {
        let tots = 0;
        
        // Add Checkbox values
        $(".checks:checked").each(function() {
          tots += $(this).data("price");
          // totsqty += $(this).data("quantity");
        });
        
        // Update with new Number
        $('#tots').text(formatter.format(tots));
        document.getElementById('totalHarga').value = tots;

      }

      $(function() {
        $(document).on('change', '.checks', calc);
        calc();
      });

    </script>


      <div class="w-full  h-[23px]  rounded-[20px] flex justify-between ">
         <div class="">
            <form action="" class="ml-2">
            <input type="checkbox" onclick="toggle(this)">
            <label for="">Pilih semua</label>
            </form>                    
         </div>
         <div class="flex md:gap-16 md:mr-6">
           <a href="">harga satuan</a>
           <a href="">kuantitas</a>
           <a href="">total harga</a>
           <a href="">aksi</a>
         </div>
       </div>
       @error('itemCart')
       <div class="invalid-feedback text-center text-red-600">
           {{ "Please select at least one item before order" }}
       </div>
        @enderror
        @if(session()->has('deleteCart'))
        <div class="text-red-600 text-center" role="alert">
            {{ session('deleteCart') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
       @isset($dataItems)
       <form action="{{ route('user.checkout') }}" method="post" id="checkoutForm">
       @foreach($dataCart as $index => $cart)
            <div class="w-full bg-[#61AE77] min-h-[200px] mt-3 rounded-[20px] py-10">
              <div class="flex justify-between items-center px-5">
                  @csrf
                  <input type="checkbox" value="{{ $cart->slug }}" class="checks" onclick="check(this)" data-quantity="{{ $cart->qty }}" data-price="{{ $cart->qty * $dataItems[$index]->price}}" name="itemCart[]">
                  <input type="hidden" value="{{ $cart->id }}" class="" name="idCart">
                  
              <div>
                  <img src="/storage/{{ $dataItems[$index]->thumbnail }}" alt="" class="w-[100px] h-[100px] rounded-[10px]">
                    </div>
                    <h2 class="text-white font-['Poppins']">{{ $dataItems[$index]->title }}, {{ $dataItems[$index]->origin }}</h2>
                    <h2 class="text-white font-['Poppins']">Rp.{{ number_format($dataItems[$index]->price) }}</h2>
                    <div>
                        <button class="px-2 py-1 bg-grey-500 text-white rounded-md focus:outline-none" data-item-id='{{ $cart->id }}' name="action" type="submit" value="decreament"><</button>
                        <span class="px-3" id="quantity-1">{{ $cart->qty }}</span>
                        <button class="px-2 py-1 bg-grey-500 text-white rounded-md focus:outline-none" data-item-id='{{ $cart->id }}' name="action" type="submit" value="increament">></button>
                    </div>
                    <p class="text-white font-['Poppins']">total harga, Rp. <span id="price">{{ number_format($cart->qty * $dataItems[$index]->price) }}</span></p>
                      <button class="px-3 py-1 bg-red-500 text-white rounded-md" type="submit" value="delete" name="action">
                          <i data-feather="trash-2" class="w-[35px] h-[30px]"></i>
                      </button>
                </div>
                </div>
        @endforeach
      @else
          <div class="text-center">
            <h1>Cart still empty</h1>
          </div>
      @endisset



      <div class="w-full bg-[#61AE77] h-[100px] mt-6 rounded-[20px] py-7">
    <div class="flex justify-between items-center px-5">
        <h2 class="text-white font-['Poppins']">total makanan(<span id="totalMkn">0</span>)</h2>
        <p class="text-white font-['Poppins']"><span id="tots"></span></p>
        <input type="hidden" name="totalHarga" id="totalHarga">
        <button class="px-3 py-1 bg-yellow-500 text-white rounded-md"  type="submit" name="action" value="checkout">order</button>
    </div>
  </form>

</div>



      
     </div>
    </div>
    

  </div>



   @endsection