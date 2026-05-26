<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Hewan</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body{
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-100 via-blue-50 to-slate-200 min-h-screen">

<!-- CONTAINER -->
<div class="max-w-6xl mx-auto px-6 py-10">

    <!-- BACK BUTTON -->
    <a href="{{ route('index.blade') }}"
       class="inline-flex items-center gap-2 text-slate-600 hover:text-slate-900 mb-6 transition">

        ← Kembali

    </a>

    <!-- CARD -->
    <div class="bg-white/80 backdrop-blur-md rounded-[32px] shadow-xl overflow-hidden border border-white/40">

        <div class="grid md:grid-cols-2 gap-0">

            <!-- IMAGE -->
            <div class="p-6 md:p-8">

                <img
                    src="{{ asset('storage/' . $pet->foto) }}"
                    class="w-full h-[350px] md:h-[500px] object-cover rounded-3xl shadow-lg"
                >

            </div>

            <!-- CONTENT -->
            <div class="p-6 md:p-10 flex flex-col justify-center">

                <!-- STATUS -->
                <span class="w-fit bg-emerald-100 text-emerald-600 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                    {{ $pet->status }}
                </span>

                <!-- NAME -->
                <h1 class="text-4xl md:text-5xl font-bold text-slate-800 mb-3">
                    {{ $pet->nama }}
                </h1>

                <!-- JENIS -->
                <p class="text-slate-500 text-lg mb-6">
                    {{ $pet->jenis }}
                </p>

                <!-- BADGES -->
                <div class="flex flex-wrap gap-3 mb-8">

                    <!-- UMUR -->
                    <div class="bg-blue-100 text-blue-700 px-4 py-3 rounded-2xl text-sm font-semibold">
                       {{ $pet->umur }} Tahun

                    </div>

                    <!-- GENDER -->
                    <div class="bg-purple-100 text-purple-700 px-4 py-3 rounded-2xl text-sm font-semibold">
                        ♂️ {{ $pet->gender }}
                    </div>

                </div>

                <!-- DESCRIPTION -->
                <div class="mb-8">

                    <h2 class="text-lg font-bold text-slate-800 mb-3">
                        Tentang {{ $pet->nama }}
                    </h2>

                    <p class="text-slate-600 leading-relaxed">
                        {{ $pet->deskripsi }}
                    </p>

                </div>

                <!-- BUTTON -->
                <a
                    href="https://api.whatsapp.com/send?phone=6281567906262&text=Saya%20ingin%20mengadopsi%20{{ $pet->nama }}"
                    target="_blank"
                    class="w-full md:w-fit text-center bg-slate-900 hover:bg-slate-800 text-white px-8 py-4 rounded-2xl font-semibold transition shadow-lg"
                >
                    Ajukan Adopsi
                </a>

            </div>

        </div>

    </div>

</div>

</body>
</html>