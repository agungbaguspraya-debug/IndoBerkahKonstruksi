<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $service['title'] }} - Layanan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900 font-sans antialiased">
    @include('layout.header')
    
    <main class="pt-32 pb-24 md:pt-40 md:pb-32 px-6 md:px-12 min-h-screen">
        <div class="max-w-4xl mx-auto">
            <!-- Header Section -->
            <div class="relative bg-white border border-gray-100 rounded-3xl p-10 md:p-16 mb-16 md:mb-20 shadow-sm overflow-hidden" data-aos="fade-up">
                <!-- Decorative background elements -->
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-[#C5A880]/5 rounded-full blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -mb-10 -ml-10 w-64 h-64 bg-gray-100 rounded-full blur-3xl"></div>
                
                <div class="relative z-10 text-center">
                    <div class="w-20 h-20 mx-auto mb-8 text-[#C5A880] bg-gray-50 rounded-2xl shadow-inner border border-gray-100 flex items-center justify-center p-5" data-aos="zoom-in" data-aos-delay="100">
                        <img src="{{ asset($service['icon']) }}" class="w-full h-full object-contain opacity-90" alt="{{ $service['title'] }}">
                    </div>
                    <p class="uppercase tracking-[0.3em] text-[#C5A880] text-xs md:text-sm mb-4 font-bold" data-aos="fade-down" data-aos-delay="200">
                        Detail Layanan
                    </p>
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6 tracking-wide" data-aos="fade-up" data-aos-delay="300">
                        {{ $service['title'] }}
                    </h1>
                    <div class="w-16 h-[2px] bg-[#C5A880] mx-auto mb-8"></div>
                    <p class="text-gray-500 leading-relaxed font-light text-lg md:text-xl text-center max-w-2xl mx-auto" data-aos="fade-up" data-aos-delay="400">
                        {{ $service['description'] }}
                    </p>
                </div>
            </div>

            <!-- Tata Cara Pemesanan -->
            <div class="bg-white rounded-3xl shadow-[0_20px_40px_-15px_rgba(0,0,0,0.05)] border border-gray-100 p-8 md:p-12 mb-16" data-aos="fade-up">
                <h2 class="text-2xl md:text-3xl font-light text-gray-900 mb-12 text-center tracking-wide">
                    Tata Cara <span class="font-bold text-[#C5A880]">Pemesanan & Kolaborasi</span>
                </h2>
                
                <div class="relative">
                    <!-- Vertical Line -->
                    <div class="absolute left-[15px] md:left-[31px] top-4 bottom-4 w-[2px] bg-[#C5A880]/20"></div>
                    
                    <div class="space-y-8">
                        @foreach($service['steps'] as $index => $step)
                        <div class="group relative pl-12 md:pl-20" data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
                            <!-- Circle -->
                            <div class="absolute left-0 md:left-4 top-4 w-8 h-8 rounded-full bg-white border-2 border-[#C5A880] group-hover:bg-[#C5A880] transition-colors duration-300 flex items-center justify-center shadow-sm z-10">
                                <span class="text-[#C5A880] group-hover:text-white font-bold text-xs transition-colors duration-300">{{ $index + 1 }}</span>
                            </div>
                            
                            <!-- Card Content -->
                            <div class="bg-gray-50/50 group-hover:bg-[#C5A880]/5 p-6 rounded-2xl border border-transparent group-hover:border-[#C5A880]/20 transition-all duration-300">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-[#C5A880] transition-colors duration-300">{{ $step['title'] }}</h3>
                                <p class="text-gray-500 font-light text-sm md:text-base leading-relaxed">
                                    {{ $step['desc'] }}
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- CTA -->
            <div class="text-center" data-aos="zoom-in">
                <h3 class="text-2xl font-light mb-6 text-gray-900">Tertarik untuk memulai proyek Anda?</h3>
                <a href="{{ route('penawaran.index', ['layanan' => $service['slug']]) }}" class="inline-block bg-[#C5A880] hover:bg-[#b09570] text-white font-medium text-sm tracking-[0.2em] uppercase px-10 py-5 rounded-md transition-all duration-300 shadow-lg shadow-[#C5A880]/30 hover:shadow-[#C5A880]/50 hover:-translate-y-1">
                    Ajukan Kolaborasi
                </a>
            </div>
            
        </div>
    </main>

    @include('layout.footer')
    
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof AOS !== 'undefined') {
                AOS.init({
                    duration: 1000,
                    once: true,
                    offset: 50,
                });
            }
        });
    </script>
</body>
</html>
