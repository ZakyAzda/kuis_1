<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('news.update', $news->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-4">
                            <x-input-label for="title" :value="__('Judul')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" 
                                value="{{ old('title', $news->title) }}" required />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="content" :value="__('Konten')" />
                            <textarea id="content" name="content" rows="6" 
                                class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" 
                                required>{{ old('content', $news->content) }}</textarea>
                            <x-input-error :messages="$errors->get('content')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <x-input-label for="image" :value="__('Gambar Saat Ini')" />
                            <img src="{{ asset('storage/' . $news->image) }}" alt="Current Image" class="h-48 w-full object-cover mb-2">
                            <x-input-label for="new_image" :value="__('Gambar Baru (Opsional)')" />
                            <x-text-input id="new_image" class="block mt-1 w-full" type="file" name="image" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <a href="{{ route('news.index') }}" class="text-gray-600 hover:text-gray-900">
                                {{ __('Kembali') }}
                            </a>
                            
                            <div class="flex space-x-4">
                                <x-danger-button type="button" 
                                    onclick="if(confirm('Yakin ingin menghapus berita ini?')) { document.getElementById('delete-form').submit(); }">
                                    {{ __('Hapus Berita') }}
                                </x-danger-button>
                                
                                <x-primary-button>
                                    {{ __('Simpan Perubahan') }}
                                </x-primary-button>
                            </div>
                        </div>
                    </form>

                    <!-- Form untuk hapus (tersembunyi) -->
                    <form id="delete-form" method="POST" action="{{ route('news.destroy', $news->id) }}" class="hidden">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>