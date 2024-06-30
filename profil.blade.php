@extends('layout.dashboard2')
   @section('content')

   <div class="flex w-full h-[600px]">
     <div class="w-[300px] h-full">
      <div class=" mt-[80px] ml-[30px]">
        @include('components.userSideBar')
      </div>
    </div>

    <div class="w-[59%] h-full ml-[190px]">
      <div class="mt-[60px]">
        <h2 class="text-4xl ml-[60px] font-bold font-['Poppins']">My Profil</h2>
        <hr class="w-full border-t-2 border-black mt-3">
      </div>

      <div class="flex">
        <div>
          <div class="w-[222px] h-[187px] rounded-[40px] bg-[url(storage/{{ auth()->user()->photo }})] bg-cover bg-no-repeat bg-center">

          </div>
          <form action="{{ route('profile.photo', auth()->user()->email) }}" method="post" class="mt-3 flex items-center justify-center" enctype="multipart/form-data">
            @csrf
            @method('PUT')
              <input type="file" name="changePhoto" id="fileInput" class="hidden" accept="image/*" onchange="this.form.submit()">
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
              <div class="w-[655px] h-[62px] rounded-lg bg-[#D9D9D9] flex items-center pl-2">{{ auth()->user()->name }}</div>
                <p>EMAIL</p>
              <div class="w-[655px] h-[62px] rounded-lg bg-[#D9D9D9] flex items-center pl-2">{{ auth()->user()->email }}</div>
                <p>ADDRESS</p>
              <div class="w-[271px] h-[62px] rounded-lg bg-[#D9D9D9] flex items-center pl-2">{{ auth()->user()->address }}</div>

              <div class="flex justify-between">
                  <div>
                    <p>Date</p>
                    <div class="w-[201px] h-[62px] rounded-lg bg-[#D9D9D9] flex items-center pl-2">{{ $string[2] }}</div>
                  </div>
                  <div>
                    <p>Month</p>
                    <div class="w-[201px] h-[62px] rounded-lg bg-[#D9D9D9] flex items-center pl-2">{{ $monthName }}</div>
                  </div>
                  <div>
                    <p>Year</p>
                    <div class="w-[201px] h-[62px] rounded-lg bg-[#D9D9D9] flex items-center pl-2">{{ $string[0] }}</div>
                  </div>
              </div>

              <div class="flex justify-end mt-6">
                <button id="updateProfileButton" class="w-[286px] h-[62px] bg-[#61AE77] rounded-[10px]">Update profil</button>
              </div>
          </div>
        </div>
      </div>
    </div>

   <div id="updateProfileModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
  <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
    <div class="flex justify-between items-center">
      <h2 class="text-xl font-semibold">Update Profil</h2>
      <button id="closeUpdateModalButton" class="text-gray-500 hover:text-gray-700">&times;</button>
    </div>
    <form id="updateProfileForm" method="post" action="{{ route('profile.update', auth()->user()->email) }}">
      @csrf
      @method('PUT')
      <div class="mt-4">
        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" id="name" name="name" value="{{ auth()->user()->name }}" class="mt-1 p-2 w-full border rounded-md">
      </div>
      <div class="mt-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
        <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" class="mt-1 p-2 w-full border rounded-md">
      </div>
      <div class="mt-4">
        <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
        <input type="text" id="address" name="address" value="{{ auth()->user()->address }}" class="mt-1 p-2 w-full border rounded-md">
      </div>
      <div class="mt-4">
        <label for="date" class="block text-sm font-medium text-gray-700">Date Of Birth</label>
        <input type="date" id="date" name="date" value="{{ auth()->user()->date }}" class="mt-1 p-2 w-full border rounded-md">
      </div>
      <div class="mt-6 flex justify-end">
        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
      </div>
    </form>
  </div>
</div>

<script>
  // JavaScript to handle modal
  const updateProfileButton = document.getElementById('updateProfileButton');
  const updateProfileModal = document.getElementById('updateProfileModal');
  const closeUpdateModalButton = document.getElementById('closeUpdateModalButton');
  const updateProfileForm = document.getElementById('updateProfileForm');

  updateProfileButton.addEventListener('click', () => {
    // updateProfileForm.action = `/profil/{{ auth()->user()->email }}`; // dynamically set form action
    updateProfileModal.classList.remove('hidden');
  });

  closeUpdateModalButton.addEventListener('click', () => {
    updateProfileModal.classList.add('hidden');
  });

  window.addEventListener('click', (event) => {
    if (event.target == updateProfileModal) {
      updateProfileModal.classList.add('hidden');
    }
  });

</script>
  
   @endsection