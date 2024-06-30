@extends('layout.adminPage')

@section('content')
    <div class="flex justify-start items-start h-[100%] flex-wrap gap-[10px]">
        @isset($items)
                @foreach ($items as $item)
                    <div class="top-0 w-[359px] h-[300px] bg-white rounded-[10px] shadow">
                        <img class="left-0 top-0 w-[359px] h-[200px] rounded-[10px]" src="/storage/{{ $item->thumbnail }}" />
                        <div class="px-[3px] bg-white rounded-[5px]">
                            <div class="flex align-center">
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
                            {{ $item->title }}
                            <p>Rp {{ number_format($item->price) }}</p>

                            <div class="flex justify-between mt-3">
                                <button class="edit-button w-[45%] py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-green-900 hover:bg-indigo-700 cursor-pointer mb-2" id="{!! $no++ !!}" data-item-id="{{ $item->slug }}">Edit</button>
                                <button class="delete-button w-[45%] py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-800 cursor-pointer mb-2" data-item-id="{{ $item->slug }}">Delete</button>
                            </div>
                        </div>
                    </div>
                    <!-- Modal Edit -->
                    <div id="editModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-semibold">Edit Produk</h2>
                                <button id="closeEditModalButton" class="text-gray-500 hover:text-gray-700">&times;</button>
                            </div>
                            <form method="POST" id="editproduk" action="{{ route('item.update', $item->slug) }}" enctype="multipart/form-data">
                
                                @csrf
                                @method('PUT')
                                <div class="mt-4">
                                    <label for="title" class="block text-sm font-medium text-gray-700">Nama makanan</label>
                                    <input type="text" id="title" name="title" class="mt-1 p-2 w-full border rounded-md">
                                </div>
                                <div class="mt-4">
                                    <label for="origin" class="block text-sm font-medium text-gray-700">Asal daerah</label>
                                    <input type="text" id="origin" name="origin" class="mt-1 p-2 w-full border rounded-md">
                                </div>
                                <div class="mt-4">
                                    <label for="stock" class="block text-sm font-medium text-gray-700">Stok</label>
                                    <input type="number" id="stock" name="stock" class="mt-1 p-2 w-full border rounded-md">
                                </div>
                                <div class="mt-4">
                                    <label for="thumbnail" class="block text-sm font-medium text-gray-700">Thumbnail</label>
                                    <input type="file" id="thumbnail" name="thumbnail" class="mt-1 p-2 w-full border rounded-md" accept="image/*">
                                </div>
                                <div class="mt-4">
                                    <label for="price" class="block text-sm font-medium text-gray-700">Harga</label>
                                    <input type="number" id="price" name="price" class="mt-1 p-2 w-full border rounded-md">
                                </div>
                                <div class="mt-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
                                    <input id="x" type="hidden" name="description" id="description">
                                    <trix-editor input="x" class="w-[100%] h-[150px]  bg-black bg-opacity-20 border-0" name="description" id="description"></trix-editor>
                                </div>
                                <div class="mt-6 flex justify-end">
                                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                
                    <!-- Modal Delete -->
                    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                        <div class="bg-white rounded-lg shadow-lg p-6 w-1/3">
                            <div class="flex justify-between items-center">
                                <h2 class="text-xl font-semibold">Delete Confirmation</h2>
                                <button id="closeDeleteModalButton" class="text-gray-500 hover:text-gray-700">&times;</button>
                            </div>
                            <div class="mt-4">
                                <p>Are you sure you want to delete this item?</p>
                            </div>
                            <div class="mt-6 flex justify-end">
                                <form method="POST" id="deleteForm" action="{{ route('item.delete',$item->slug) }}">
                                    @csrf
                                <button id="confirmDeleteButton" class="px-4 py-2 bg-red-600 text-white rounded mr-2">Delete</button>
                            </form>
                                <button id="cancelDeleteButton" class="px-4 py-2 bg-gray-300 text-black rounded">Cancel</button>
                            </div>
                        </div>
                    </div>
                    <?php
                        $descriptionItem = strip_tags($item->description);
                    ?>
                @endforeach
        @else
            <p>Barang kosong</p>
        @endisset
    </div>

    <script>
        // JavaScript to handle modals
        const editButtons = document.querySelectorAll('.edit-button');
        const deleteButtons = document.querySelectorAll('.delete-button');
        const editModal = document.getElementById('editModal');
        const deleteModal = document.getElementById('deleteModal');
        const closeEditModalButton = document.getElementById('closeEditModalButton');
        const closeDeleteModalButton = document.getElementById('closeDeleteModalButton');
        const cancelDeleteButton = document.getElementById('cancelDeleteButton');
        const confirmDeleteButton = document.getElementById('confirmDeleteButton');
        const editForm = document.getElementById('editproduk');
        const deleteForm = document.getElementById('deleteForm');
        let itemIdToDelete = null;

        editButtons.forEach(button => {
            button.addEventListener('click', () => {
                const itemId = button.getAttribute('data-item-id');
                const id = button.getAttribute('id');
                // Fetch item data using itemId and populate the form (this is just an example)
                // In a real application, you might fetch data from the server
                const item = {!! $data !!};
                document.getElementById('title').value = item[id]["title"];
                document.getElementById('origin').value = item[id]["origin"];
                document.getElementById('stock').value = item[id]["stock"];
                // document.getElementById('thumbnail').value = item.thumbnail;
                document.getElementById('price').value = item[id]["price"];
                document.getElementById('description').value = item[id]["description"];
                editForm.action = `/adminBarang/${itemId}`; // dynamically set form action
                editModal.classList.remove('hidden');
            });
        });

        deleteButtons.forEach(button => {
            button.addEventListener('click', () => {
                const itemIdToDelete = button.getAttribute('data-item-id');
                deleteForm.action = `/adminBarang/${itemIdToDelete}`; // dynamically set form action
                deleteModal.classList.remove('hidden');
            });
        });

        closeEditModalButton.addEventListener('click', () => {
            editModal.classList.add('hidden');
        });

        closeDeleteModalButton.addEventListener('click', () => {
            deleteModal.classList.add('hidden');
        });

        cancelDeleteButton.addEventListener('click', () => {
            deleteModal.classList.add('hidden');
        });

        window.addEventListener('click', (event) => {
            if (event.target == editModal) {
                editModal.classList.add('hidden');
            }
            if (event.target == deleteModal) {
                deleteModal.classList.add('hidden');
            }
        });

        

        confirmDeleteButton.addEventListener('click', () => {
            deleteForm.submit(); // Submit the form to delete the item
        });
    </script>

@endsection
