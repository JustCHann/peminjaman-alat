<x-app-layout>

    <div class="min-h-screen bg-gray-50/80 flex">
        <!-- ===== SIDEBAR (sama persis dengan desain sebelumnya) ===== -->
        <aside class="w-72 bg-gradient-to-b from-indigo-800 to-indigo-900 text-white shadow-xl flex-shrink-0 hidden md:flex flex-col">
            <!-- Logo & app -->
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

            <!-- Navigation - dengan active state di LOG AKTIVITAS -->
            <div class="flex-1 px-4 pt-6 pb-4 space-y-1 overflow-y-auto">
                <p class="text-xs uppercase tracking-wider text-indigo-200/70 px-3 pb-2 font-semibold">Menu utama</p>
                
                <!-- Dashboard -->
                <a href="/admin/dashboard" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white hover:bg-white/10 transition">
                    <ion-icon name="grid-outline" class="text-xl"></ion-icon>
                    <span>Dashboard</span>
                </a>
                
                <!-- Manajemen User -->
                <a href="{{ route('admin.users.index') }}" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white hover:bg-white/10 transition">
                    <ion-icon name="people-outline" class="text-xl"></ion-icon>
                    <span>Manajemen User</span>
                </a>
                
                <!-- Kategori Alat -->
                <a href="{{ route('admin.kategori.index') }}" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white hover:bg-white/10 transition">
                    <ion-icon name="pricetags-outline" class="text-xl"></ion-icon>
                    <span>Kategori Alat</span>
                </a>
                
                <!-- Data Alat -->
                <a href="{{ route('admin.alat.index') }}" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white hover:bg-white/10 transition">
                    <ion-icon name="construct-outline" class="text-xl"></ion-icon>
                    <span>Data Alat</span>
                </a>
                
                <!-- Peminjaman -->
                <a href="/admin/peminjaman" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white hover:bg-white/10 transition">
                    <ion-icon name="calendar-outline" class="text-xl"></ion-icon>
                    <span>Peminjaman</span>
                </a>
                
                <!-- Pengembalian -->
                <a href="/admin/pengembalian" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white hover:bg-white/10 transition">
                    <ion-icon name="arrow-undo-outline" class="text-xl"></ion-icon>
                    <span>Pengembalian</span>
                </a>
                
                <!-- LOG AKTIVITAS - ACTIVE -->
                <a href="/admin/log-aktivitas" class="nav-item nav-active flex items-center gap-4 px-4 py-3.5 rounded-xl text-white font-medium bg-white/15 border-l-4 border-white pl-[14px]">
                    <ion-icon name="document-text-outline" class="text-xl"></ion-icon>
                    <span>Log Aktivitas</span>
                </a>
            </div>

            <!-- User profile sidebar dengan LOGOUT button -->
            <div class="px-5 py-5 border-t border-white/10 mt-2">
                <div class="flex items-center gap-3 mb-3">
                    <div class="h-9 w-9 bg-indigo-500 rounded-full flex items-center justify-center ring-2 ring-white/30">
                        <span class="text-sm font-semibold text-white">{{ substr(auth()->user()->name ?? 'AD', 0, 2) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name ?? 'Admin Utama' }}</p>
                        <p class="text-xs text-indigo-200/80 truncate">{{ auth()->user()->email ?? 'admin@alatify.test' }}</p>
                    </div>
                </div>
                
                <!-- TOMBOL LOGOUT -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full mt-2 flex items-center justify-center gap-2 px-4 py-2.5 bg-white/10 hover:bg-red-500/20 text-white rounded-xl transition-all duration-200 text-sm font-medium border border-white/20 hover:border-red-400/50 group">
                        <ion-icon name="log-out-outline" class="text-lg group-hover:rotate-12 transition-transform"></ion-icon>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <!-- ===== MAIN CONTENT (LOG AKTIVITAS) ===== -->
        <main class="flex-1 flex flex-col min-h-screen bg-gray-50/80">
            <!-- Top bar modern -->
            <header class="bg-white/80 backdrop-blur-md border-b border-gray-200/60 px-6 md:px-8 py-4 sticky top-0 z-10 flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <!-- Mobile menu button -->
                    <button class="md:hidden text-gray-600 hover:text-indigo-700 focus:outline-none" onclick="toggleMobileSidebar()" aria-label="Menu">
                        <ion-icon name="menu-outline" class="text-2xl"></ion-icon>
                    </button>
                    <!-- Breadcrumb / judul halaman -->
                    <div class="flex items-center gap-2 text-sm md:text-base">
                        <span class="text-gray-400">Admin</span>
                        <ion-icon name="chevron-forward-outline" class="text-gray-400 text-xs"></ion-icon>
                        <span class="font-semibold text-gray-800">Log Aktivitas</span>
                    </div>
                </div>
                
                <!-- Tombol Logout untuk Mobile -->
                <form action="{{ route('logout') }}" method="POST" class="md:hidden">
                    @csrf
                    <button type="submit" class="flex items-center gap-1.5 px-3 py-1.5 bg-red-50 text-red-600 rounded-lg text-sm font-medium hover:bg-red-100 transition">
                        <ion-icon name="log-out-outline" class="text-base"></ion-icon>
                        <span>Logout</span>
                    </button>
                </form>
            </header>

            <!-- Page content - LOG AKTIVITAS -->
            <div class="p-6 md:p-8 flex-1">
                <!-- Header Section -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Log Aktivitas Admin</h2>
                        <p class="text-sm text-gray-500 mt-1">Riwayat semua aktivitas yang dilakukan oleh admin</p>
                    </div>
                    <a href="/admin/dashboard" class="inline-flex items-center gap-2 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-5 py-2.5 rounded-xl shadow-sm transition font-medium text-sm self-start sm:self-center">
                        <ion-icon name="arrow-back-outline" class="text-lg"></ion-icon>
                        Kembali ke Dashboard
                    </a>
                </div>

                <!-- Card Table -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Info bar -->
                    <div class="px-6 py-4 border-b border-gray-100 flex flex-wrap items-center justify-between gap-3 bg-gray-50/30">
                        <div class="flex items-center gap-2 text-sm text-gray-600">
                            <ion-icon name="document-text-outline" class="text-indigo-600"></ion-icon>
                            <span>Total <span class="font-semibold text-gray-900">{{ $logs->total() }}</span> aktivitas</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="text-xs bg-blue-100 text-blue-700 px-2 py-1 rounded-full">Riwayat Lengkap</span>
                        </div>
                    </div>

                    <!-- Table responsive -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50/80 border-b border-gray-100">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">No</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">User</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Aktivitas</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($logs as $index => $log)
                                    <tr class="hover:bg-gray-50/60 transition">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="font-mono text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded-lg">{{ $logs->firstItem() + $index }}</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-3">
                                                <div class="h-8 w-8 bg-gradient-to-br from-indigo-100 to-indigo-50 rounded-full flex items-center justify-center text-indigo-700 font-semibold text-xs">
                                                    {{ substr($log->user->nama ?? 'U', 0, 2) }}
                                                </div>
                                                <div>
                                                    <span class="font-medium text-gray-800">{{ $log->user->nama ?? 'User' }}</span>
                                                    <p class="text-xs text-gray-400">{{ $log->user->email ?? '' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center gap-2">
                                                <div class="h-7 w-7 bg-gray-100 rounded-lg flex items-center justify-center text-gray-600">
                                                    <ion-icon name="document-text-outline" class="text-sm"></ion-icon>
                                                </div>
                                                <span class="text-gray-700">{{ $log->aktivitas }}</span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center gap-1.5">
                                                <ion-icon name="calendar-outline" class="text-gray-400 text-sm"></ion-icon>
                                                <span class="text-gray-600">{{ $log->created_at->format('d M Y H:i') }}</span>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-6 py-12 text-center">
                                            <div class="flex flex-col items-center justify-center text-gray-400">
                                                <div class="h-20 w-20 bg-gray-50 rounded-full flex items-center justify-center mb-3">
                                                    <ion-icon name="document-text-outline" class="text-4xl text-gray-300"></ion-icon>
                                                </div>
                                                <p class="font-medium text-gray-600">Tidak ada data log aktivitas</p>
                                                <p class="text-sm text-gray-400 mt-1">Belum ada aktivitas yang tercatat</p>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if(isset($logs) && method_exists($logs, 'links'))
                    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">
                        {{ $logs->links() }}
                    </div>
                    @endif
                </div>

                <!-- Informasi Tambahan -->
                <div class="mt-6 p-4 bg-blue-50/50 rounded-xl border border-blue-100">
                    <div class="flex items-start gap-3">
                        <ion-icon name="information-circle-outline" class="text-blue-600 text-xl flex-shrink-0 mt-0.5"></ion-icon>
                        <div class="text-xs text-blue-700">
                            <p class="font-medium">Informasi:</p>
                            <ul class="list-disc list-inside mt-1 space-y-0.5">
                                <li>Log aktivitas mencatat semua tindakan admin dalam sistem</li>
                                <li>Data disimpan secara otomatis untuk keperluan audit</li>
                                <li>Riwayat disimpan hingga 30 hari terakhir</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer minimal -->
            <footer class="mt-auto px-8 py-5 text-xs text-gray-400 border-t border-gray-200/60 flex justify-between bg-white/50">
                <span>© 2025 Alatify — Sistem Peminjaman Alat</span>
                <span class="flex gap-4"><a href="#" class="hover:text-indigo-600">Bantuan</a><a href="#" class="hover:text-indigo-600">Privasi</a></span>
            </footer>
        </main>
    </div>

    <!-- Mobile sidebar overlay (simple toggle) -->
    <div id="mobileSidebar" class="md:hidden fixed inset-0 z-50 hidden transition-opacity">
        <div class="absolute inset-0 bg-black/30" onclick="toggleMobileSidebar()"></div>
        <div class="absolute left-0 top-0 h-full w-72 bg-gradient-to-b from-indigo-800 to-indigo-900 shadow-xl overflow-y-auto">
            <div class="px-6 pt-8 pb-6 border-b border-white/10 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-white/20 rounded-xl flex items-center justify-center">
                        <ion-icon name="layers-outline" class="text-2xl text-white"></ion-icon>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold text-white">Alatify</h1>
                    </div>
                </div>
                <button onclick="toggleMobileSidebar()" class="text-white/70 hover:text-white">
                    <ion-icon name="close-outline" class="text-2xl"></ion-icon>
                </button>
            </div>
            <div class="px-4 pt-4 pb-20">
                <p class="text-xs uppercase tracking-wider text-indigo-200/70 px-3 pb-2 font-semibold">Menu utama</p>
                <a href="/admin/dashboard" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Dashboard</a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">User</a>
                <a href="{{ route('admin.kategori.index') }}" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Kategori</a>
                <a href="{{ route('admin.alat.index') }}" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Alat</a>
                <a href="/admin/peminjaman" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Peminjaman</a>
                <a href="/admin/pengembalian" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Pengembalian</a>
                <a href="/admin/log-aktivitas" class="flex items-center gap-4 px-4 py-3 bg-white/15 text-white font-medium rounded-xl">Log</a>
                
                <!-- Tombol Logout di Mobile Sidebar -->
                <div class="mt-6 pt-6 border-t border-white/10">
                    <div class="flex items-center gap-3 mb-3">
                        <div class="h-9 w-9 bg-indigo-500 rounded-full flex items-center justify-center">
                            <span class="text-sm font-semibold text-white">{{ substr(auth()->user()->name ?? 'AD', 0, 2) }}</span>
                        </div>
                        <div class="flex-1">
                            <p class="text-sm font-semibold text-white">{{ auth()->user()->name ?? 'Admin' }}</p>
                            <p class="text-xs text-indigo-200/80">{{ auth()->user()->email ?? 'admin@alatify.test' }}</p>
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

    <!-- Script toggle mobile -->
    <script>
        function toggleMobileSidebar() {
            const sidebar = document.getElementById('mobileSidebar');
            sidebar.classList.toggle('hidden');
        }
    </script>

    <!-- Pastikan Ionicons tersedia -->
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

    <!-- Style tambahan untuk nav active dan smooth -->
    <style>
        .nav-item { transition: all 0.2s ease; }
        .nav-active { background-color: rgba(255,255,255,0.15); border-left: 4px solid white; }
    </style>
</x-app-layout>