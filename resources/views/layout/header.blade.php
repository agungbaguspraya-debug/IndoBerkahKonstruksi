@php
    $isHome = request()->is('/');
    $navBg = $isHome ? 'bg-transparent' : 'bg-[#111111] shadow-lg';
    $navPadding = $isHome ? 'py-8' : 'py-5';
@endphp
<nav id="mainNavbar" class="fixed top-0 left-0 w-full px-6 md:px-12 {{ $navPadding }} flex items-center justify-between z-50 {{ $navBg }} transition-all duration-300">

    <!-- Logo -->
    <div class="flex items-center gap-4 shrink-0">
        <a href="/" class="w-10 h-10 rounded-full bg-cover bg-center block border border-[#C5A880]/30 hover:border-[#C5A880] transition-colors duration-500"
        style="background-image: url('{{ asset('image/Logo/Logo PT. Indo Berkah.png') }}')">
        </a>
        <span class="font-light tracking-[0.2em] text-[#C5A880] text-sm uppercase hidden sm:block">Indo Berkah</span>
    </div>

    <!-- Menu desktop -->
    <ul id="menu" class="hidden md:flex items-center gap-8 text-[11px] lg:text-xs font-medium tracking-[0.15em] uppercase text-gray-100">
        <li>
            <a href="{{  route('tentang-kami') }}" class="hover:text-[#C5A880] transition-colors duration-300">tentang kami</a>
        </li>
        <li>
            <a href="{{  url('our-team') }}" class="hover:text-[#C5A880] transition-colors duration-300">Our Team</a>
        </li>
        <li>
            <a href="{{ url('/') }}#program" class="hover:text-[#C5A880] transition-colors duration-300">Layanan</a>
        </li>
        <li>
            <a href="{{ route('portofolio') }}" class="hover:text-[#C5A880] transition-colors duration-300">Portofolio</a>
        </li>
        <li>
            <a href="/penawaran" class="hover:text-[#C5A880] transition-colors duration-300">Ajukan Kolaborasi</a>
        </li>
        <li>
            <a href="{{ route('partner-client') }}" class="hover:text-[#C5A880] transition-colors duration-300">Partner</a>
        </li>
        <li>
            <a href="{{ route('join-us') }}" class="hover:text-[#C5A880] transition-colors duration-300">Join Us</a>
        </li>
        <li>
            <a href="{{ route('berita.index') }}" class="hover:text-[#C5A880] transition-colors duration-300">Berita</a>
        </li>
      
    </ul>

    <!-- Action (Desktop) -->
    <div class="hidden md:flex items-center gap-6 shrink-0">
        <a href="/login" class="text-xs font-medium tracking-[0.15em] uppercase text-gray-400 hover:text-[#C5A880] transition-colors duration-300">Masuk</a>
        <a href="/register" class="text-xs font-medium tracking-[0.15em] uppercase border border-[#C5A880]/50 text-[#C5A880] px-6 py-2.5 hover:bg-[#C5A880] hover:text-white transition-all duration-500">Daftar</a>
    </div>

    <!-- Mobile Menu Button -->
    <button id="mobileMenuBtn" class="w-8 h-8 flex flex-col justify-center items-end gap-1.5 md:hidden text-[#C5A880]">
        <span class="block w-6 h-[1px] bg-[#C5A880] transition-all duration-300" id="bar1"></span>
        <span class="block w-4 h-[1px] bg-[#C5A880] transition-all duration-300" id="bar2"></span>
        <span class="block w-6 h-[1px] bg-[#C5A880] transition-all duration-300" id="bar3"></span>
    </button>
</nav>

<!-- Mobile Dropdown Menu -->
<div id="mobileMenu"
    class="fixed top-[72px] left-0 w-full bg-[#111111]/95 backdrop-blur-xl border-b border-white/5 z-40 overflow-hidden max-h-0 transition-all duration-500 ease-in-out md:hidden">
    <ul class="flex flex-col text-xs font-light tracking-[0.2em] uppercase text-gray-300 px-8 py-8 gap-6">
        <li><a href="{{ route('portofolio') }}" class="block hover:text-[#C5A880] transition-colors">Portofolio</a></li>
        <!-- Mobile Dropdown Galeri -->
        <li>
            <div class="flex flex-col gap-3">
                <span class="block text-gray-500 font-medium">Galeri</span>
                <div class="flex flex-col gap-4 pl-4 border-l border-white/20">
                    <a href="{{ route('video') }}" class="block hover:text-[#C5A880] transition-colors">Vidio</a>
                    <a href="{{ route('portofolio.list') }}" class="block hover:text-[#C5A880] transition-colors">Galery</a>
                </div>
            </div>
        </li>
        <li><a href="{{ url('/') }}#program" class="block hover:text-[#C5A880] transition-colors">Layanan</a></li>
        <li><a href="{{ route('berita.index') }}" class="block hover:text-[#C5A880] transition-colors">Berita</a></li>
        <li><a href="/penawaran" class="block hover:text-[#C5A880] transition-colors">Daftar Layanan</a></li>
        <li><a href="{{ route('partner-client') }}" class="block hover:text-[#C5A880] transition-colors">Partner & Client</a></li>
        <li><a href="{{ route('join-us') }}" class="block hover:text-[#C5A880] transition-colors">Join Us</a></li>
        <!-- Mobile Dropdown Info -->
        <li>
            <div class="flex flex-col gap-3">
                <span class="block text-gray-500 font-medium">Info</span>
                <div class="flex flex-col gap-4 pl-4 border-l border-white/20">
                    <a href="{{ route('tentang-kami') }}" class="block hover:text-[#C5A880] transition-colors">Tentang Kami</a>
                    <a href="{{ url('our-team') }}" class="block hover:text-[#C5A880] transition-colors">Our Team</a>
                </div>
            </div>
        </li>
        <li class="flex flex-col gap-4 pt-6 border-t border-white/10 mt-2">
            <a href="/login" class="text-center py-3.5 border border-gray-700 hover:border-[#C5A880] hover:text-[#C5A880] transition-colors tracking-widest">Masuk</a>
            <a href="/register" class="text-center py-3.5 bg-[#C5A880] text-[#111] font-medium hover:bg-[#A68A60] transition-colors tracking-widest">Daftar</a>
        </li>
    </ul>
</div>

<script>
    const btn = document.getElementById('mobileMenuBtn');
    const menu = document.getElementById('mobileMenu');
    const bar1 = document.getElementById('bar1');
    const bar2 = document.getElementById('bar2');
    const bar3 = document.getElementById('bar3');
    let open = false;

    btn.addEventListener('click', () => {
        open = !open;
        menu.style.maxHeight = open ? menu.scrollHeight + 'px' : '0';
        
        // Luxury hamburger animation (transform into sleek X)
        bar1.style.transform = open ? 'rotate(45deg) translate(5px, 4.5px)' : '';
        bar2.style.opacity = open ? '0' : '1';
        bar3.style.transform = open ? 'rotate(-45deg) translate(5px, -4.5px)' : '';
        bar2.style.width = open ? '24px' : '16px';
    });

    const mainNavbar = document.getElementById('mainNavbar');
    const isHomePage = {{ request()->is('/') ? 'true' : 'false' }};

    if (isHomePage) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                mainNavbar.classList.remove('bg-transparent', 'py-8');
                mainNavbar.classList.add('bg-[#111111]', 'py-5', 'shadow-lg');
            } else {
                mainNavbar.classList.add('bg-transparent', 'py-8');
                mainNavbar.classList.remove('bg-[#111111]', 'py-5', 'shadow-lg');
            }
        });
    }
</script>