<nav class="fixed top-3 md:top-5 left-0 w-full px-4 md:px-10 flex items-center justify-center z-50">

    <!-- Logo kiri (hidden di mobile) -->
    <div class="hidden md:flex absolute left-10 h-25 items-center border-none outline-none">
        <img 
            src="{{ asset('image/logoIBK.png') }}" 
            alt="Logo PT Indo Berkah" 
            class="h-full w-auto object-contain border-none outline-none"
        />
    </div>

    <!-- Dynamic Island navbar -->
    <div id="dynamicIsland"
        class="bg-white/90 backdrop-blur-xl border border-white/10 text-[#111827]
        rounded-full transition-all duration-500 ease-in-out
        w-full max-w-[95vw] md:w-180 h-14 md:h-16 px-4 md:px-5 
        flex items-center justify-between shadow-2xl overflow-hidden">

        <!-- Logo -->
        <div class="flex items-center gap-2 shrink-0">
            <a href="/" 
            class="w-7 h-7 md:w-8 md:h-8 rounded-full bg-cover block hover:scale-110 transition duration-300"
            style="background-image: url('{{ asset('image/Logo PT. Indo Berkah.png') }}')">
            </a>
            <span class="font-semibold text-sm md:text-base">IDK</span>
        </div>

        <!-- Menu desktop -->
        <ul id="menu" class="hidden md:flex items-center gap-5 text-sm transition-all duration-300">
            <li>
                <a href="{{ route('portofolio') }}" class="hover:text-zinc-500 transition font-semibold">
                    Portofolio
                </a>
            </li>
            <li>
                <a href="{{ url('/') }}#program" class="hover:text-zinc-500 transition font-semibold">
                    Program
                </a>
            </li>
            <li>
                <a href="{{ route('partner-client') }}" class="hover:text-zinc-500 transition font-semibold">
                    Partner&Client
                </a>
            </li>
            <li>
                <a href="{{ route('tentang-kami') }}" class="hover:text-zinc-500 transition font-semibold">
                    Info
                </a>
            </li>
        </ul>

        <!-- Search (desktop) -->
        <div class="hidden md:flex items-center gap-2 shrink-0">
            <button id="searchBtn"
                class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 transition flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 0 5.4 5.4a7.5 7.5 0 0 0 11.25 11.25Z" />
                </svg>
            </button>
            <input id="searchInput" type="text" placeholder="Search..."
                class="bg-transparent outline-none text-sm w-0 opacity-0 transition-all duration-500 placeholder:text-zinc-400 font-semibold" />
        </div>

        <!-- Mobile: Login + Hamburger -->
        <div class="flex md:hidden items-center gap-3 shrink-0">
            <a href="login" class="text-sm font-semibold">Login</a>
            <button id="mobileMenuBtn" class="w-8 h-8 flex flex-col justify-center items-center gap-1.5">
                <span class="block w-5 h-0.5 bg-gray-800 transition-all duration-300" id="bar1"></span>
                <span class="block w-5 h-0.5 bg-gray-800 transition-all duration-300" id="bar2"></span>
                <span class="block w-5 h-0.5 bg-gray-800 transition-all duration-300" id="bar3"></span>
            </button>
        </div>
    </div>

    <!-- Login/Register (desktop) -->
    <div class="hidden md:flex absolute right-10 px-5 py-2 h-13.5 items-center bg-white/90 rounded-full text-black font-medium shadow-2xl">
        <a href='/login'>login</a>
        <a href="/register" class="ml-1">| Daftar</a>
    </div>
</nav>

<!-- Mobile Dropdown Menu -->
<div id="mobileMenu"
    class="fixed top-[70px] left-4 right-4 bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl z-40
           overflow-hidden max-h-0 transition-all duration-300 ease-in-out md:hidden">
    <ul class="flex flex-col text-sm font-semibold text-gray-800 px-6 py-4 gap-4">
        <li><a href="{{ route('portofolio') }}" class="block py-2 border-b border-gray-100 hover:text-amber-500">Portofolio</a></li>
        <li><a href="{{ url('/') }}#program" class="block py-2 border-b border-gray-100 hover:text-amber-500">Program</a></li>
        <li><a href="{{ route('partner-client') }}" class="block py-2 border-b border-gray-100 hover:text-amber-500">Partner & Client</a></li>
        <li><a href="{{ route('tentang-kami') }}" class="block py-2 border-b border-gray-100 hover:text-amber-500">Info</a></li>
        <li class="flex gap-3 pt-1">
            <a href="/login" class="flex-1 text-center py-2 rounded-full border border-gray-300 hover:bg-gray-50">Login</a>
            <a href="/register" class="flex-1 text-center py-2 rounded-full bg-amber-500 text-white hover:bg-amber-600">Daftar</a>
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
        bar1.style.transform = open ? 'rotate(45deg) translate(4px, 4px)' : '';
        bar2.style.opacity = open ? '0' : '1';
        bar3.style.transform = open ? 'rotate(-45deg) translate(4px, -4px)' : '';
    });
</script>