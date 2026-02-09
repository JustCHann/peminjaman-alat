{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <!-- <nav class="bg-white shadow p-4 flex justify-between items-center">
        <div class="font-bold text-xl">Aplikasi Peminjaman</div>
       
            @csrf
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </nav> -->

    <!-- Header (optional) -->
    @isset($header)
    <header class="bg-white shadow p-4 mt-4 mx-6 rounded">
        {{ $header }}
    </header>
    @endisset

    <!-- Main Content -->
    <main class="flex-1 p-6">
        {{ $slot }}
    </main>
</body>
</html>
