<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">CRUD Kategori</h2>
    </x-slot>

    <div class="py-4">
        <a href="{{ route('admin.kategori.create') }}" class="mb-2 inline-block px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
            Tambah Kategori
        </a>

        @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">Nama Kategori</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategoris as $kategori)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $kategori->nama_kategori }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.kategori.edit', $kategori->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>

                        <form action="{{ route('admin.kategori.destroy', $kategori->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')" class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
