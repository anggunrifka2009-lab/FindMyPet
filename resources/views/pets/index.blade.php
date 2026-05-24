<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Hewan</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100 min-h-screen text-sm">

<!-- NAVBAR -->
<nav class="bg-white/70 backdrop-blur-md shadow-sm border-b sticky top-0 z-50">

    <div class="max-w-7xl mx-auto px-6 py-4 grid grid-cols-3 items-center">

        <!-- LOGO -->
        <div>
            <h1 class="text-xl font-bold text-slate-800 flex items-center gap-2">
                🐾 <span>FindMyPet</span>
            </h1>
        </div>

        <!-- MENU -->
        <div class="flex justify-center items-center gap-3">

            <a href="/"
               class="px-4 py-2 rounded-full text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition">
                Home
            </a>

            <a href="/hewan"
               class="px-4 py-2 rounded-full bg-slate-900 text-white font-semibold shadow-sm">
                Hewan
            </a>

        </div>

        <!-- DASHBOARD -->
        <div class="flex justify-end">

            @auth

                <a href="/admin"
                   class="bg-slate-900 text-white px-4 py-2 rounded-xl hover:bg-slate-800 transition shadow text-sm font-semibold">
                    Dashboard
                </a>

            @else

                <div class="w-[100px]"></div>

            @endauth

        </div>

    </div>

</nav>

<!-- CONTENT -->
<section class="max-w-7xl mx-auto px-6 py-10">

    <!-- SEARCH -->
    <div class="bg-white rounded-3xl shadow-sm p-8 mb-8 border border-slate-200/80">

        <div class="mb-6">

            <h1 class="text-3xl font-extrabold text-slate-800 mb-2 tracking-tight flex items-center gap-2">
                Temukan Sahabat Baru 🐾
            </h1>

            <p class="text-slate-500 text-base">
                Pilih hewan yang siap diadopsi dan berikan mereka rumah baru yang penuh kasih sayang.
            </p>

        </div>

        <form action="/hewan"
              method="GET"
              class="bg-slate-50 border rounded-2xl p-3 flex flex-col md:flex-row gap-3 items-center">

            <!-- SEARCH INPUT -->
            <div class="w-full md:flex-1 relative">

                <input
                    type="text"
                    name="search"
                    value="{{ request('search') }}"
                    placeholder="Cari nama hewan yang kamu inginkan..."
                    class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-700 placeholder-slate-400 focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-800"
                >

            </div>

            <!-- KATEGORI -->
            <div class="w-full md:w-auto">

                <select
                    name="kategori"
                    onchange="this.form.submit()"
                    class="w-full bg-white border border-slate-200 rounded-xl px-4 py-3 text-slate-600 focus:outline-none focus:ring-2 focus:ring-slate-900/10 focus:border-slate-800 cursor-pointer"
                >

                    <option value="">Semua Kategori</option>

                    <option value="Kucing" {{ request('kategori') == 'Kucing' ? 'selected' : '' }}>
                        Kucing
                    </option>

                    <option value="Anjing" {{ request('kategori') == 'Anjing' ? 'selected' : '' }}>
                        Anjing
                    </option>

                </select>

            </div>

            <!-- BUTTON -->
            <button
                type="submit"
                class="w-full md:w-auto bg-slate-900 text-white px-8 py-3 rounded-xl hover:bg-slate-800 transition font-semibold shadow-sm"
            >
                Cari
            </button>

        </form>

    </div>

    <!-- CARD -->
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

        @forelse($pets as $pet)

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/60 overflow-hidden hover:shadow-md transition duration-300 flex flex-col">

            <!-- IMAGE -->
            <div class="relative overflow-hidden bg-slate-100 h-72">

                <img
                    src="{{ asset('storage/' . $pet->foto) }}"
                    alt="{{ $pet->nama }}"
                    class="w-full h-full object-cover object-top cursor-pointer hover:scale-105 transition duration-500"
                    onclick="window.location='/pets/{{ $pet->id }}'"
                >

                <span class="absolute top-3 right-3 text-xs bg-green-100 text-green-700 font-medium px-2.5 py-1 rounded-full border border-green-200/50 shadow-sm">
                    {{ $pet->status }}
                </span>

            </div>

            <!-- CONTENT -->
            <div class="p-5 flex flex-col flex-1">

                <div class="mb-1">

                    <h3 class="text-xl font-bold text-slate-800">
                        {{ $pet->nama }}
                    </h3>

                    <p class="text-slate-400 text-xs font-medium uppercase tracking-wider">
                        {{ $pet->jenis }}
                    </p>

                </div>

                <hr class="my-3 border-slate-100">

                <div class="text-sm space-y-2.5 mb-5 flex-1">

                    <div class="flex justify-between items-center">

                        <span class="text-slate-400 font-medium">
                            Umur
                        </span>

                        <span class="text-slate-700 font-semibold bg-slate-50 px-2 py-0.5 rounded-md border border-slate-100">
                            {{ $pet->umur }} Tahun
                        </span>

                    </div>

                    <div class="flex justify-between items-center">

                        <span class="text-slate-400 font-medium">
                            Jenis Kelamin
                        </span>

                        <span class="text-slate-700 font-semibold bg-slate-50 px-2 py-0.5 rounded-md border border-slate-100">
                            {{ $pet->gender }}
                        </span>

                    </div>

                </div>

                <!-- DETAIL BUTTON -->
                <a
                    href="/pets/{{ $pet->id }}"
                    class="block text-center bg-slate-900 text-white py-3 rounded-xl hover:bg-slate-800 transition text-sm font-semibold shadow-sm"
                >
                    Lihat Detail
                </a>

            </div>

        </div>

        @empty

        <!-- EMPTY -->
        <div class="col-span-full">

            <div class="bg-white rounded-2xl shadow-sm border p-10 text-center">

                <div class="text-5xl mb-4 animate-bounce">
                    🐾
                </div>

                <h2 class="text-xl font-bold text-slate-800 mb-2">
                    Hewan tidak ditemukan
                </h2>

                <p class="text-slate-500">
                    Coba gunakan kata kunci lain atau pilih kategori berbeda.
                </p>

            </div>

        </div>

        @endforelse

    </div>

</section>

</body>
</html>