<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Indo Berkah Konstruksi</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray">
@include('layout.header')    

<!-- HERO -->
<section id="hero"
    class="w-full h-svh min-h-[600px] md:h-[830px] relative bg-cover bg-center bg-[#1A1613]/50 bg-blend-multiply transition-all duration-1000">

    <div class="absolute inset-0 bg-black/5"></div>

    <div class="absolute inset-0 flex flex-col items-center justify-center text-center text-white z-10 px-6">
        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold leading-tight">
            Menjaga Kualitas <br> Mewujud Berkah
        </h1>
    
        <p class="mt-4 md:mt-5 text-base md:text-lg max-w-sm md:max-w-md mx-auto">
            Ciptakan rumah impian dengan desain modern,
            elegan, dan minimalis.
        </p>
    
        <button class="mt-16 md:mt-32 px-6 py-3 bg-[#C5A880] text-[#1E293B] rounded-full hover:bg-zinc-200 transition">
            <a href="/portofolio">pelajari lebih lanjut</a>
        </button>
    </div>
</section>


<!-- PROGRAM KONSTRUKSI -->
<section id="program" class="w-full bg-[#F8F8F8] py-16 md:py-20 px-4">

    <div class="text-center max-w-2xl mx-auto mb-10 md:mb-14">
        <h2 class="text-3xl md:text-4xl font-bold text-black mb-3">
            Program Kontruksi
        </h2>
    </div>

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">

        <!-- Card 1 -->
        <div class="bg-white rounded-lg p-6 md:p-8 shadow-md hover:shadow-lg transition duration-300">
            <div class="mb-5 md:mb-6">
                <img src="image/ElementProgram/building-construction-industry-18-svgrepo-com.svg" alt="" class="w-14 h-14 md:w-16 md:h-16">
            </div>
            <h3 class="text-lg md:text-xl font-semibold text-black mb-3 md:mb-4">
                Renovasi Bangunan
            </h3>
            <p class="text-gray-500 leading-7 md:leading-8 text-sm md:text-base">
                Kami menawarkan solusi renovasi dan perbaikan bangunan yang
                efisien untuk meningkatkan fungsi, estetika, dan kenyamanan
                properti Anda.
            </p>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-lg p-6 md:p-8 shadow-md hover:shadow-lg transition duration-300">
            <div class="mb-5 md:mb-6">
                <img src="image/ElementProgram/blueprint-building-construction-svgrepo-com.svg" alt="" class="w-14 h-14 md:w-16 md:h-16">
            </div>
            <h3 class="text-lg md:text-xl font-semibold text-black mb-3 md:mb-4">
                Konsultasi Konstruksi
            </h3>
            <p class="text-gray-500 leading-7 md:leading-8 text-sm md:text-base">
                Layanan ini mencakup konsultasi perencanaan desain dan
                konstruksi, membantu Anda mewujudkan proyek sesuai anggaran
                dan kebutuhan.
            </p>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-lg p-6 md:p-8 shadow-md hover:shadow-lg transition duration-300">
            <div class="mb-5 md:mb-6">
                <img src="image/ElementProgram/building-construction-industry-5-svgrepo-com.svg" alt="" class="w-14 h-14 md:w-16 md:h-16">
            </div>
            <h3 class="text-lg md:text-xl font-semibold text-black mb-3 md:mb-4">
                Gedung Komersial
            </h3>
            <p class="text-gray-500 leading-7 md:leading-8 text-sm md:text-base">
                Indo Berkah Konstruksi melayani pembangunan gedung komersial
                seperti kantor, ruko, dan hotel dengan fokus pada efisiensi
                serta ketahanan struktur.
            </p>
        </div>

        <!-- Card 4 -->
        <div class="bg-white rounded-lg p-6 md:p-8 shadow-md hover:shadow-lg transition duration-300">
            <div class="mb-5 md:mb-6">
                <img src="image/ElementProgram/building-construction-industry-20-svgrepo-com.svg" alt="" class="w-14 h-14 md:w-16 md:h-16">
            </div>
            <h3 class="text-lg md:text-xl font-semibold text-black mb-3 md:mb-4">
                Pembangunan Rumah
            </h3>
            <p class="text-gray-500 leading-7 md:leading-8 text-sm md:text-base">
                Kami menyediakan layanan pembangunan rumah dari tahap
                perencanaan hingga selesai dengan desain yang disesuaikan
                kebutuhan dan kualitas konstruksi terbaik.
            </p>
        </div>

    </div>

</section>


<section class="flex flex-col md:flex-row min-h-[50vh] md:h-[65vh]">
    
   
    <div
        class="w-full md:w-[75%] h-[50vw] min-h-[280px] md:h-auto bg-cover bg-center relative"
        style="background-image:url('image/pexels-introspectivedsgn-18426839.jpg'); background-position: right center;"
    >
        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative z-10 h-full flex items-center px-8 md:px-24">
            <div>
                <div class="border-l-4 md:border-l-8 border-white pl-4 md:pl-6">
                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold text-white">
                        Indo
                        <br>
                        Berkah Konstruksi
                    </h1>
                </div>

                <p class="mt-4 md:mt-8 text-white text-sm">
                    Menjaga Kualitas Mewujud Berkah
                </p>

                <button
                    class="mt-6 md:mt-10 border-2 border-white text-white px-6 md:px-8 py-3 md:py-4 tracking-[2px] md:tracking-[4px] text-sm font-semibold hover:bg-yellow-500 transition"
                >
                    <a href="/tentang-kami">Tentang Kami</a>
                </button>
            </div>
        </div>
    </div>

    <!-- KANAN -->
    <div class="w-full md:w-[25%] bg-gray-300 px-6 md:px-8 py-10 md:py-12">
        <h2 class="text-2xl md:text-4xl font-bold mb-6 md:mb-12">
            Tentang Kami
        </h2>

        <div class="space-y-6 md:space-y-10">
            <div>
                <h3 class="font-bold text-base md:text-xl">
                    INDO BERKAH KONSTRUKSI
                    <span class="font-normal"> adalah perusahaan jasa konstruksi yang menyediakan layanan pembangunan rumah, gedung, infrastruktur, renovasi, serta konstruksi besi dan baja. 
                        Kami siap menangani proyek skala kecil maupun besar dengan kualitas dan profesionalisme terbaik.</span>
                </h3>
            </div>
        </div>
    </div>

</section>


<section id="portofolio" class="py-16 md:py-20 px-4">
    <div class="max-w-7xl mx-auto">

        <div class="flex flex-col sm:flex-row items-start sm:items-center gap-4 mb-8 md:mb-10 justify-between">

            <!-- Filter — scroll horizontal di mobile -->
            <div class="w-full sm:w-auto overflow-x-auto pb-1">
                <ul class="inline-flex overflow-hidden border border-gray-300 rounded-full bg-white whitespace-nowrap text-sm">
                    <li><button class="px-4 py-2.5 text-amber-500">Semua</button></li>
                    <li><button class="px-4 py-2.5 hover:text-amber-400">Pembangunan Rumah</button></li>
                    <li><button class="px-4 py-2.5 hover:text-amber-400">Gedung Komersial</button></li>
                    <li><button class="px-4 py-2.5 hover:text-amber-400">Konsultasi</button></li>
                    <li><button class="px-4 py-2.5 hover:text-amber-400">Renovasi</button></li>
                </ul>
            </div>

            <!-- Tombol Panah -->
            <button class="shrink-0 w-12 h-12 flex items-center justify-center border border-gray-300 rounded-full hover:bg-gray-100 transition">
                <a href="{{ route('portofolio') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </button>

        </div>

        <!-- Cards scroll horizontal -->
        <div class="flex gap-6 overflow-x-auto scrollbar-hide scroll-smooth pb-4 -mx-4 px-4">

            @php
                $portofolios = [
                    ['img' => 'porto1.jpg', 'title' => 'Melakukan Desain Interior Di Sesetan', 'cat' => 'Hunian, Interior'],
                    ['img' => 'porto2.jpg', 'title' => 'Melakukan Desain Interior Di Sesetan', 'cat' => 'Hunian, Interior'],
                    ['img' => 'porto3.jpg', 'title' => 'Melakukan Desain Interior Di Sesetan', 'cat' => 'Hunian, Interior'],
                    ['img' => 'porto4.jpg', 'title' => 'Melakukan Desain Interior Di Sesetan', 'cat' => 'Hunian, Interior'],
                ];
            @endphp

            @foreach($portofolios as $p)
            <div class="group w-64 sm:w-72 md:w-80 shrink-0">
                <div class="overflow-hidden rounded-lg shadow">
                    <img
                        src="image/Portofolio/{{ $p['img'] }}"
                        alt="{{ $p['title'] }}"
                        class="w-full aspect-[4/3] object-cover group-hover:scale-105 duration-500"
                    >
                </div>
                <h3 class="mt-3 md:mt-4 text-base md:text-xl font-bold">{{ $p['title'] }}</h3>
                <p class="mt-1 md:mt-2 text-gray-500 text-sm">{{ $p['cat'] }}</p>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- REVIEW -->
<section id="review" class="py-16 md:py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 md:px-6">

        <div class="text-center mb-12 md:mb-20">
            <span class="text-xs md:text-sm tracking-[0.4em] uppercase text-zinc-400">
                Client Review
            </span>
            <h2 class="mt-3 md:mt-4 text-3xl sm:text-4xl md:text-5xl font-light text-zinc-900">
                Dipercaya Oleh Banyak Klien
            </h2>
        </div>

        <div class="space-y-12 md:space-y-20">

            @forelse($reviews as $review)
                <div class="border-l border-zinc-500 pl-6 md:pl-8">
                    <p class="text-lg sm:text-xl md:text-2xl leading-relaxed text-zinc-700 font-light">
                        "{{ $review->message }}"
                    </p>
                    <div class="mt-5 md:mt-8">
                        <h4 class="font-medium text-zinc-900">{{ $review->user->name }}</h4>
                        <p class="text-zinc-400 text-sm mt-1">Klien IBK Construction</p>
                    </div>
                </div>
            @empty
                <div class="border-l border-zinc-500 pl-6 md:pl-8">
                    <p class="text-zinc-500">Belum ada review dari klien.</p>
                </div>
            @endforelse

        </div>
    </div>
</section>


<a href="{{ route('penawaran.index') }}" class="float-btn">Buat penawaran </a>

@include('layout.footer') 
</body>
</html>