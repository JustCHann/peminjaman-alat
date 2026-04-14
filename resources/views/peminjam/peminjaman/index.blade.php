<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Riwayat Peminjaman · Alatify</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <style>
        body { font-family: 'Inter', sans-serif; }
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
            
            <a href="{{ route('peminjam.dashboard') }}" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white">
                <ion-icon name="grid-outline" class="text-xl"></ion-icon>
                <span>Dashboard</span>
            </a>
            <a href="/" class="nav-item nav-active flex items-center gap-4 px-4 py-3.5 rounded-xl text-white font-medium">
                <ion-icon name="time-outline" class="text-xl"></ion-icon>
                <span>Riwayat</span>
            </a>
        </div>
        <!-- User profile & logout -->
        <div class="px-5 py-5 border-t border-white/10 mt-2">
            <div class="flex items-center gap-3 mb-3">
                <div class="h-9 w-9 bg-indigo-500 rounded-full flex items-center justify-center ring-2 ring-white/30">
                    <span class="text-sm font-semibold text-white">{{ substr(Auth::user()->name ?? 'PM', 0, 2) }}</span>
                </div>
                <div class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-white truncate">{{ Auth::user()->name ?? 'Peminjam' }}</p>
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
                <h1 class="text-lg md:text-2xl font-semibold text-gray-800 tracking-tight">Riwayat Peminjaman</h1>
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
        <div class="p-6 md:p-8 flex-1 fade-in">
            
            <!-- Header Section -->
            <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Riwayat Peminjaman</h2>
                    <p class="text-sm text-gray-500 mt-1">Semua riwayat peminjaman alat Anda</p>
                </div>
                <a href="{{ route('peminjam.dashboard') }}" class="inline-flex items-center gap-2 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-5 py-2.5 rounded-xl shadow-sm transition font-medium text-sm self-start sm:self-center">
                    <ion-icon name="arrow-back-outline" class="text-lg"></ion-icon>
                    Kembali ke Dashboard
                </a>
            </div>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="mb-6 bg-green-50 border-l-4 border-green-500 rounded-xl p-4 flex items-center gap-3">
                    <ion-icon name="checkmark-circle-outline" class="text-green-600 text-xl"></ion-icon>
                    <p class="text-green-700 text-sm">{{ session('success') }}</p>
                </div>
            @endif
            
            @if(session('error'))
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 rounded-xl p-4 flex items-center gap-3">
                    <ion-icon name="alert-circle-outline" class="text-red-600 text-xl"></ion-icon>
                    <p class="text-red-700 text-sm">{{ session('error') }}</p>
                </div>
            @endif

            <!-- ALERT TERLAMBAT GLOBAL -->
            @if($peminjaman->where('status','dipinjam')->contains(function($item){
                return now()->gt($item->tanggal_kembali);
            }))
                <div class="mb-4 bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl flex items-center gap-3">
                    <ion-icon name="alert-circle-outline" class="text-xl"></ion-icon>
                    <span>Beberapa peminjaman Anda sudah melewati batas waktu!</span>
                </div>
            @endif

            <!-- Riwayat Peminjaman Section -->
            <div class="mt-4">
                <div class="flex items-center justify-between mb-5">
                    <div class="flex items-center gap-2">
                        <ion-icon name="time-outline" class="text-indigo-600 text-xl"></ion-icon>
                        <h3 class="text-lg font-semibold text-gray-800">Daftar Peminjaman</h3>
                    </div>
                    <span class="text-xs text-gray-400 bg-white px-4 py-2 rounded-full border">{{ count($peminjaman) }} transaksi</span>
                </div>

                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50/80 border-b border-gray-100">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">#</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama Alat</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Jumlah</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal Pinjam</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Tanggal Kembali</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Denda</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($peminjaman as $index => $item)
                                    @php
                                        $status = strtolower(trim($item->status));
                                        $isTerlambat = ($status == 'dipinjam' && now()->gt(\Carbon\Carbon::parse($item->tanggal_kembali)));
                                        $statusConfig = [
                                            'menunggu' => ['bg-yellow-100', 'text-yellow-700', 'time-outline', 'Menunggu'],
                                            'dipinjam' => [$isTerlambat ? 'bg-red-100' : 'bg-blue-100', $isTerlambat ? 'text-red-700' : 'text-blue-700', $isTerlambat ? 'alert-circle-outline' : 'checkmark-circle-outline', $isTerlambat ? 'Terlambat' : 'Dipinjam'],
                                            'dikembalikan' => ['bg-green-100', 'text-green-700', 'checkmark-done-outline', 'Dikembalikan'],
                                            'ditolak' => ['bg-red-100', 'text-red-700', 'close-circle-outline', 'Ditolak'],
                                        ];
                                        $config = $statusConfig[$status] ?? ['bg-gray-100', 'text-gray-700', 'help-outline', ucfirst($status)];
                                    @endphp
                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-500">{{ $index + 1 }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="h-8 w-8 bg-gray-100 rounded-lg flex items-center justify-center text-gray-600">
                                                    <ion-icon name="hardware-chip-outline" class="text-sm"></ion-icon>
                                                </div>
                                                <span class="font-medium text-gray-800">{{ $item->alat ? $item->alat->nama : 'Alat tidak ditemukan' }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2.5 py-1 bg-gray-100 text-gray-700 rounded-lg text-xs font-medium">{{ $item->detail ? $item->detail->jumlah : 0 }} unit</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-medium {{ $config[0] }} {{ $config[1] }}">
                                                <ion-icon name="{{ $config[2] }}" class="text-sm"></ion-icon>
                                                {{ $config[3] }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                            {{ $item->tanggal_pinjam ? \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d M Y') : '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-gray-600">
                                            {{ $item->tanggal_kembali ? \Carbon\Carbon::parse($item->tanggal_kembali)->format('d M Y') : '-' }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($item->denda > 0)
                                                <span class="text-red-600 font-semibold">
                                                    Rp {{ number_format($item->denda, 0, ',', '.') }}
                                                </span>
                                            @else
                                                <span class="text-gray-500">-</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($status == 'dipinjam')
                                                <form action="{{ route('peminjam.kembalikan', $item->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" onclick="return confirm('Yakin ingin mengembalikan alat ini?')" 
                                                            class="inline-flex items-center gap-1 bg-emerald-50 hover:bg-emerald-100 text-emerald-700 px-3 py-1.5 rounded-lg transition text-xs font-medium border border-emerald-200/50">
                                                        <ion-icon name="arrow-undo-outline" class="text-sm"></ion-icon>
                                                        Kembalikan
                                                    </button>
                                                </form>
                                            @else
                                                <span class="text-gray-400 text-xs">-</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center text-gray-400">
                                                <ion-icon name="time-outline" class="text-5xl mb-3"></ion-icon>
                                                <p class="font-medium text-gray-600">Belum ada riwayat peminjaman</p>
                                                <p class="text-sm mt-1">Silakan ajukan peminjaman alat</p>
                                                <a href="{{ route('peminjam.dashboard') }}" class="mt-4 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl text-sm inline-flex items-center gap-2 shadow-sm transition">
                                                    <ion-icon name="arrow-back-outline" class="text-lg"></ion-icon>
                                                    Kembali ke Dashboard
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Informasi Tambahan -->
            <div class="mt-8 p-4 bg-blue-50/50 rounded-xl border border-blue-100">
                <div class="flex items-start gap-3">
                    <ion-icon name="information-circle-outline" class="text-blue-600 text-xl flex-shrink-0 mt-0.5"></ion-icon>
                    <div class="text-xs text-blue-700">
                        <p class="font-medium">Informasi:</p>
                        <ul class="list-disc list-inside mt-1 space-y-0.5">
                            <li>Status <span class="font-medium">"Dipinjam"</span> berarti alat sedang Anda gunakan</li>
                            <li>Status <span class="font-medium">"Menunggu"</span> berarti pengajuan Anda sedang diproses admin</li>
                            <li>Status <span class="font-medium">"Terlambat"</span> berarti melebihi batas waktu pengembalian</li>
                            <li>Klik tombol <span class="font-medium">"Kembalikan"</span> untuk mengembalikan alat yang dipinjam</li>
                        </ul>
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
                <a href="{{ route('peminjam.dashboard') }}" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Dashboard</a>
                <a href="" class="flex items-center gap-4 px-4 py-3 bg-white/15 text-white font-medium rounded-xl">Riwayat</a>
                
                <div class="mt-6 pt-6 border-t border-white/10">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="h-9 w-9 bg-indigo-500 rounded-full flex items-center justify-center">
                            <span class="text-sm font-semibold text-white">{{ substr(Auth::user()->name ?? 'PM', 0, 2) }}</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-white">{{ Auth::user()->name ?? 'Peminjam' }}</p>
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