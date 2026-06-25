<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Penawaran</title>
     @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
@include('layout.header')   

<section id="penawaran" class="py-35 bg-gray-50">
    <div class="max-w-2xl mx-auto px-4 sm:px-6">

        <!-- Header -->
        <div class="text-center mb-10">
            <span class="inline-block bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-4">
                Konsultasi Gratis
            </span>
            <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-3">
                Dapatkan Penawaran Terbaik
            </h2>
            <p class="text-gray-500 text-base">
                Isi form di bawah dan tim kami akan menghubungi Anda dalam 1x24 jam.
            </p>
        </div>

        <!-- Card Form -->
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">

            <!-- Header Card -->
            <div class="bg-gradient-to-r from-slate-800 to-slate-700 px-8 py-6">
                <div class="flex items-center gap-4 text-white">
                    <div class="w-12 h-12 bg-amber-400 rounded-xl flex items-center justify-center flex-shrink-0">
                        <svg class="w-6 h-6 text-slate-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-bold text-lg">Form Penawaran</h3>
                        <p class="text-slate-300 text-sm">Indo Berkah Konstruksi</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form action="{{ route('penawaran.store') }}" method="POST" enctype="multipart/form-data" class="p-8 space-y-5">
                @csrf

                <!-- Nama -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        name="nama"
                        value="{{ old('nama') }}"
                        placeholder="Nama Anda"
                        required
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-none transition bg-gray-50">
                    @error('nama')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Telepon -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        No. Telepon / WhatsApp <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="tel"
                        name="telepon"
                        value="{{ old('telepon') }}"
                        placeholder="08xx xxxx xxxx"
                        required
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-none transition bg-gray-50">
                    @error('telepon')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Email
                    </label>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="email@contoh.com"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-none transition bg-gray-50">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Foto -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Foto Referensi / Inspirasi
                    </label>
                    <label class="block cursor-pointer">
                        <input
                            type="file"
                            name="foto"
                            accept="image/*"
                            class="hidden"
                            onchange="previewFoto(this)">
                        <div id="foto-dropzone" class="border-2 border-dashed border-gray-200 rounded-xl p-6 text-center hover:border-amber-400 hover:bg-amber-50 transition">
                            <svg class="w-8 h-8 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            <p id="foto-label" class="text-sm text-gray-400">Klik untuk upload foto referensi</p>
                            <p class="text-xs text-gray-300 mt-1">JPG, PNG maksimal 5MB</p>
                        </div>
                        <!-- Preview -->
                        <img id="foto-preview" src="" alt="Preview" class="hidden mt-3 rounded-xl w-full max-h-48 object-cover">
                    </label>
                    @error('foto')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Deskripsi -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Deskripsi Proyek <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        name="deskripsi"
                        rows="4"
                        required
                        placeholder="Ceritakan kebutuhan proyek Anda: lokasi, konsep, luas bangunan, dll..."
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-none transition bg-gray-50 resize-none">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                 <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Alamat Proyek <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        name="alamat"
                        rows="4"
                        required
                        placeholder="Masukan Link Google Maps lokasi proyek Anda"
                        class="w-full border border-gray-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-none transition bg-gray-50 resize-none">{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Budget -->
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">
                        Estimasi Budget <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
                        @foreach([
                            '< Rp 100 Juta',
                            'Rp 100 - 300 Juta',
                            'Rp 300 - 500 Juta',
                            'Rp 500 Juta - 1 M',
                            '> Rp 1 Miliar',
                            'Belum Tahu',
                        ] as $b)
                            <label class="cursor-pointer">
                                <input type="radio" name="budget" value="{{ $b }}" class="hidden peer" {{ old('budget') === $b ? 'checked' : '' }}>
                                <div class="peer-checked:bg-amber-400 peer-checked:border-amber-400 peer-checked:text-slate-800 peer-checked:font-semibold
                                            border border-gray-200 rounded-xl p-3 text-center text-xs text-gray-500
                                            hover:border-amber-300 transition">
                                    {{ $b }}
                                </div>
                            </label>
                        @endforeach
                    </div>
                    @error('budget')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <button
                    type="submit"
                    class="w-full bg-gradient-to-r from-amber-400 to-amber-500 hover:from-amber-500 hover:to-amber-600
                           text-slate-900 font-bold py-4 rounded-xl transition-all duration-200
                           flex items-center justify-center gap-2 shadow-lg shadow-amber-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                    </svg>
                    Kirim Permintaan Penawaran
                </button>

                <p class="text-center text-xs text-gray-400">
                    Tim kami akan menghubungi Anda dalam 1x24 jam.
                </p>
            </form>

            <!-- Success Message -->
            @if(session('penawaran_success'))
                <div class="mx-8 mb-8 p-4 bg-green-50 border border-green-200 rounded-xl flex items-start gap-3">
                    <svg class="w-5 h-5 text-green-500 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <div>
                        <p class="text-green-800 font-semibold text-sm">Penawaran berhasil dikirim!</p>
                        <p class="text-green-600 text-xs mt-0.5">Tim kami akan menghubungi Anda dalam 1x24 jam.</p>
                    </div>
                </div>
            @endif

        </div>
    </div>
</section>

<script>
    function previewFoto(input) {
        const preview = document.getElementById('foto-preview');
        const label   = document.getElementById('foto-label');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                preview.src = e.target.result;
                preview.classList.remove('hidden');
                label.textContent = '✓ ' + input.files[0].name;
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@include('layout.footer')
</body>
</html>