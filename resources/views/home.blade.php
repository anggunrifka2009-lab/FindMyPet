<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopsi Hewan</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
               class="px-4 py-2 rounded-full bg-slate-900 text-white font-semibold transition">
                Home
            </a>

            <a href="/hewan"
               class="px-4 py-2 rounded-full text-slate-600 hover:bg-slate-100 hover:text-slate-900 transition">
                Hewan
            </a>

        </div>

        <!-- DASHBOARD -->
        <div class="flex justify-end">

            @auth

                <a href="/admin"
                   class="bg-slate-900 text-white px-4 py-2 rounded-xl hover:bg-slate-800 transition text-sm font-semibold shadow">
                    Dashboard
                </a>

            @else

                <div class="w-[100px]"></div>

            @endauth

        </div>

    </div>

</nav>

<!-- HERO -->
<section class="max-w-7xl mx-auto px-6 py-12">

    <div class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 rounded-3xl shadow-xl overflow-hidden">

        <div class="grid md:grid-cols-2 gap-10 items-center p-8 md:p-14">

            <!-- TEXT -->
            <div>

                <h1 class="text-3xl md:text-5xl font-bold text-white leading-tight mb-4">
                    Mereka Menunggumu 🐾
                </h1>

                <p class="text-slate-300 mb-6">
                    Temukan kucing dan anjing lucu yang siap menjadi bagian dari keluargamu.
                    Berikan mereka rumah baru yang penuh kasih sayang.
                </p>

                <a href="/hewan"
                   class="inline-block bg-white text-slate-900 px-6 py-3 rounded-xl font-semibold hover:bg-slate-200 transition">
                    Jelajahi Sekarang
                </a>

            </div>

            <!-- IMAGE -->
            <div class="flex justify-center md:justify-end">

                <img 
                    src="https://images.unsplash.com/photo-1450778869180-41d0601e046e?q=80&w=1200&auto=format&fit=crop"
                    class="w-72 md:w-96 rounded-2xl shadow-2xl object-cover"
                >

            </div>

        </div>

    </div>

</section>

<!-- CONTENT -->
<section class="max-w-7xl mx-auto px-6 pb-10">

    <div class="mb-6">

        <h2 class="text-xl font-bold text-slate-800">
            Hewan Terbaru
        </h2>

        <p class="text-slate-500 text-sm">
            Daftar hewan yang siap diadopsi
        </p>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

        @foreach($pets as $pet)

        <div class="bg-white rounded-2xl shadow-sm border overflow-hidden hover:shadow-md transition duration-300 flex flex-col">

            <!-- IMAGE -->
            <div class="relative overflow-hidden bg-slate-100 h-72">

                <img 
                    src="{{ asset('storage/' . $pet->foto) }}"
                    alt="{{ $pet->nama }}"
                    class="w-full h-full object-cover object-top hover:scale-105 transition duration-500"
                >

                <span class="absolute top-3 right-3 text-xs bg-green-100 text-green-700 font-medium px-2.5 py-1 rounded-full border border-green-200/50 shadow-sm">
                    {{ $pet->status }}
                </span>

            </div>

            <!-- CONTENT -->
            <div class="p-5 flex flex-col flex-1">

                <div class="flex justify-between items-center mb-2">

                    <h3 class="text-lg font-semibold text-slate-800">
                        {{ $pet->nama }}
                    </h3>

                </div>

                <p class="text-slate-500 text-sm">
                    {{ $pet->jenis }}
                </p>

                <p class="text-slate-500 text-sm mb-4">
                    Umur {{ $pet->umur }} Tahun
                </p>

                <a
                    href="/pets/{{ $pet->id }}"
                    class="block text-center bg-slate-900 text-white py-3 rounded-xl hover:bg-slate-800 transition text-sm font-semibold shadow-sm mt-auto"
                >
                    Lihat Detail
                </a>

            </div>

        </div>

        @endforeach

    </div>

</section>

<!-- FOOTER -->
<footer class="bg-slate-900 mt-10">

    <div class="max-w-7xl mx-auto px-6 py-10 text-center">

        <h2 class="text-lg font-bold text-white mb-2">
            Kontak Kami
        </h2>

        <p class="text-slate-300 text-sm mb-6">
            Butuh bantuan adopsi? Hubungi kami.
        </p>

        <div class="flex justify-center gap-4">

            <!-- WhatsApp -->
            <a href="https://wa.me/6281567906262"
               target="_blank"
               class="w-12 h-12 flex items-center justify-center bg-slate-800 hover:bg-slate-700 rounded-full border border-slate-700 transition">

                <img 
                    src="https://cdn-icons-png.flaticon.com/512/733/733585.png"
                    class="w-6 h-6 object-contain"
                >

            </a>

            <!-- Gmail -->
            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=anggunrifka2009@gmail.com"
               target="_blank"
               class="w-12 h-12 flex items-center justify-center bg-slate-800 hover:bg-slate-700 rounded-full border border-slate-700 transition">

                <img 
                    src="https://cdn-icons-png.flaticon.com/512/732/732200.png"
                    class="w-6 h-6 object-contain"
                >

            </a>

            <!-- Instagram -->
            <a href="https://instagram.com/ngnrfk"
               target="_blank"
               class="w-12 h-12 flex items-center justify-center bg-slate-800 hover:bg-slate-700 rounded-full border border-slate-700 transition">

                <img 
                    src="https://cdn-icons-png.flaticon.com/512/2111/2111463.png"
                    class="w-6 h-6 object-contain"
                >

            </a>

        </div>

        <div class="text-xs text-slate-400 mt-6">
            © 2026 FindMyPet
        </div>

    </div>

</footer>

</body>
</html>