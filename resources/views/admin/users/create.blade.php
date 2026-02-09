<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Tambah User</h2>
    </x-slot>

    <form action="{{ route('admin.users.store') }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf

        <div class="mb-4">
            <label class="block">Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border rounded p-2">
            @error('nama') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Username</label>
            <input type="text" name="username" value="{{ old('username') }}" class="w-full border rounded p-2">
            @error('username') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="w-full border rounded p-2">
            @error('email') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Password</label>
            <input type="password" name="password" class="w-full border rounded p-2">
            @error('password') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="w-full border rounded p-2">
        </div>

        <div class="mb-4">
            <label class="block">Role</label>
            <select name="role" class="w-full border rounded p-2">
                <option value="admin">Admin</option>
                <option value="staff">Staff</option>
                <option value="peminjam">Peminjam</option>
            </select>
            @error('role') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan</button>
    </form>
</x-app-layout>
