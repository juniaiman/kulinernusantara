@extends('layout.dashboard2')
   @section('content')

<div class="w-[700px] h-[760px] mx-auto">
    <div class="pt-6">
        <h2 class="text-black text-3xl font-bold ml-6">pembayaran</h2>
        <div class="w-full h-[2px] bg-black"></div>
    </div>

    <div class="w-full h-[1400px] border border-green-700 mt-10  flex items-center justify-center rounded-[13px]">
        <div class="w-[95%] h-[95%] bg-[#D9D9D9] flex items-center justify-center">
            <div class="w-[75%] h-[95%] ">
                <div class="flex justify-between">
                    <h2 class="text-[18px]">total pembayaran</h2>
                    <h2 class="text-[18px] text-[#07511B] font-bold">Rp {{ number_format($total) }}</h2>
                </div>
                <div class="w-full h-[2px] bg-white mt-3"></div>

                <div class="flex mt-4">
                <img src="/img/WhatsApp Image 2024-06-28 at 14.05.47_67ba990a.jpg" alt="" class="w-[35px] h-[35px]">
                <p class="ml-5">Bank BNI</p>
                </div>

                <div class="w-[89%] h-auto ml-14">
                    <p>No rekening</p>
                    <div class="flex">
                        <input type="text" name="input" id="input" value="8805 240 1050 5060 4" class="text-[#07511B] font-bold bg-transparent border-none focus:outline-none hover:cursor-default" readonly>
                        <button class="ml-12 text-[#61AE77]" onclick="copy()">SALIN</button>
                    </div>
                    <p class="mt-3 text-[#61AE77]">Proses verifikasi kurang dari 10 menit setelah pembayaran berhasil</p>
                    <p class="mt-3">Bayar pesanan ke Virtual Account di atas sebelum membuat pesanan kembali dengan Virtual Account agar nomor tetap sama.</p>
                    <p class="mt-3">Hanya menerima dari Bank BNI</p>
                    <p class="mt-3 font-bold text-lg">Petunjuk Transfer Bank BNI</p>
                   <ol class="mt-2">
                    <li>1. Pilih Transfer > Virtual Account Billing.</li>
                    <li>2. Pilih Rekening Debet > Masukkan nomor Virtual Account 8805 240 1050 5060 4 pada menu Input Baru.</li>
                    <li>3. Tagihan yang harus dibayar akan muncul pada layar konfirmasi</li>
                    <li>4. Periksa informasi yang tertera di layar. Pastikan Merchant adalah For Your Plate, Total tagihan sudah benar dan username kamu Ayu. Jika benar, masukkan password transaksi dan pilih Lanjut.</li>
                   </ol>
                   <p class="mt-4 font-bold text-lg">Petunjuk Transfer iBanking</p>
                   <ul class="mt-2">
                    <li>1. Pilih Transfer > Virtual Account Billing.</li>
                    <li>2. Masukkan nomor Virtual Account 8805 240 1050 5060 4 .</li>
                    <li>3. Pilih Rekening Debet dan piliih Lanjut.</li>
                    <li>4. Tagihan yang harus dibayar akan muncul pada layar konfirmasi</li>
                    <li>5. Periksa informasi yang tertera di layar. Pastikan Merchant adalah Shopee, Total tagihan sudah benar dan username kamu Ayu.</li>
                    <li>Masukkan Kode Otentikasi Token Anda lalu klik Proses.</li>
                   </ul>
                   <p class="mt-4 font-bold text-lg">Petunjuk Transfer ATM</p>
                   <ul class="mt-2">
                    <li>1. Pilih Menu Lain > Transfer.</li>
                    <li>2. Pilih Jenis rekening asal dan pilih Virtual Account Billing.</li>
                    <li>3. Masukkan nomor Virtual Account 8805 240 1050  5060 4 dan pilih Benar.</li>
                    <li>4. Tagihan yang harus dibayar akan muncul pada layar konfirmasi.</li>
                    <li>5. Periksa informasi yang tertera di layar. Pastikan Merchant adalah Shopee, Total tagihan sudah benar dan username kamu Ayu. Jika benar, pilih Ya.</li>
                   </ul>
                   <p class="mt-4 font-bold text-lg">Petunjuk Transfer SMS Banking</p>
                   <ul class="mt-2">
                    <li>1. Kirim SMS "TRANSFER 8805 240 1050  5060 4 Rp59.000" ke 3346.</li>
                    <li>2. Balas SMS yang masuk dengan benar.</li>
                   </ul>

                   <div class="flex items-center justify-center mt-4">
                    <form method="post" action="{{ route('user.confirm', $orderNum) }}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="file" name="receipt" id="receipt" accept="image/*">
                        <button class="w-[150px] h-[30px] bg-[#07511B] text-white font-bold">Ok</button>
                    </form>
                   </div>


                </div>

            </div>

        </div>

    </div>

</div>

<script>
    function copy()
    {
        const copyText = document.getElementById("input");
    
        copyText.select();
        copyText.setSelectionRange(0, 99999); 
    
        navigator.clipboard.writeText(copyText.value);
    }
</script>
   @endsection