@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h2 class="text-3xl font-bold text-red-500 mb-6">Lengkapi Data Internal</h2>
    <form method="POST" action="{{ route('internal.store') }}" class="bg-white p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-6">
            <label for="nia" class="block text-gray-700 font-medium mb-2">Nomor Induk Anggota (NIA)</label>
            <input type="text" name="nia" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" required>
        </div>

        <div class="mb-6">
            <label for="position" class="block text-gray-700 font-medium mb-2">Jabatan di KPB Gianyar</label>
            <input type="text" name="position" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent" required>
        </div>

        <div class="mb-6">
            <label for="kpbprov" class="block text-gray-700 font-medium mb-2">Jabatan di KPB Provinsi (Opsional)</label>
            <input type="text" name="kpbprov" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-transparent">
        </div>

        <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
            Simpan
        </button>
    </form>
</div>
@endsection