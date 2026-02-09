<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Alat</h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-md mx-auto bg-white p-6 rounded shadow">
            <form action="{{ route('admin.alat.store') }}" method="POST">
                @csrf

                <!-- Nama Alat -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Nama Alat</label>
                    <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border px-3 py-2 rounded" required>
                    @error('nama')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Kode Alat -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Kode</label>
                    <input type="text" name="kode" value="{{ old('kode') }}" class="w-full border px-3 py-2 rounded" required>
                    @error('kode')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Jumlah -->
                <div class="mb-4">
                    <label class="block text-gray-700 font-medium mb-1">Jumlah</label>
                    <input type="number" name="jumlah" value="{{ old('jumlah') }}" class="w-full border px-3 py-2 rounded" required>
                    @error('jumlah')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <a href="{{ route('admin.alat.index') }}" class="px-4 py-2 mr-2 bg-gray-300 rounded hover:bg-gray-400">Batal</a>
                    <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
