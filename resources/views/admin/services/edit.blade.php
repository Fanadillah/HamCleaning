@extends('layouts.adminApp')

@section('title', 'Edit Layanan')

@section('content')
@if ($errors->any())
    <div class="mb-4">
        <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="max-w-lg mx-auto bg-white rounded-lg shadow p-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-700">Edit Layanan</h2>
    <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label for="name" class="block text-sm font-medium mb-1">Nama Layanan</label>
            <input type="text" name="name" id="name" value="{{ $service->name }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        <div>
            <label for="description" class="block text-sm font-medium mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">{{ $service->description }}</textarea>
        </div>
        <div>
            <label for="price" class="block text-sm font-medium mb-1">Harga</label>
            <input type="number" name="price" id="price" value="{{ $service->price }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        <div>
            <label for="image" class="block text-sm font-medium mb-1">Gambar Layanan</label>
            <input type="file" name="image" id="image" accept="image/*"
                   class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" />
            @if($service->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-24 h-24 object-cover rounded border">
                    <p class="text-xs text-gray-500 mt-1">Gambar saat ini</p>
                </div>
            @endif
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 font-semibold shadow transition">
                Perbarui Layanan
            </button>
        </div>
    </form>
</div>
@endsection