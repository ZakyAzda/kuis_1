<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @can('admin')
                <a href="{{ route('news.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-4 inline-block">
                    Tambah Berita
                </a>
            @endcan

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($news as $item)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-48 object-cover" alt="{{ $item->title }}">
                        <div class="p-6">
                            <h3 class="text-lg font-semibold">{{ $item->title }}</h3>
                            <p class="text-sm text-gray-500 mt-2">
                                Oleh: {{ $item->user->name }} | {{ $item->created_at->format('d M Y') }}
                            </p>
                            <div class="mt-4 flex justify-between items-center">
                                <a href="{{ route('news.show', $item->id) }}" class="text-blue-500 hover:text-blue-700">
                                    Baca Selengkapnya
                                </a>
                                
                                @can('admin')
                                    <div class="flex space-x-2">
                                        <a href="{{ route('news.edit', $item->id) }}" class="text-yellow-500 hover:text-yellow-700">
                                            Edit
                                        </a>
                                        <form action="{{ route('news.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" onclick="return confirm('Yakin ingin menghapus?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                @endcan
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>