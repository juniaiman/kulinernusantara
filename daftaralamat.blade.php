<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
</head>
<body class = "flex items-center justify-center h-screen">
    <div class = "md:w-[700px] md:h-[500px] bg-green-500">
<div class ="w-[86%] h-full mx-auto ">
    <div class ="pt-6">
        <h2 class ="ml-8">Daftar Alamat</h2>
        <div class ="w-full h-1 bg-white flex items-center">

        </div>
    </div>
<div class ="flex justify-between ml-8 mt-4">
<div>
    <p>Nama Lengkap</p>
    <input type="text" class ="w-[330px] h-[40px] rounded-[10px]">
</div>
<div>
    <p>Nomor HP</p>
    <input type="text" class ="w-[200px] h-[40px] rounded-[10px]">
</div>
</div>
<div class ="flex justify-between ml-8 mt-4">
<div>
    <p>Provinsi, Kota, Kecamatan</p>
    <input type="text" class ="w-[430px] h-[40px] rounded-[10px]">
</div>
<div>
    <p>Kode Pos</p>
    <input type="text" class ="w-[100px] h-[40px] rounded-[10px]">
</div>
</div>
<div class = "ml-8 mt-4">
<p>Nama jalan, Gedung, Rumah</p>
<input type="text" class ="w-[330px] h-[84px] rounded-[10px]">
</div>
<div class = "ml-8 mt-4">
<p>Detail Lainnya (cth. Blok/unit, No, Patokan)</p>
<input type="text" class ="w-[330px] h-[40px] rounded-[10px]">
</div>
<div class = "mt-4 flex justify-end w-full h-[70px] space-x-6">
<button class ="w-[100px] h-[40px] bg-gray-500">Batal Simpan</button>
<button class ="w-[130px] h-[40px] bg-[#07511B]">Simpan Alamat</button>
</div>
</div>
    </div>
    
<script>
        feather.replace();
    </script>
</body>

</html>