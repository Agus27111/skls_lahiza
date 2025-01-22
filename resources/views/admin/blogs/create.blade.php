<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Blog') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                @if($errors->any())
                    @foreach ($errors->all() as $error )
                    <div class="py-3 w-full rounded-3xl bg-red-500 text-white">{{ $error }}</div>

                    @endforeach
                @endif

                <form method="POST" action="{{ route('admin.blogs.store') }} " enctype="multipart/form-data">
                    @csrf
                    <div>
                        <x-input-label for="title" :value="__('Title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="author" :value="__('author')" />
                        <x-text-input id="author" class="block mt-1 w-full" type="text" name="author" :value="old('author')" required autofocus autocomplete="author" />
                        <x-input-error :messages="$errors->get('author')" class="mt-2" />
                    </div>

                    <div>
                        <x-input-label for="content" :value="__('content')" />
                        <textarea id="content" name="content"
                                  class="block mt-1 w-full rounded-lg border border-slate-300 p-3 h-40 resize-y"
                                  required autofocus autocomplete="content">{{ old('content') }}</textarea>
                        <x-input-error :messages="$errors->get('content')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="image" :value="__('image')" />
                        <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" required autofocus autocomplete="image" />
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>


                    <div class="mt-4">
                        <x-input-label for="category_id" :value="__('Class')" />
                        <select name="category_id" id="category_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />

                        <!-- Button untuk membuka form tambah Kategori -->
                        <button type="button" id="addCategoryButton" class="mt-2 text-indigo-700 underline">Add New Category</button>

                        <!-- Form untuk menambahkan Kategori -->
                        <div class="hidden mt-4" id="addCategoryForm">
                            <x-input-label for="newCategoryName" :value="__('New Category Name')" />
                            <x-text-input id="newCategoryName" class="block mt-1 w-full" type="text" name="newCategoryName" placeholder="Enter new category name" />


                            <x-input-label for="newCategoryColor" :value="__('Category Color')" class="mt-4" />
                            <input id="newCategoryColor" class="mt-2 w-1/12 block rounded-lg border border-slate-300" type="color" name="newCategoryColor" value="#ffffff" />

                            <button type="button" id="saveCategoryButton" class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full mt-2">
                                Save New Category
                            </button>
                        </div>

                    </div>


                    <div class="flex items-center justify-end mt-4">

                        <button type="submit" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Add New Blog
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>


<script>

document.getElementById('addCategoryButton').addEventListener('click', function () {
    document.getElementById('addCategoryForm').classList.toggle('hidden');
});

document.getElementById('saveCategoryButton').addEventListener('click', function () {
    const newCategoryName = document.getElementById('newCategoryName').value.trim();
    const newCategoryColor = document.getElementById('newCategoryColor').value;

    if (!newCategoryName) {
        alert('Category name cannot be empty.');
        return;
    }

    fetch('{{ route("admin.categories.store") }}', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}',
    },
    body: JSON.stringify({
        name: newCategoryName,
        color: newCategoryColor,
    }),
})
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            console.log('Response:', data);
            const categoryDropdown = document.getElementById('category_id');
            const newOption = document.createElement('option');

            // Set value dan teks opsi baru
            newOption.value = data.category.id;
            newOption.textContent = data.category.name;

            // Tambahkan warna latar belakang ke opsi
            newOption.setAttribute('style', `background-color: ${data.category.color};`);

            // Tambahkan opsi ke dropdown
            categoryDropdown.appendChild(newOption);

            // Pilih opsi baru secara otomatis
            categoryDropdown.value = data.category.id;

            // Kosongkan input dan sembunyikan form
            document.getElementById('newCategoryName').value = '';
            document.getElementById('newCategoryColor').value = '#ffffff';
            document.getElementById('addCategoryForm').classList.add('hidden');

            alert('Category added successfully!');
        } else {
            alert(data.message || 'Failed to add category.');
        }
    })
    .catch(error => {
        console.error('Error adding category:', error);
        alert('An error occurred. Please try again.');
    });

});


</script>
