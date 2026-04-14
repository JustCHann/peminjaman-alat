<x-app-layout>
    <!-- Layout utama dengan sidebar modern (Laravel + Tailwind) -->
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

            <!-- Navigation - dengan active state di DATA ALAT -->
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
                <a href="/admin/kategori" class="nav-item flex items-center gap-4 px-4 py-3.5 rounded-xl text-indigo-50/90 hover:text-white hover:bg-white/10 transition">
                    <ion-icon name="pricetags-outline" class="text-xl"></ion-icon>
                    <span>Kategori Alat</span>
                </a>
                
                <!-- DATA ALAT - ACTIVE -->
                <a href="{{ route('admin.alat.index') }}" class="nav-item nav-active flex items-center gap-4 px-4 py-3.5 rounded-xl text-white font-medium bg-white/15 border-l-4 border-white pl-[14px]">
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

        <!-- ===== MAIN CONTENT (TAMBAH ALAT) ===== -->
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
                        <a href="{{ route('admin.alat.index') }}" class="text-gray-600 hover:text-indigo-600 transition">Data Alat</a>
                        <ion-icon name="chevron-forward-outline" class="text-gray-400 text-xs"></ion-icon>
                        <span class="font-semibold text-gray-800">Tambah Alat</span>
                    </div>
                </div>
                
                <!-- Search & notifikasi - dikosongkan sesuai contoh -->
            </header>

            <!-- Page content - FORM TAMBAH ALAT -->
            <div class="p-6 md:p-8 flex-1">
                <!-- Header & tombol kembali -->
                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 tracking-tight">Tambah Alat Baru</h2>
                        <p class="text-sm text-gray-500 mt-1">Isi data dengan lengkap untuk menambahkan alat ke sistem</p>
                    </div>
                    <a href="{{ route('admin.alat.index') }}" class="inline-flex items-center gap-2 bg-white border border-gray-200 hover:bg-gray-50 text-gray-700 px-5 py-2.5 rounded-xl shadow-sm transition font-medium text-sm self-start sm:self-center">
                        <ion-icon name="arrow-back-outline" class="text-lg"></ion-icon>
                        Kembali
                    </a>
                </div>

                <!-- Form Card - Desain sama persis dengan tambah user -->
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <form action="{{ route('admin.alat.store') }}" method="POST" class="p-6 md:p-8">
                        @csrf

                        <!-- Grid 2 kolom -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nama Alat -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Nama Alat <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="nama" value="{{ old('nama') }}" 
                                       class="w-full px-4 py-3 border border-gray-200 bg-gray-50/50 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-300/50 focus:border-indigo-300 transition @error('nama') border-red-300 bg-red-50/50 @enderror" 
                                       placeholder="Masukkan nama alat">
                                @error('nama') 
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kode Alat -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Kode Alat <span class="text-red-500">*</span>
                                </label>
                                <input type="text" name="kode" value="{{ old('kode') }}" 
                                       class="w-full px-4 py-3 border border-gray-200 bg-gray-50/50 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-300/50 focus:border-indigo-300 transition @error('kode') border-red-300 bg-red-50/50 @enderror" 
                                       placeholder="Contoh: AL-001">
                                @error('kode') 
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Jumlah -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Jumlah <span class="text-red-500">*</span>
                                </label>
                                <input type="number" name="jumlah" value="{{ old('jumlah') }}" 
                                       class="w-full px-4 py-3 border border-gray-200 bg-gray-50/50 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-300/50 focus:border-indigo-300 transition @error('jumlah') border-red-300 bg-red-50/50 @enderror" 
                                       placeholder="0" min="0">
                                @error('jumlah') 
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Kategori -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">
                                    Kategori <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <select name="kategori_id" 
                                            class="w-full px-4 py-3 border border-gray-200 bg-gray-50/50 rounded-xl focus:bg-white focus:ring-2 focus:ring-indigo-300/50 focus:border-indigo-300 transition appearance-none @error('kategori_id') border-red-300 bg-red-50/50 @enderror">
                                        <option value=""> Pilih Kategori </option>
                                        @foreach($kategoris as $kategori)
                                            <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>
                                                {{ $kategori->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                                        <ion-icon name="chevron-down-outline" class="text-lg"></ion-icon>
                                    </div>
                                </div>
                                @error('kategori_id') 
                                    <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <!-- Action Buttons -->
                        <div class="flex items-center justify-end gap-3 mt-8 pt-6 border-t border-gray-100">
                            <a href="{{ route('admin.alat.index') }}" class="px-6 py-2.5 border border-gray-200 bg-white hover:bg-gray-50 text-gray-700 rounded-xl transition font-medium text-sm">
                                Batal
                            </a>
                            <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl shadow-sm transition font-medium text-sm">
                                <ion-icon name="save-outline" class="text-lg"></ion-icon>
                                Simpan Alat
                            </button>
                        </div>
                    </form>
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
            <div class="px-6 pt-8 pb-6 border-b border-white/10 flex items-center gap-3">
                <div class="h-10 w-10 bg-white/20 rounded-xl flex items-center justify-center">
                    <ion-icon name="layers-outline" class="text-2xl text-white"></ion-icon>
                </div>
                <div>
                    <h1 class="text-xl font-bold text-white">Alatify</h1>
                </div>
            </div>
            <div class="px-4 pt-4">
                <a href="/admin/dashboard" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Dashboard</a>
                <a href="{{ route('admin.users.index') }}" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">User</a>
                <a href="/admin/kategori" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Kategori</a>
                <a href="{{ route('admin.alat.index') }}" class="flex items-center gap-4 px-4 py-3 bg-white/15 text-white font-medium rounded-xl">Alat</a>
                <a href="/admin/peminjaman" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Peminjaman</a>
                <a href="/admin/pengembalian" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Pengembalian</a>
                <a href="/admin/log-aktivitas" class="flex items-center gap-4 px-4 py-3 text-indigo-50/90 hover:bg-white/10 rounded-xl">Log</a>
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