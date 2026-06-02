<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Hewan</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100 min-h-screen">

<div class="max-w-xl mx-auto py-10 px-4">

    <div class="bg-white rounded-2xl shadow-sm border p-8">

        <h1 class="text-2xl font-bold mb-6 text-slate-800">
            Tambah Hewan 🐾
        </h1>

        <!-- Error -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-600 p-4 rounded-xl mb-5">
                <ul class="list-disc pl-5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/pets/store" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- NAMA -->
            <label class="text-sm font-semibold text-slate-700">
                Nama Hewan
            </label>

            <input
                type="text"
                name="nama"
                placeholder="Contoh: Milo"
                value="{{ old('nama') }}"
                required
                class="w-full border border-slate-300 px-4 py-3 rounded-xl mt-1 mb-4 outline-none focus:ring-2 focus:ring-slate-400"
            >

            <!-- JENIS -->
            <label class="text-sm font-semibold text-slate-700">
                Jenis Hewan
            </label>

            <div class="relative mt-1 mb-4">

                <select
                    name="jenis"
                    required
                    class="w-full border border-slate-300 bg-white px-4 py-3 rounded-xl outline-none appearance-none focus:ring-2 focus:ring-slate-400"
                >
                    <option value="">Pilih Jenis Hewan</option>
                    <option value="Kucing">Kucing</option>
                    <option value="Anjing">Anjing</option>
                </select>

                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 pointer-events-none">
                    ▼
                </span>

            </div>

            <!-- UMUR -->
            <label class="text-sm font-semibold text-slate-700">
                Umur
            </label>

            <input
                type="number"
                name="umur"
                value="{{ old('umur') }}"
                required
                min="0"
                class="w-full border border-slate-300 px-4 py-3 rounded-xl mt-1 mb-4 outline-none focus:ring-2 focus:ring-slate-400"
            >

            <!-- GENDER -->
            <label class="text-sm font-semibold text-slate-700">
                Jenis Kelamin
            </label>

            <div class="relative mt-1 mb-4">

                <select
                    name="gender"
                    required
                    class="w-full border border-slate-300 bg-white px-4 py-3 rounded-xl outline-none appearance-none focus:ring-2 focus:ring-slate-400"
                >
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="Jantan">Jantan</option>
                    <option value="Betina">Betina</option>
                </select>

                <span class="absolute right-4 top-1/2 -translate-y-1/2 text-slate-500 pointer-events-none">
                    ▼
                </span>

            </div>

            <label class="text-sm font-semibold text-slate-700">
                Deskripsi
            </label>

            <textarea
                name="deskripsi"
                placeholder="Ceritakan tentang hewan ini..."
                required
                rows="4"
                class="w-full border border-slate-300 px-4 py-3 rounded-xl mt-1 mb-4 outline-none focus:ring-2 focus:ring-slate-400"
            >{{ old('deskripsi') }}</textarea>

            <label class="text-sm font-semibold text-slate-700">
                Foto Hewan
            </label>

            <div
                id="drop-area"
                class="mt-2 mb-6 flex flex-col items-center justify-center border-2 border-dashed border-slate-300 rounded-2xl p-8 cursor-pointer hover:bg-slate-50 transition"
            >

                <span class="text-4xl mb-2">
                    📷
                </span>

                <p class="text-sm text-slate-600">
                    Klik atau seret foto ke sini
                </p>

                <p class="text-xs text-slate-400 mt-1">
                    PNG, JPG (max 2MB)
                </p>

                <p id="file-name" class="text-sm text-slate-500 mt-3"></p>

                <input
                    id="foto"
                    type="file"
                    accept=".jpg,.jpeg,.png,.avif"
                    name="foto"
                    class="hidden"
                    required
                >

            </div>

            <button
                type="submit"
                class="w-full bg-slate-900 hover:bg-slate-800 text-white py-3 rounded-xl font-semibold transition"
            >
                Simpan Hewan
            </button>

        </form>

    </div>

</div>

<script>
    const dropArea = document.getElementById('drop-area');
    const input = document.getElementById('foto');
    const fileName = document.getElementById('file-name');

    dropArea.addEventListener('click', () => {
        input.click();
    });

    input.addEventListener('change', () => {
        if (input.files.length > 0) {
            fileName.textContent = input.files[0].name;
        }
    });

    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('bg-slate-100');
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('bg-slate-100');
    });

    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();

        dropArea.classList.remove('bg-slate-100');

        if (e.dataTransfer.files.length > 0) {
            input.files = e.dataTransfer.files;
            fileName.textContent = e.dataTransfer.files[0].name;
        }
    });
</script>

</body>
</html>