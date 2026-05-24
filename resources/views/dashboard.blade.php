<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Inter', sans-serif;
        }
    </style>

</head>

<body class="bg-gradient-to-br from-slate-100 via-blue-50 to-slate-200 overflow-x-hidden">

<!-- Toggle Button -->
<button
    onclick="toggleSidebar()"
    id="toggleOutside"
    class="hidden fixed top-5 left-5 z-50 bg-[#0f172a] text-white w-12 h-12 rounded-xl shadow-lg hover:scale-105 transition duration-300"
>
    ☰
</button>

<div class="flex min-h-screen overflow-hidden">

    <!-- Sidebar -->
    <div
        id="sidebar"
        class="fixed top-0 left-0 h-screen w-60 md:w-64 bg-[#0f172a] text-white p-5 flex flex-col justify-between shadow-2xl transition-all duration-300 z-40"
    >

        <div>

            <!-- Header -->
            <div class="mb-10 flex items-start justify-between">

                <div>

                    <h1 class="text-2xl font-bold tracking-wide">
                        Admin Panel
                    </h1>

                    <p class="text-slate-400 mt-2 text-xs">
                        Kelola data hewan adopsi
                    </p>

                </div>

                <!-- Toggle -->
                <button
                    onclick="toggleSidebar()"
                    class="bg-white/10 hover:bg-white/20 text-white w-10 h-10 rounded-xl transition duration-300"
                >
                    ☰
                </button>

            </div>

            <!-- Menu -->
            <div class="space-y-3">

                <a
                    href="/admin"
                    class="flex items-center bg-white/10 hover:bg-white/20 px-4 py-3 rounded-xl transition duration-300 shadow"
                >
                    <span class="font-medium text-sm">
                        Admin
                    </span>
                </a>

                <a
                    href="/admin/tambah-hewan"
                    class="flex items-center hover:bg-white/10 px-4 py-3 rounded-xl transition duration-300"
                >
                    <span class="font-medium text-sm">
                        Tambah Hewan
                    </span>
                </a>

                <a
                    href="/"
                    class="flex items-center hover:bg-white/10 px-4 py-3 rounded-xl transition duration-300"
                >
                    <span class="font-medium text-sm">
                        Lihat Website
                    </span>
                </a>

            </div>

        </div>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button
                class="w-full bg-rose-500 hover:bg-rose-600 py-3 rounded-xl font-semibold transition duration-300 shadow-lg text-sm"
            >
                Logout
            </button>

        </form>

    </div>

    <!-- Content -->
    <div
        id="content"
        class="flex-1 p-4 md:p-8 ml-0 md:ml-60 lg:ml-64 transition-all duration-300 w-full"
    >

        <!-- Success -->
        @if(session('success'))

            <div class="bg-emerald-100 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-5 shadow text-sm">

                {{ session('success') }}

            </div>

        @endif

        <!-- Welcome -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-xl p-5 md:p-8 mb-6 border border-white/40">

            <div class="flex flex-col md:flex-row justify-between md:items-center gap-5">

                <div>

                    <h1 class="text-2xl md:text-4xl font-bold text-slate-800 mb-2">
                        Halo Admin 👋
                    </h1>

                    <p class="text-slate-500 text-sm md:text-base">
                        Pantau dan kelola data hewan adopsi dengan mudah dari dashboard ini.
                    </p>

                </div>

                <div class="hidden md:block text-5xl">
                    🐶
                </div>

            </div>

        </div>

        <!-- Table Card -->
        <div class="bg-white/80 backdrop-blur-md rounded-3xl shadow-xl p-4 md:p-6 border border-white/40">

            <!-- Header -->
            <div class="flex flex-col md:flex-row gap-4 justify-between md:items-center mb-6">

                <div>

                    <h2 class="text-xl md:text-2xl font-bold text-slate-800">
                        Data Hewan
                    </h2>

                    <p class="text-slate-500 mt-1 text-sm">
                        Daftar seluruh hewan yang sedang mencari rumah baru
                    </p>

                </div>

                <a
                    href="/admin/tambah-hewan"
                    class="w-full md:w-auto text-center bg-[#0f172a] hover:bg-[#1e293b] text-white px-5 py-3 rounded-xl font-semibold transition duration-300 shadow-lg text-sm"
                >
                    + Tambah Hewan
                </a>

            </div>

            <!-- Table -->
            <div class="w-full overflow-x-auto">

                <table class="w-full min-w-[900px] md:min-w-0 border-separate border-spacing-y-3 text-sm">

                    <thead>

                        <tr class="bg-[#0f172a] text-white">

                            <th class="p-3 rounded-l-xl text-left">Foto</th>
                            <th class="p-3 text-left">Nama</th>
                            <th class="p-3 text-left">Jenis</th>
                            <th class="p-3 text-left">Umur</th>
                            <th class="p-3 text-left">Jenis Kelamin</th>
                            <th class="p-3 text-left">Status</th>
                            <th class="p-3 rounded-r-xl text-center">Aksi</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($pets as $pet)

                        <tr class="bg-white hover:scale-[1.01] transition duration-300 shadow-md">

                            <td class="p-3 rounded-l-xl">
                                <img src="{{ asset('storage/' . $pet->foto) }}"
                                     class="w-14 h-14 md:w-16 md:h-16 object-cover rounded-xl shadow-md">
                            </td>

                            <td class="p-3 font-bold text-slate-700">
                                {{ $pet->nama }}
                            </td>

                            <td class="p-3 text-slate-600">
                                {{ $pet->jenis }}
                            </td>

                            <td class="p-3 text-slate-600">
                                {{ $pet->umur }} Tahun
                            </td>

                            <td class="p-3 text-slate-600">
                                {{ $pet->gender }}
                            </td>

                            <td class="p-3">
                                <span class="bg-emerald-100 text-emerald-600 px-3 py-1 rounded-full text-xs font-semibold">
                                    {{ $pet->status }}
                                </span>
                            </td>

                            <td class="p-3 rounded-r-xl">

                                <div class="flex flex-col md:flex-row gap-2 justify-center">

                                    <a
                                        href="/admin/edit-hewan/{{ $pet->id }}"
                                        class="bg-amber-400 hover:bg-amber-500 text-white px-4 py-2 rounded-lg text-xs font-semibold transition duration-300 shadow text-center"
                                    >
                                        Edit
                                    </a>

                                    <form action="/admin/hapus-hewan/{{ $pet->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            onclick="return confirm('Yakin mau hapus hewan ini?')"
                                            class="w-full bg-rose-400 hover:bg-rose-500 text-white px-4 py-2 rounded-lg text-xs font-semibold transition duration-300 shadow"
                                        >
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

<script>

    let sidebarOpen = window.innerWidth >= 768;

    function toggleSidebar() {

        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleOutside = document.getElementById('toggleOutside');

        if (sidebarOpen) {
            sidebar.classList.add('-translate-x-full');
            content.classList.remove('md:ml-60', 'lg:ml-64');
            toggleOutside.classList.remove('hidden');
        } else {
            sidebar.classList.remove('-translate-x-full');
            content.classList.add('md:ml-60', 'lg:ml-64');
            toggleOutside.classList.add('hidden');
        }

        sidebarOpen = !sidebarOpen;
    }

    if (window.innerWidth < 768) {
        document.getElementById('sidebar').classList.add('-translate-x-full');
        document.getElementById('toggleOutside').classList.remove('hidden');
    }

</script>

</body>
</html>