<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Hewan</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-slate-100 via-blue-50 to-slate-200 min-h-screen">

<div class="max-w-xl mx-auto mt-10 px-4">

    <div class="bg-white/80 backdrop-blur-md p-6 md:p-8 rounded-3xl shadow-xl border border-white/40">

        <h1 class="text-2xl md:text-3xl font-bold mb-6 text-slate-800">
            Edit Hewan 
        </h1>

        <!-- ERROR -->
        @if ($errors->any())
            <div class="bg-rose-100 text-rose-600 p-4 rounded-2xl mb-5 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/admin/update-hewan/{{ $pet->id }}" method="POST" enctype="multipart/form-data" class="space-y-4">

            @csrf

            <!-- NAMA -->
            <div>
                <label class="text-sm font-medium text-slate-700">Nama Hewan</label>
                <input
                    type="text"
                    name="nama"
                    value="{{ $pet->nama }}"
                    required
                    class="w-full border border-slate-200 p-3 rounded-2xl mt-1 outline-none focus:border-slate-500"
                >
            </div>

            <!-- JENIS -->
            <div>
                <label class="text-sm font-medium text-slate-700">Jenis Hewan</label>
                <select
                    name="jenis"
                    required
                    class="w-full border border-slate-200 p-3 rounded-2xl mt-1 outline-none focus:border-slate-500"
                >
                    <option value="Kucing" {{ $pet->jenis == 'Kucing' ? 'selected' : '' }}>Kucing</option>
                    <option value="Anjing" {{ $pet->jenis == 'Anjing' ? 'selected' : '' }}>Anjing</option>
                </select>
            </div>

            <!-- UMUR -->
<div>
    <label class="text-sm font-medium text-slate-700">Umur</label>

    <div class="flex gap-3 mt-1">

       <input
       type="number"
       name="umur"
       value="{{ $pet->umur }}"
       required
       class="w-full border border-slate-200 p-3 rounded-2xl mt-1 outline-none focus:border-slate-500"
       />
    
    </div>
</div>

            <!-- GENDER -->
            <div>
                <label class="text-sm font-medium text-slate-700">Jenis Kelamin</label>
                <select
                    name="gender"
                    required
                    class="w-full border border-slate-200 p-3 rounded-2xl mt-1 outline-none focus:border-slate-500"
                >
                    <option value="Jantan" {{ $pet->gender == 'Jantan' ? 'selected' : '' }}>Jantan</option>
                    <option value="Betina" {{ $pet->gender == 'Betina' ? 'selected' : '' }}>Betina</option>
                </select>
            </div>

            <!-- STATUS -->
            <div>
                <label class="text-sm font-medium text-slate-700">Status</label>
                <select
                    name="status"
                    required
                    class="w-full border border-slate-200 p-3 rounded-2xl mt-1 outline-none focus:border-slate-500"
                >
                    <option value="Tersedia" {{ $pet->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>
                    <option value="Diadopsi" {{ $pet->status == 'Diadopsi' ? 'selected' : '' }}>Diadopsi</option>
                </select>
            </div>

            <!-- DESKRIPSI -->
            <div>
                <label class="text-sm font-medium text-slate-700">Deskripsi</label>
                <textarea
                    name="deskripsi"
                    required
                    class="w-full border border-slate-200 p-3 rounded-2xl mt-1 outline-none focus:border-slate-500 h-28"
                >{{ $pet->deskripsi }}</textarea>
            </div>

            <!-- FOTO (SIMPLE VERSION) -->
            <div>
                <label class="text-sm font-medium text-slate-700">Foto Hewan</label>

                <div class="mt-2 mb-3">
                    <img
                        src="{{ asset('storage/' . $pet->foto) }}"
                        class="w-28 h-28 object-cover rounded-2xl shadow"
                    >
                </div>

                <input
                    type="file"
                    name="foto"
                    class="w-full border border-slate-200 p-3 rounded-2xl outline-none focus:border-slate-500"
                >

            </div>

            <!-- BUTTON -->
            <div class="flex gap-3 pt-2">

                <a
                    href="/admin"
                    class="w-full bg-slate-200 hover:bg-slate-300 text-slate-800 text-center py-3 rounded-2xl font-semibold transition"
                >
                    Kembali
                </a>

                <button
                    class="w-full bg-[#0f172a] hover:bg-[#1e293b] text-white py-3 rounded-2xl font-semibold transition shadow-lg"
                >
                    Update Hewan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>