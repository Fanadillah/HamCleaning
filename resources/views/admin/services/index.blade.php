@extends('layouts.adminApp')

@section('title', 'Manajemen Layanan')

@section('content')
<div>
    <h2 class="text-2xl font-bold mb-4">Manajemen Layanan</h2>
    <a href="{{ route('admin.services.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 font-semibold mb-6 inline-block">+ Tambah Layanan</a>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mt-6">
        @foreach($services as $service)
        <div class="bg-white border rounded-lg shadow hover:shadow-lg transition p-4 flex flex-col">
            <div class="flex flex-col items-center mb-4">
                @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-28 h-28 object-cover rounded mb-2 border" />
                @else
                    <div class="w-28 h-28 bg-gray-100 rounded flex items-center justify-center text-gray-400 mb-2 text-4xl">
                        🧹
                    </div>
                @endif
                <h3 class="font-bold text-lg text-indigo-800 text-center">{{ $service->name }}</h3>
            </div>
            <p class="text-gray-600 text-center mb-2 flex-1">{{ $service->description }}</p>
            <p class="font-semibold text-indigo-700 text-center mb-4">Harga: Rp {{ number_format($service->price, 0, ',', '.') }}</p>
            <div class="flex justify-center gap-4 mt-auto">
                <a href="{{ route('admin.services.edit', $service) }}" class="bg-blue-100 text-blue-700 px-3 py-1 rounded hover:bg-blue-200 font-semibold text-sm">Edit</a>
                <form method="POST" action="{{ route('admin.services.destroy', $service) }}" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus layanan ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-100 text-red-700 px-3 py-1 rounded hover:bg-red-200 font-semibold text-sm">Hapus</button>
                </form>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection