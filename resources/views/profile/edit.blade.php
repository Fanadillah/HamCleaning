@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow p-8 mt-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-indigo-700">Edit Profil</h2>
    @if ($errors->any())
        <div class="mb-4">
            <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="{{ route('profile.update') }}" class="space-y-5">
        @csrf
        @method('PATCH')
        <div>
            <label for="name" class="block text-sm font-medium mb-1">Nama</label>
            <input type="text" name="name" id="name" value="{{ Auth::user()->name }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        <div>
            <label for="email" class="block text-sm font-medium mb-1">Email</label>
            <input type="email" name="email" id="email" value="{{ Auth::user()->email }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700 font-semibold shadow transition">
                Perbarui Profil
            </button>
        </div>
    </form>
</div>
@endsection