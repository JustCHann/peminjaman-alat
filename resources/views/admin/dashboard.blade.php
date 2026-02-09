<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <!-- Header -->
    <header class="bg-indigo-600 text-white px-6 py-4 shadow">
        <h1 class="text-2xl font-semibold">Dashboard Admin</h1>
        <p class="text-sm opacity-90">Sistem Peminjaman Alat</p>
    </header>

    <!-- Content -->
    <main class="p-6">
        <h2 class="text-xl font-bold mb-4">Menu Utama</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- User -->
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition">
                <h3 class="font-semibold text-lg mb-2">Manajemen User</h3>
                <p class="text-sm text-gray-600 mb-4">Kelola admin, staff, dan peminjam</p>
                <a href="/admin/users"
                   class="inline-block px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                    Kelola User
                </a>
            </div>

            <!-- Kategori -->
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition">
                <h3 class="font-semibold text-lg mb-2">Kategori Alat</h3>
                <p class="text-sm text-gray-600 mb-4">Tambah & edit kategori alat</p>
                <a href="/admin/kategori"
                   class="inline-block px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">
                    Kelola Kategori
                </a>
            </div>

            <!-- Alat -->
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition">
                <h3 class="font-semibold text-lg mb-2">Data Alat</h3>
                <p class="text-sm text-gray-600 mb-4">Kelola alat yang tersedia</p>
                <a href="/admin/alat"
                   class="inline-block px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Kelola Alat
                </a>
            </div>

            <!-- Peminjaman -->
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition">
                <h3 class="font-semibold text-lg mb-2">Peminjaman</h3>
                <p class="text-sm text-gray-600 mb-4">Data peminjaman alat</p>
                <a href="/admin/peminjaman"
                   class="inline-block px-4 py-2 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                    Lihat Peminjaman
                </a>
            </div>

            <!-- Pengembalian -->
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition">
                <h3 class="font-semibold text-lg mb-2">Pengembalian</h3>
                <p class="text-sm text-gray-600 mb-4">Data pengembalian alat</p>
                <a href="/admin/pengembalian"
                   class="inline-block px-4 py-2 bg-emerald-600 text-white rounded hover:bg-emerald-700">
                    Lihat Pengembalian
                </a>
            </div>

            <!-- Log Aktivitas -->
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition">
                <h3 class="font-semibold text-lg mb-2">Log Aktivitas</h3>
                <p class="text-sm text-gray-600 mb-4">Riwayat aktivitas admin</p>
                <a href="/admin/log-aktivitas"
                   class="inline-block px-4 py-2 bg-gray-700 text-white rounded hover:bg-gray-800">
                    Lihat Log
                </a>
            </div>

        </div>
    </main>

</body>
</html>
