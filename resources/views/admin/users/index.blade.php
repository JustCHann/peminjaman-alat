<x-app-layout>
    <!-- Ganti header default dengan desain modern -->
    <!-- Layout utama dengan sidebar modern (Laravel + Tailwind) -->
    <div class="min-h-screen bg-gray-50/80 flex">
        <!-- ===== SIDEBAR (sama persis dengan desain modern sebelumnya) ===== -->
        <aside class="w-72 bg-gradient-to-b from-indigo-800 to-indigo-900 text-white shadow-xl flex-shrink-0 hidden md:flex flex-col">
            <!-- Logo & app -->
            <div class="px-6 pt-8 pb-6 border-b border-white/10">
                <div class="flex items-center gap-3">
                    <div class="h-10 w-10 bg-white/20 backdrop-blur rounded-xl flex items-center justify-center">
                        <!-- ionicons via cdn (pastikan ada di layout utama) -->
                        <ion-icon name="layers-outline" class="text-2xl text-white"></ion-icon>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold tracking-tight">Alatify</h1>
                        <p class="text-xs text-indigo-200/80 mt-0.5">sistem peminjaman</p>
                    </div>
                </div>
            </div>

            <!-- Navigation - dengan active state di MANAJEMEN USER -->
            <div class="flex-1 px-4 pt-6 pb-4 space-y-1 overflow-y-auto">
                <p class="text-xs uppercase tracking-wider text-indigo-200/70 px-3 pb-2 font-semibold">Menu utama</p>
                
                <!-- Dashboard -->
                <a href="/admin/dashboard" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white hover:bg-white/10 transition">
                    <ion-icon name="grid-outline" class="text-xl"></ion-icon>
                    <span>Dashboard</span>
                </a>
                
                <!-- MANAJEMEN USER - ACTIVE (sesuai halaman) -->
                <a href="{{ route('admin.users.index') }}" class="nav-item nav-active flex items-center gap-4 px-4 py-3.5 rounded-xl text-white font-medium bg-white/15 border-l-4 border-white pl-[14px]">
                    <ion-icon name="people-outline" class="text-xl"></ion-icon>
                    <span>Manajemen User</span>
                </a>
                
                <!-- Kategori Alat -->
                <a href="/admin/kategori" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white hover:bg-white/10 transition">
                    <ion-icon name="pricetags-outline" class="text-xl"></ion-icon>
                    <span>Kategori Alat</span>
                </a>
                
                <!-- Data Alat -->
                <a href="/admin/alat" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white hover:bg-white/10 transition">
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
                
                <!-- Log Aktivitas -->
                <a href="/admin/log-aktivitas" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white hover:bg-white/10 transition">
                    <ion-icon name="document-text-outline" class="text-xl"></ion-icon>
                    <span>Log Aktivitas</span>
                </a>
            </div>

            <!-- User profile sidebar -->
            <div class="px-5 py-5 border-t border-white/10 mt-2">
                <div class="flex items-center gap-3">
                    <div class="h-9 w-9 bg-indigo-500 rounded-full flex items-center justify-center ring-2 ring-white/30">
                        <span class="text-sm font-semibold text-white">{{ substr(auth()->user()->name ?? 'AD', 0, 2) }}</span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name ?? 'Admin Utama' }}</p>
                        <p class="text-xs text-indigo-200/80 truncate">{{ auth()->user()->email ?? 'admin@alatify.test' }}</p>
                    </div>
                    <!-- Logout form -->
                </div>
            </div>
        </aside>

        <!-- ===== MAIN CONTENT (CRUD Users) ===== -->
        <main class="flex-1 flex flex-col min-h-screen bg-gray-50/80">
            <!-- Top bar modern (sama dengan desain) -->
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
                        <span class="font-semibold text-gray-800">Manajemen User</span>
                    </div>
                </div>
                
                <!-- Search & notifikasi -->
                
            </header>

            <!-- Page content - CRUD USERS -->
            <div class="p-6 md:p-8 flex-1">
                <!-- Header & tombol tambah (modernized) -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Daftar Pengguna</h2>
                        <p class="text-sm text-gray-500 mt-1">Kelola semua data admin, staff, dan peminjam</p>
                    </div>
                    <a href="{{ route('admin.users.create') }}" class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl shadow-sm transition font-medium text-sm self-start sm:self-center">
                        <ion-icon name="add-outline" class="text-lg"></ion-icon>
                        Tambah User
                    </a>
                </div>

                <!-- Card table dengan desain modern -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <!-- Filter & info bar (optional) -->
                   

                    <!-- Table responsive -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead class="bg-gray-50/80 border-b border-gray-100">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Username</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Role</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($users as $user)
                                <tr class="hover:bg-gray-50/60 transition">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-3">
                                            <div class="h-8 w-8 bg-gradient-to-br from-indigo-100 to-indigo-50 rounded-full flex items-center justify-center text-indigo-700 font-semibold text-xs">
                                                {{ substr($user->nama, 0, 2) }}
                                            </div>
                                            <span class="font-medium text-gray-800">{{ $user->nama }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $user->username }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-gray-600">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @php
                                            $roleColors = [
                                                'admin' => 'bg-purple-100 text-purple-700',
                                                'staff' => 'bg-blue-100 text-blue-700',
                                                'peminjam' => 'bg-green-100 text-green-700',
                                            ];
                                            $roleClass = $roleColors[$user->role] ?? 'bg-gray-100 text-gray-700';
                                        @endphp
                                        <span class="px-3 py-1.5 rounded-full text-xs font-medium {{ $roleClass }}">
                                            {{ ucfirst($user->role) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="inline-flex items-center gap-1 bg-amber-50 hover:bg-amber-100 text-amber-700 px-3 py-1.5 rounded-lg transition text-xs font-medium border border-amber-200/50">
                                                <ion-icon name="create-outline" class="text-sm"></ion-icon>
                                                Edit
                                            </a>
                                            
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center gap-1 bg-red-50 hover:bg-red-100 text-red-700 px-3 py-1.5 rounded-lg transition text-xs font-medium border border-red-200/50">
                                                    <ion-icon name="trash-outline" class="text-sm"></ion-icon>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-400">
                                            <ion-icon name="people-outline" class="text-5xl mb-3"></ion-icon>
                                            <p class="font-medium text-gray-600">Belum ada data user</p>
                                            <p class="text-sm mt-1">Silakan tambah user baru</p>
                                            <a href="{{ route('admin.users.create') }}" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded-xl text-sm inline-flex items-center gap-1">
                                                <ion-icon name="add-circle-outline"></ion-icon>
                                                Tambah User
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination (jika ada) -->
                    @if(isset($users) && method_exists($users, 'links'))
                    <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/30">
                        {{ $users->links() }}
                    </div>
                    @endif
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
        <div class="absolute left-0 top-0 h-full w-72 bg-gradient-to-b from-indigo-800 to-indigo-900 shadow-xl">
            <!-- isi sama dengan sidebar desktop, sederhanakan untuk demo -->
            <div class="px-6 pt-8 pb-6 border-b border-white/10 flex items-center gap-3">
                <div class="h-10 w-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <ion-icon name="layers-outline" class="text-2xl text-white"></ion-icon>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-white">Alatify</h1>
                </div>
            </div>
            <div class="px-4 pt-4">
                <a href="/admin" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90">Dashboard</a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-4 px-4 py-3 bg-white/15 text-white font-medium rounded-xl">User</a>
                <a href="/admin/kategori" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90">Kategori</a>
                <!-- ... tambahkan menu lainnya ... -->
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