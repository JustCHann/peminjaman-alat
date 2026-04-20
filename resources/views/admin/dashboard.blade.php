<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Dashboard · Alatify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .nav-item { transition: all 0.2s ease; }
        .nav-item:hover { background-color: rgba(255,255,255,0.08); }
        .card-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .card-hover:hover { transform: translateY(-2px); box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.05), 0 8px 10px -6px rgb(0 0 0 / 0.02); }
        .nav-active { background-color: rgba(255,255,255,0.12); border-left: 4px solid white; }
    </style>
</head>
<body class="bg-gray-50 antialiased flex min-h-screen">

    <!-- === SIDEBAR MODERN === -->
    <aside class="w-72 bg-gradient-to-b from-indigo-800 to-indigo-900 text-white shadow-xl flex-shrink-0 hidden md:flex flex-col">
        <!-- Logo & app name -->
        <div class="px-6 pt-8 pb-6 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 bg-white/20 backdrop-blur rounded-xl flex items-center justify-center">
                    <ion-icon name="layers-outline" class="text-2xl text-white"></ion-icon>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Alatify</h1>
                    <p class="text-xs text-indigo-200/80 mt-0.5">sistem peminjaman</p>
                </div>
            </div>
        </div>

        <!-- Primary navigation -->
        <div class="flex-1 px-4 pt-6 pb-4 space-y-1 overflow-y-auto">
            <p class="text-xs uppercase tracking-wider text-indigo-200/70 px-3 pb-2 font-semibold">Menu utama</p>
            
            <a href="#" class="nav-item nav-active flex items-center gap-4 px-4 py-3.5 rounded-xl text-white font-medium">
                <ion-icon name="grid-outline" class="text-xl"></ion-icon>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.users.index') }}" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white">
                <ion-icon name="people-outline" class="text-xl"></ion-icon>
                <span>Manajemen User</span>
            </a>
            <a href="{{ route('admin.kategori.index') }}" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white">
                <ion-icon name="pricetags-outline" class="text-xl"></ion-icon>
                <span>Kategori Alat</span>
            </a>
            <a href="{{ route('admin.alat.index') }}" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white">
                <ion-icon name="construct-outline" class="text-xl"></ion-icon>
                <span>Data Alat</span>
            </a>
            <a href="{{ route('admin.peminjaman.index') }}" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white">
                <ion-icon name="calendar-outline" class="text-xl"></ion-icon>
                <span>Peminjaman</span>
            </a>
            <a href="{{ route('admin.pengembalian.index') }}" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white">
                <ion-icon name="arrow-undo-outline" class="text-xl"></ion-icon>
                <span>Pengembalian</span>
            </a>
            <a href="{{ route('admin.logaktifitas.index') }}" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white">
                <ion-icon name="document-text-outline" class="text-xl"></ion-icon>
                <span>Log Aktivitas</span>
            </a>
        </div>

        <!-- Footer / user profile dengan LOGOUT (POST method - yang sudah berfungsi) -->
        <div class="px-5 py-5 border-t border-white/10 mt-2">
            <div class="flex items-center gap-3 mb-3">
                <div class="h-9 w-9 bg-indigo-500 rounded-full flex items-center justify-center ring-2 ring-white/30">
                    <span class="text-sm font-semibold text-white">{{ substr(Auth::user()->name ?? 'AD', 0, 2) }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->nama ?? 'Admin Utama' }}</p>
                    <p class="text-xs text-indigo-200/80 truncate">{{ Auth::user()->email ?? 'admin@alatify.test' }}</p>
                </div>
            </div>
            
            <!-- LOGOUT PAKAI POST - TETAP MENGGUNAKAN FORM YANG SUDAH BERFUNGSI -->
            <form action="{{ route('logout') }}" method="POST" id="logout-form-sidebar">
                @csrf
                <button type="submit" class="w-full mt-2 flex items-center justify-center gap-2 px-4 py-2.5 bg-white/10 hover:bg-red-500/20 text-white rounded-xl transition-all duration-200 text-sm font-medium border border-white/20 hover:border-red-400/50 group">
                    <ion-icon name="log-out-outline" class="text-lg group-hover:rotate-12 transition-transform"></ion-icon>
                    <span>Logout</span>
                </button>
            </form>
        </div>
    </aside>

    <!-- === MAIN CONTENT === -->
    <main class="flex-1 flex flex-col min-h-screen bg-gray-50/80">
        
        <!-- Top bar modern -->
        <header class="bg-white/80 backdrop-blur-md border-b border-gray-200/60 px-8 py-4 sticky top-0 z-10 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button class="md:hidden text-gray-600 hover:text-indigo-700 focus:outline-none" aria-label="Menu" onclick="toggleMobileSidebar()">
                    <ion-icon name="menu-outline" class="text-2xl"></ion-icon>
                </button>
                <h1 class="text-lg md:text-2xl font-semibold text-gray-800 tracking-tight">Dashboard</h1>
            </div>
            
            <!-- Mobile logout button (POST) -->
            <form action="{{ route('logout') }}" method="POST" id="logout-form-mobile">
                @csrf
                <button type="submit" class="md:hidden flex items-center gap-1.5 px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100 transition">
                    <ion-icon name="log-out-outline" class="text-base"></ion-icon>
                    <span>Logout</span>
                </button>
            </form>
        </header>

        <!-- Page content -->
        <div class="p-6 md:p-8 space-y-8">
            
            <!-- Welcome Section -->
            <div class="bg-gradient-to-r from-indigo-50 to-white rounded-2xl p-6 border border-indigo-100">
                <div class="flex items-center gap-4">
                    <div class="h-14 w-14 bg-indigo-100 rounded-full flex items-center justify-center">
                        <ion-icon name="person-circle-outline" class="text-3xl text-indigo-600"></ion-icon>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Selamat datang, {{ Auth::user()->nama }}!</h2>
                        <p class="text-sm text-gray-500 mt-0.5">Anda login sebagai <span class="font-medium text-indigo-600">{{ ucfirst(Auth::user()->role ?? 'Admin') }}</span></p>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between card-hover">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total Alat</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1">{{ \App\Models\Alat::count() }}    </p>
                        <span class="text-xs text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full mt-2 inline-block">tersedia</span>
                    </div>
                    <div class="h-12 w-12 bg-indigo-100 rounded-xl flex items-center justify-center text-indigo-700">
                        <ion-icon name="hardware-chip-outline" class="text-2xl"></ion-icon>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between card-hover">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Peminjaman Aktif</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1">{{ \App\Models\Peminjaman::where('status', 'aktif')->count() }}</p>
                        <span class="text-xs text-amber-600 bg-amber-50 px-2 py-1 rounded-full mt-2 inline-block">berlangsung</span>
                    </div>
                    <div class="h-12 w-12 bg-orange-100 rounded-xl flex items-center justify-center text-orange-600">
                        <ion-icon name="sync-outline" class="text-2xl"></ion-icon>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between card-hover">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Total User</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1">{{ \App\Models\User::count() }}</p>
                        <span class="text-xs text-blue-600 bg-blue-50 px-2 py-1 rounded-full mt-2 inline-block">terdaftar</span>
                    </div>
                    <div class="h-12 w-12 bg-sky-100 rounded-xl flex items-center justify-center text-sky-600">
                        <ion-icon name="people-outline" class="text-2xl"></ion-icon>
                    </div>
                </div>
                
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center justify-between card-hover">
                    <div>
                        <p class="text-sm text-gray-500 font-medium">Pengembalian</p>
                        <p class="text-3xl font-bold text-gray-800 mt-1">{{ $pengembalianHariIni ?? 0 }}</p>
                        <span class="text-xs text-emerald-600 bg-emerald-50 px-2 py-1 rounded-full mt-2 inline-block">hari ini</span>
                    </div>
                    <div class="h-12 w-12 bg-emerald-100 rounded-xl flex items-center justify-center text-emerald-700">
                        <ion-icon name="checkmark-done-outline" class="text-2xl"></ion-icon>
                    </div>
                </div>
            </div>

            <!-- Menu / fitur akses cepat -->
            <div>
                <div class="flex items-center justify-between mb-5">
                    <h2 class="text-lg font-semibold text-gray-800">Manajemen Cepat</h2>
                    <span class="text-xs text-gray-400 bg-white px-4 py-2 rounded-full border">6 modul</span>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-indigo-200 transition-all card-hover">
                        <div class="flex items-start justify-between">
                            <div class="h-11 w-11 bg-gradient-to-br from-red-100 to-red-50 rounded-xl flex items-center justify-center text-red-600 group-hover:scale-110 transition">
                                <ion-icon name="people-circle-outline" class="text-2xl"></ion-icon>
                            </div>
                            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1.5 rounded-full font-medium">admin</span>
                        </div>
                        <div class="mt-4">
                            <h3 class="font-semibold text-lg text-gray-800 group-hover:text-indigo-700 transition">Manajemen User</h3>
                            <p class="text-sm text-gray-500 mt-1 mb-5">Kelola admin, staff, dan peminjam</p>
                            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-indigo-700 hover:text-indigo-900 transition">
                                Kelola User
                                <ion-icon name="arrow-forward-outline" class="text-base"></ion-icon>
                            </a>
                        </div>
                    </div>

                    <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-indigo-200 transition-all card-hover">
                        <div class="flex items-start justify-between">
                            <div class="h-11 w-11 bg-gradient-to-br from-green-100 to-green-50 rounded-xl flex items-center justify-center text-green-600 group-hover:scale-110 transition">
                                <ion-icon name="pricetags-outline" class="text-2xl"></ion-icon>
                            </div>
                            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1.5 rounded-full font-medium">kategori</span>
                        </div>
                        <div class="mt-4">
                            <h3 class="font-semibold text-lg text-gray-800 group-hover:text-indigo-700 transition">Kategori Alat</h3>
                            <p class="text-sm text-gray-500 mt-1 mb-5">Tambah & edit kategori alat</p>
                            <a href="{{ route('admin.kategori.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-indigo-700 hover:text-indigo-900">
                                Kelola Kategori
                                <ion-icon name="arrow-forward-outline" class="text-base"></ion-icon>
                            </a>
                        </div>
                    </div>

                    <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-indigo-200 transition-all card-hover">
                        <div class="flex items-start justify-between">
                            <div class="h-11 w-11 bg-gradient-to-br from-blue-100 to-blue-50 rounded-xl flex items-center justify-center text-blue-600 group-hover:scale-110 transition">
                                <ion-icon name="build-outline" class="text-2xl"></ion-icon>
                            </div>
                            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1.5 rounded-full font-medium">inventaris</span>
                        </div>
                        <div class="mt-4">
                            <h3 class="font-semibold text-lg text-gray-800 group-hover:text-indigo-700 transition">Data Alat</h3>
                            <p class="text-sm text-gray-500 mt-1 mb-5">Kelola alat yang tersedia</p>
                            <a href="{{ route('admin.alat.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-indigo-700 hover:text-indigo-900">
                                Kelola Alat
                                <ion-icon name="arrow-forward-outline" class="text-base"></ion-icon>
                            </a>
                        </div>
                    </div>

                    <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-indigo-200 transition-all card-hover">
                        <div class="flex items-start justify-between">
                            <div class="h-11 w-11 bg-gradient-to-br from-yellow-100 to-yellow-50 rounded-xl flex items-center justify-center text-yellow-600 group-hover:scale-110 transition">
                                <ion-icon name="calendar-clear-outline" class="text-2xl"></ion-icon>
                            </div>
                            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1.5 rounded-full font-medium">transaksi</span>
                        </div>
                        <div class="mt-4">
                            <h3 class="font-semibold text-lg text-gray-800 group-hover:text-indigo-700 transition">Peminjaman</h3>
                            <p class="text-sm text-gray-500 mt-1 mb-5">Data peminjaman alat</p>
                            <a href="{{ route('admin.peminjaman.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-indigo-700 hover:text-indigo-900">
                                Lihat Peminjaman
                                <ion-icon name="arrow-forward-outline" class="text-base"></ion-icon>
                            </a>
                        </div>
                    </div>

                    <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-indigo-200 transition-all card-hover">
                        <div class="flex items-start justify-between">
                            <div class="h-11 w-11 bg-gradient-to-br from-emerald-100 to-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 group-hover:scale-110 transition">
                                <ion-icon name="arrow-undo-outline" class="text-2xl"></ion-icon>
                            </div>
                            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1.5 rounded-full font-medium">kembali</span>
                        </div>
                        <div class="mt-4">
                            <h3 class="font-semibold text-lg text-gray-800 group-hover:text-indigo-700 transition">Pengembalian</h3>
                            <p class="text-sm text-gray-500 mt-1 mb-5">Data pengembalian alat</p>
                            <a href="{{ route('admin.pengembalian.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-indigo-700 hover:text-indigo-900">
                                Lihat Pengembalian
                                <ion-icon name="arrow-forward-outline" class="text-base"></ion-icon>
                            </a>
                        </div>
                    </div>

                    <div class="group bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:border-indigo-200 transition-all card-hover">
                        <div class="flex items-start justify-between">
                            <div class="h-11 w-11 bg-gradient-to-br from-gray-200 to-gray-100 rounded-xl flex items-center justify-center text-gray-700 group-hover:scale-110 transition">
                                <ion-icon name="document-text-outline" class="text-2xl"></ion-icon>
                            </div>
                            <span class="bg-gray-100 text-gray-600 text-xs px-3 py-1.5 rounded-full font-medium">riwayat</span>
                        </div>
                        <div class="mt-4">
                            <h3 class="font-semibold text-lg text-gray-800 group-hover:text-indigo-700 transition">Log Aktivitas</h3>
                            <p class="text-sm text-gray-500 mt-1 mb-5">Riwayat aktivitas admin</p>
                            <a href="#" class="inline-flex items-center gap-2 text-sm font-medium text-indigo-700 hover:text-indigo-900">
                                Lihat Log
                                <ion-icon name="arrow-forward-outline" class="text-base"></ion-icon>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="mt-auto px-8 py-5 text-xs text-gray-400 border-t border-gray-200/60 flex justify-between bg-white/50">
            <span>© 2026 Alatify — Sistem Peminjaman Alat</span>
            <span class="flex gap-4"><a href="#" class="hover:text-indigo-600">Bantuan</a><a href="#" class="hover:text-indigo-600">Privasi</a></span>
        </footer>
    </main>

    <!-- Mobile Sidebar -->
    <div id="mobileSidebar" class="md:hidden fixed inset-0 z-50 hidden transition-all">
        <div class="absolute inset-0 bg-black/30" onclick="toggleMobileSidebar()"></div>
        <div class="absolute left-0 top-0 h-full w-72 bg-gradient-to-b from-indigo-800 to-indigo-900 shadow-xl overflow-y-auto">
            <div class="px-6 pt-8 pb-6 border-b border-white/10 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <ion-icon name="layers-outline" class="text-2xl text-white"></ion-icon>
                    </div>
                    <h1 class="text-xl font-bold text-white">Alatify</h1>
                </div>
                <button onclick="toggleMobileSidebar()" class="text-white/70 hover:text-white">
                    <ion-icon name="close-outline" class="text-2xl"></ion-icon>
                </button>
            </div>
            <div class="px-4 pt-4 pb-20">
                <p class="text-xs uppercase tracking-wider text-indigo-200/70 px-3 pb-2 font-semibold">Menu utama</p>
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Dashboard</a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">User</a>
                <a href="{{ route('admin.kategori.index') }}" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Kategori</a>
                <a href="{{ route('admin.alat.index') }}" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Alat</a>
                <a href="{{ route('admin.peminjaman.index') }}" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Peminjaman</a>
                <a href="{{ route('admin.pengembalian.index') }}" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Pengembalian</a>
                
                <div class="mt-6 pt-6 border-t border-white/10">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="h-9 w-9 bg-indigo-500 rounded-full flex items-center justify-center">
                            <span class="text-sm font-semibold text-white">{{ substr(Auth::user()->name ?? 'AD', 0, 2) }}</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-white">{{ Auth::user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-indigo-200/80">{{ Auth::user()->email ?? 'admin@alatify.test' }}</p>
                        </div>
                    </div>
                    <!-- Mobile logout form POST -->
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-red-500/20 hover:bg-red-500/30 text-white rounded-xl text-sm">
                            <ion-icon name="log-out-outline" class="text-base"></ion-icon>
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('mobileSidebar');
            sidebar.classList.toggle('hidden');
        }
    </script>
</body>
</html>