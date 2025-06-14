@extends('layouts.app')

@section('title', 'Layanan')

@section('content')
<div>
    <h2 class="text-3xl font-bold mb-8 text-center text-indigo-700">Layanan Kami</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        @foreach($services as $service)
        <div class="bg-white rounded-lg shadow hover:shadow-lg transition p-4 flex flex-col items-center">
            @if($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-32 h-32 object-cover rounded mb-4 border" />
            @else
                <div class="w-32 h-32 flex items-center justify-center bg-gray-100 rounded mb-4 text-gray-400">
                    <span class="text-4xl">🧹</span>
                </div>
            @endif
            <h3 class="font-bold text-lg mb-2 text-indigo-800 text-center">{{ $service->name }}</h3>
            <p class="text-gray-600 text-center mb-2">{{ $service->description }}</p>
            <p class="font-semibold text-indigo-700 mb-4">Harga: Rp {{ number_format($service->price, 0, ',', '.') }}</p>
            <a href="{{ route('bookings.index', ['service' => $service->id]) }}"
               class="mt-auto bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded transition font-semibold">
                Pesan Sekarang
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection