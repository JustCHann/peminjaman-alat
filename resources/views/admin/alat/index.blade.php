<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">CRUD Alat</h2>
    </x-slot>

    <div class="py-4">
        <a href="{{ route('admin.alat.create') }}" class="mb-2 inline-block px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
            Tambah Alat
        </a>

        <table class="min-w-full bg-white rounded shadow">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="px-4 py-2">Nama Alat</th>
                    <th class="px-4 py-2">kode</th>
                    <th class="px-4 py-2">Jumlah</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($alats as $alat)
                <tr class="border-t">
                    <td class="px-4 py-2">{{ $alat->nama }}</td>
                    <td class="px-4 py-2">{{ $alat->kode }}</td>
                    <td class="px-4 py-2">{{ $alat->jumlah }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('admin.alat.edit', $alat->id) }}" class="px-2 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">Edit</a>

                        <form action="{{ route('admin.alat.destroy', $alat->id) }}" method="POST" class="inline">
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
