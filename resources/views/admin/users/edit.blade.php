<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">Edit User</h2>
    </x-slot>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block">Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $user->nama) }}" class="w-full border rounded p-2">
            @error('nama') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Username</label>
            <input type="text" name="username" value="{{ old('username', $user->username) }}" class="w-full border rounded p-2">
            @error('username') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full border rounded p-2">
            @error('email') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="mb-4">
            <label class="block">Password (biarkan kosong jika tidak ingin ganti)</label>
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
                <option value="admin" @selected($user->role=='admin')>Admin</option>
                <option value="staff" @selected($user->role=='staff')>Staff</option>
                <option value="peminjam" @selected($user->role=='peminjam')>Peminjam</option>
            </select>
            @error('role') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Update</button>
    </form>
</x-app-layout>
