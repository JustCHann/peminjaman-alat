<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard Peminjam · Alatify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .card-hover { transition: transform 0.2s ease, box-shadow 0.2s ease; }
        .card-hover:hover { transform: translateY(-4px); box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.05); }
        .nav-item { transition: all 0.2s ease; }
        .nav-item:hover { background-color: rgba(255,255,255,0.08); }
        .nav-active { background-color: rgba(255,255,255,0.12); border-left: 4px solid white; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in { animation: fadeIn 0.3s ease-out; }
    </style>
</head>
<body class="bg-gray-50 antialiased flex min-h-screen">

    <!-- === SIDEBAR MODERN PEMINJAM === -->
    <aside class="w-72 bg-gradient-to-b from-indigo-800 to-indigo-900 text-white shadow-xl flex-shrink-0 hidden md:flex flex-col">
        <!-- Logo & app name -->
        <div class="px-6 pt-8 pb-6 border-b border-white/10">
            <div class="flex items-center gap-3">
                <div class="h-10 w-10 bg-white/20 backdrop-blur rounded-xl flex items-center justify-center">
                    <ion-icon name="layers-outline" class="text-2xl text-white"></ion-icon>
                </div>
                <div>
                    <h1 class="text-xl font-bold tracking-tight">Alatify</h1>
                    <p class="text-xs text-indigo-200/80 mt-0.5">portal peminjam</p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
        <div class="flex-1 px-4 pt-6 pb-4 space-y-1 overflow-y-auto">
            <p class="text-xs uppercase tracking-wider text-indigo-200/70 px-3 pb-2 font-semibold">Menu utama</p>
            
            <a href="#" class="nav-item nav-active flex items-center gap-4 px-4 py-3.5 rounded-xl text-white font-medium">
                <ion-icon name="grid-outline" class="text-xl"></ion-icon>
                <span>Dashboard</span>
            </a>
            <a href="peminjaman/" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white">
                <ion-icon name="time-outline" class="text-xl"></ion-icon>
                <span>Riwayat</span>
            </a>
        </div>

        <!-- User profile & logout -->
        <div class="px-5 py-5 border-t border-white/10 mt-2">
            <div class="flex items-center gap-3 mb-3">
                <div class="h-9 w-9 bg-indigo-500 rounded-full flex items-center justify-center ring-2 ring-white/30">
                    <span class="text-sm font-semibold text-white">{{ substr(Auth::user()->nama ?? 'PM', 0, 1) }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->nama ?? 'Peminjam' }}</p>
                    <p class="text-xs text-indigo-200/80 truncate">{{ Auth::user()->email ?? 'peminjam@alatify.test' }}</p>
                </div>
            </div>
            
            <form action="{{ route('logout') }}" method="POST">
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
        
        <!-- Top bar -->
        <header class="bg-white/80 backdrop-blur-md border-b border-gray-200/60 px-8 py-4 sticky top-0 z-10 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <button class="md:hidden text-gray-600 hover:text-indigo-700 focus:outline-none" aria-label="Menu" onclick="toggleMobileSidebar()">
                    <ion-icon name="menu-outline" class="text-2xl"></ion-icon>
                </button>
                <h1 class="text-lg md:text-2xl font-semibold text-gray-800 tracking-tight">Dashboard Peminjam</h1>
            </div>
            
            <form action="{{ route('logout') }}" method="POST" class="md:hidden">
                @csrf
                <button type="submit" class="flex items-center gap-1.5 px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100 transition">
                    <ion-icon name="log-out-outline" class="text-base"></ion-icon>
                    <span>Logout</span>
                </button>
            </form>
        </header>

        <!-- Page content -->
        <div class="p-6 md:p-8 space-y-8 fade-in">
            
            <!-- Welcome Section -->
            <div class="bg-gradient-to-r from-indigo-50 to-white rounded-2xl p-6 border border-indigo-100">
                <div class="flex items-center gap-4">
                    <div class="h-14 w-14 bg-indigo-100 rounded-full flex items-center justify-center">
                        <ion-icon name="person-circle-outline" class="text-3xl text-indigo-600"></ion-icon>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">Selamat datang, {{ Auth::user()->nama }}!</h2>
                        <p class="text-sm text-gray-500 mt-0.5">Silakan ajukan peminjaman alat yang Anda butuhkan</p>
                    </div>
                </div>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 rounded-xl p-4 flex items-center gap-3">
                    <ion-icon name="checkmark-circle-outline" class="text-green-600 text-xl"></ion-icon>
                    <p class="text-green-700 text-sm">{{ session('success') }}</p>
                </div>
            @endif
            
            @if(session('error'))
                <div class="bg-red-50 border-l-4 border-red-500 rounded-xl p-4 flex items-center gap-3">
                    <ion-icon name="alert-circle-outline" class="text-red-600 text-xl"></ion-icon>
                    <p class="text-red-700 text-sm">{{ session('error') }}</p>
                </div>
            @endif

            <!-- Daftar Alat Section -->
            <div>
                <div class="flex items-center justify-between mb-5">
                    <h2 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                        <ion-icon name="construct-outline" class="text-indigo-600 text-xl"></ion-icon>
                        Daftar Alat Tersedia
                    </h2>
                    <span class="text-xs text-gray-400 bg-white px-4 py-2 rounded-full border">{{ count($alat) }} alat</span>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @forelse($alat as $item)
                        <div class="group bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden card-hover">
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="h-12 w-12 bg-gradient-to-br from-indigo-100 to-indigo-50 rounded-xl flex items-center justify-center text-indigo-600">
                                        <ion-icon name="hardware-chip-outline" class="text-2xl"></ion-icon>
                                    </div>
                                    <span class="text-xs px-2.5 py-1 {{ $item->jumlah > 0 ? 'bg-green-100 text-green-700' : 'bg-red-100 text-red-700' }} rounded-full font-medium">
                                        Stok: {{ $item->jumlah }}
                                    </span>
                                </div>
                                <h3 class="font-semibold text-lg text-gray-800 mb-1">{{ $item->nama }}</h3>
                                <p class="text-sm text-gray-500 mb-4">
                                    {{ $item->kategori ? $item->kategori->nama : 'Tanpa Kategori' }}
                                </p>
                                @if($item->jumlah > 0)
                                    <a href="{{ route('peminjam.alat.ajukan', $item->id) }}" 
                                       class="inline-flex items-center gap-2 px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl transition text-sm font-medium">
                                        <ion-icon name="cart-outline" class="text-base"></ion-icon>
                                        Ajukan Peminjaman
                                    </a>
                                @else
                                    <button disabled class="inline-flex items-center gap-2 px-4 py-2 bg-gray-200 text-gray-500 rounded-xl text-sm font-medium cursor-not-allowed">
                                        <ion-icon name="close-circle-outline" class="text-base"></ion-icon>
                                        Stok Habis
                                    </button>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full bg-white rounded-2xl p-12 text-center border border-gray-100">
                            <ion-icon name="construct-outline" class="text-5xl text-gray-300 mx-auto mb-3"></ion-icon>
                            <p class="text-gray-400">Belum ada alat tersedia saat ini.</p>
                        </div>
                    @endforelse
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
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Daftar Alat</a>
                <a href="#" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Riwayat</a>
                
                <div class="mt-6 pt-6 border-t border-white/10">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="h-9 w-9 bg-indigo-500 rounded-full flex items-center justify-center">
                            <span class="text-sm font-semibold text-white">{{ substr(Auth::user()->nama ?? 'PM', 0, 2) }}</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-white">{{ Auth::user()->nama ?? 'Peminjam' }}</p>
                            <p class="text-xs text-indigo-200/80">{{ Auth::user()->email ?? 'peminjam@alatify.test' }}</p>
                        </div>
                    </div>
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