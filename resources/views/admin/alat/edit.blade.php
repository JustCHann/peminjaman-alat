<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Alat</h2>
    </x-slot>

    <form action="{{ route('admin.alat.update', $alat->id) }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-medium">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $alat->nama) }}" class="mt-1 block w-full border rounded px-2 py-1">
            @error('nama') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium">Kode</label>
            <input type="text" name="kode" value="{{ old('kode', $alat->kode) }}" class="mt-1 block w-full border rounded px-2 py-1">
            @error('kode') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div>
            <label class="block font-medium">Jumlah</label>
            <input type="number" name="jumlah" value="{{ old('jumlah', $alat->jumlah) }}" class="mt-1 block w-full border rounded px-2 py-1">
            @error('jumlah') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
            Update
        </button>
    </form>
</x-app-layout>
