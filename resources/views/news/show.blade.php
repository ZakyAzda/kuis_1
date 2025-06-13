<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Berita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="w-full h-64 object-cover">
                
                <div class="p-6">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-2xl font-bold text-gray-900">{{ $news->title }}</h1>
                            <p class="text-sm text-gray-500 mt-2">
                                Oleh: {{ $news->user->name }} | {{ $news->created_at->format('d M Y H:i') }}
                            </p>
                        </div>
                        
                        @can('admin')
                        <div class="flex space-x-2">
                            <a href="{{ route('news.edit', $news->id) }}" 
                               class="text-yellow-600 hover:text-yellow-800">
                                Edit
                            </a>
                            <form method="POST" action="{{ route('news.destroy', $news->id) }}"
                                  onsubmit="return confirm('Yakin ingin menghapus berita ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 ml-2">
                                    Hapus
                                </button>
                            </form>
                        </div>
                        @endcan
                    </div>
                    
                    <div class="mt-6 prose max-w-none">
                        {!! nl2br(e($news->content)) !!}
                    </div>
                    
                    <div class="mt-8">
                        <a href="{{ route('news.index') }}" 
                           class="text-blue-600 hover:text-blue-800">
                            &larr; Kembali ke Daftar Berita
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>