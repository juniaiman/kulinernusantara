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
<body class="flex items-center justify-center h-screen">
    <div class="w-[600px] h-[350px] bg-[#07511B] ">
        <div class="mt-5">
            <h2 class="text-white text-2xl font-bold ml-4">Find Your Account</h2>
            <div class="w-full h-1 bg-white mt-2"></div>
        </div>

        <form action="{{ route ('validasipasswordact')}}" method="post" class="flex items-center justify-center mt-4">
            @csrf
        <div class="mt-4">
            @if(session()->has('success'))
            <p class="ml-4 text-yellow-500">{{ session()->get('success') }}</p>
            @endif
            <input type="hidden" name="token" id="token" value="{{ $token }}">
            <h2 class="ml-4 text-white text-xl ">Enter Your New Password</h2>
                <input type="password" name="password" class="ml-4 mt-4 mr-4 w-[565px] h-[55px] bg-[#A5A5A5] pl-4 placeholder-white text-white" placeholder="New Password">
                @error('password')
                <small class="ml-4 text-red-500">{{ $message }}</small>
                @enderror
                
                <div class="flex ml-4 mt-5 space-x-10 mr-6">
                    {{-- <button class="w-[100px] h-[37px] bg-[#A5A5A5] rounded-[10px]">cancel</button> --}}
                    <button class="w-[160px] h-[37px] bg-green-400">Change Password</button>
                </div>
                
                
            </div>
        </form>
            
    </div>

<script>
        feather.replace();
    </script>
</body>
</html>