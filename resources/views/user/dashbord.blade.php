<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Indo Berkah Konstruksi</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        * { font-family: 'Inter', sans-serif; }

        /* Sidebar */
        #sidebar {
            transition: transform 0.3s ease;
        }
        #sidebar-overlay {
            display: none;
        }
        @media (max-width: 768px) {
            #sidebar {
                position: fixed;
                top: 0; left: 0;
                height: 100vh;
                z-index: 50;
                transform: translateX(-100%);
            }
            #sidebar.open {
                transform: translateX(0);
            }
            #sidebar-overlay.open {
                display: block;
            }
        }

        /* Scrollbar */
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }

        /* Progress bar */
        .progress-bar {
            height: 6px;
            border-radius: 3px;
            background: #e2e8f0;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #f59e0b, #d97706);
            border-radius: 3px;
            transition: width 0.6s ease;
        }

        /* Image grid */
        .photo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
            gap: 8px;
        }
        .photo-grid img {
            width: 100%;
            aspect-ratio: 1;
            object-fit: cover;
            border-radius: 8px;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .photo-grid img:hover {
            transform: scale(1.03);
        }

        /* Lightbox */
        #lightbox {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.85);
            z-index: 100;
            align-items: center;
            justify-content: center;
        }
        #lightbox.open {
            display: flex;
        }
        #lightbox img {
            max-width: 90vw;
            max-height: 85vh;
            border-radius: 12px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.5);
        }

        /* Float button */
        .float-btn {
            position: fixed;
            bottom: 28px;
            right: 28px;
            z-index: 40;
            background: linear-gradient(135deg, #f59e0b, #d97706);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 14px 22px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            box-shadow: 0 8px 24px rgba(245,158,11,0.4);
            display: flex;
            align-items: center;
            gap: 8px;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .float-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 32px rgba(245,158,11,0.5);
        }

        /* Card hover */
        .card-hover {
            transition: box-shadow 0.2s, transform 0.2s;
        }
        .card-hover:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
        }

        /* Upload dropzone */
        .dropzone {
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            transition: border-color 0.2s, background 0.2s;
            cursor: pointer;
        }
        .dropzone:hover {
            border-color: #f59e0b;
            background: #fffbeb;
        }

        /* Nav active */
        .nav-link.active {
            background: #fffbeb;
            color: #d97706;
            font-weight: 600;
        }
        .nav-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 10px;
            color: #64748b;
            font-size: 14px;
            font-weight: 500;
            transition: background 0.15s, color 0.15s;
            text-decoration: none;
        }
        .nav-link:hover:not(.active) {
            background: #f8fafc;
            color: #1e293b;
        }

        /* Badge */
        .badge {
            font-size: 11px;
            font-weight: 600;
            padding: 2px 8px;
            border-radius: 20px;
        }
        .badge-amber { background: #fef3c7; color: #d97706; }
        .badge-green { background: #dcfce7; color: #16a34a; }
        .badge-blue  { background: #dbeafe; color: #2563eb; }

        /* Smooth scroll */
        html { scroll-behavior: smooth; }
    </style>
</head>

<body class="bg-slate-100 min-h-screen">

<!-- ============ SIDEBAR OVERLAY (mobile) ============ -->
<div id="sidebar-overlay"
     onclick="toggleSidebar()"
     class="fixed inset-0 bg-black/40 z-40 backdrop-blur-sm"></div>

<!-- ============ SIDEBAR ============ -->
<aside id="sidebar" class="w-64 bg-slate-800 shadow-2xl flex fixed flex-col">

    <!-- Logo -->
    <div class="p-5 border-b border-slate-700">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-amber-400 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-slate-800" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/>
                </svg>
            </div>
            <div>
                <div class="text-white font-bold text-sm leading-tight">Indo Berkah</div>
                <div class="text-amber-400 text-xs">Konstruksi</div>
            </div>
        </div>
    </div>

    <!-- User Info -->
    <div class="p-4 border-b border-slate-700">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-slate-800 font-bold text-sm">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
            <div class="min-w-0">
                <div class="text-white font-semibold text-sm truncate">{{ auth()->user()->name }}</div>
                <div class="text-slate-400 text-xs truncate">{{ auth()->user()->email }}</div>
            </div>
        </div>
    </div>

    <!-- Nav -->
    <nav class="flex-1 p-3 space-y-1 overflow-y-auto">
        <div class="text-slate-500 text-xs uppercase tracking-wider px-3 py-2 font-semibold">Menu</div>

        <a href="/dashboard" class="nav-link active">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Dashboard
        </a>

      
        <div class="text-slate-500 text-xs uppercase tracking-wider px-3 py-2 font-semibold mt-3">Proyek Saya</div>

        <a href="#upload-section" class="nav-link" onclick="closeSidebarMobile()">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
            </svg>
            Upload Desain
        </a>

        <a href="#progress-section" class="nav-link" onclick="closeSidebarMobile()">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
            </svg>
            Progres Pembangunan
        </a>

        <a href="#review-section" class="nav-link" onclick="closeSidebarMobile()">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
            </svg>
            Review
        </a>
    </nav>

    <!-- Logout -->
    <div class="p-4 border-t border-slate-700">
        <form method="POST" action="/logout">
            @csrf
            <button class="w-full flex items-center justify-center gap-2 bg-slate-700 hover:bg-red-600 text-slate-300 hover:text-white px-4 py-2.5 rounded-xl text-sm font-medium transition-all duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Logout
            </button>
        </form>
    </div>
</aside>

<!-- ============ MAIN WRAPPER ============ -->
<div class="md:ml-64 flex flex-col min-h-screen">

    <!-- ============ TOPBAR ============ -->
    <header class="sticky top-0 z-30 bg-white border-b border-slate-200 px-4 md:px-6 py-3 flex items-center justify-between">
        <!-- Mobile hamburger -->
        <button onclick="toggleSidebar()" class="md:hidden p-2 rounded-lg hover:bg-slate-100 transition">
            <svg class="w-5 h-5 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>

        <div class="hidden md:block">
            <h1 class="text-slate-800 font-semibold text-lg">Dashboard</h1>
            <p class="text-slate-400 text-xs">Indo Berkah Konstruksi</p>
        </div>

        <!-- Mobile title -->
        <span class="md:hidden text-slate-800 font-semibold text-sm">Dashboard</span>

        <!-- Right actions -->
        <div class="flex items-center gap-3">
            <div class="hidden sm:flex items-center gap-2 bg-amber-50 text-amber-700 px-3 py-1.5 rounded-full text-xs font-semibold border border-amber-200">
                <span class="w-2 h-2 rounded-full bg-amber-400 animate-pulse"></span>
                Proyek Aktif
            </div>
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-amber-400 to-amber-600 flex items-center justify-center text-slate-800 font-bold text-xs">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
        </div>
    </header>

    <!-- ============ CONTENT ============ -->
    <main class="flex-1 p-4 md:p-6 space-y-6 max-w-5xl w-full mx-auto">

        <!-- === WELCOME CARD === -->
        <div class="bg-gradient-to-r from-slate-800 to-slate-700 rounded-2xl p-6 text-white relative overflow-hidden">
            <div class="absolute top-0 right-0 w-48 h-48 bg-amber-400/10 rounded-full -translate-y-1/2 translate-x-1/4"></div>
            <div class="absolute bottom-0 right-16 w-24 h-24 bg-amber-400/10 rounded-full translate-y-1/2"></div>
            <div class="relative">
                <p class="text-amber-400 text-sm font-semibold mb-1">Selamat datang kembali 👋</p>
                <h2 class="text-2xl font-bold mb-1">{{ auth()->user()->name }}</h2>
                <p class="text-slate-400 text-sm">Pantau progres dan kelola proyek pembangunan Anda di sini.</p>
            </div>
        </div>

        <!-- === STATS GRID === -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            @php
                $totalFiles = auth()->user()->files()->count();
                $progressPhotos = 0; // from admin uploaded photos
                $reviews = \App\Models\review::where('user_id', auth()->id())->count();
            @endphp

            <div class="bg-white rounded-2xl p-4 card-hover shadow-sm">
                <div class="w-9 h-9 bg-blue-100 rounded-xl flex items-center justify-center mb-3">
                    <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="text-2xl font-bold text-slate-800">{{ $totalFiles }}</div>
                <div class="text-slate-500 text-xs mt-0.5">Desain Diunggah</div>
            </div>

            <div class="bg-white rounded-2xl p-4 card-hover shadow-sm">
                <div class="w-9 h-9 bg-amber-100 rounded-xl flex items-center justify-center mb-3">
                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
                <div class="text-2xl font-bold text-slate-800">{{ $progressPhotos }}</div>
                <div class="text-slate-500 text-xs mt-0.5">Foto Progres</div>
            </div>

            <div class="bg-white rounded-2xl p-4 card-hover shadow-sm">
                <div class="w-9 h-9 bg-green-100 rounded-xl flex items-center justify-center mb-3">
                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-2xl font-bold text-slate-800">{{ $reviews }}</div>
                <div class="text-slate-500 text-xs mt-0.5">Review Dikirim</div>
            </div>

            <div class="bg-white rounded-2xl p-4 card-hover shadow-sm">
                <div class="w-9 h-9 bg-purple-100 rounded-xl flex items-center justify-center mb-3">
                    <svg class="w-4 h-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                    </svg>
                </div>
                <div class="text-2xl font-bold text-slate-800">
                    {{ auth()->user()->created_at->diffForHumans(null, true) }}
                </div>
                <div class="text-slate-500 text-xs mt-0.5">Bergabung</div>
            </div>
        </div>

        <!-- === UPLOAD DESAIN === -->
        <div id="upload-section" class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                        <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="font-semibold text-slate-800">Upload Desain Rumah</h3>
                        <p class="text-xs text-slate-400">JPG, PNG, PDF maksimal 10MB</p>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <form action="{{ route('user-files.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <!-- Dropzone -->
                    <label class="dropzone block p-8 text-center" for="file-input">
                        <input type="file" id="file-input" name="file" accept="image/*,.pdf" class="hidden" onchange="updateFileName(this)">
                        <div id="upload-icon">
                            <svg class="w-10 h-10 mx-auto text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                            </svg>
                            <p class="text-slate-500 font-medium text-sm">Klik atau seret file ke sini</p>
                            <p class="text-slate-400 text-xs mt-1">JPG, PNG, atau PDF</p>
                        </div>
                        <div id="file-name" class="hidden text-amber-600 font-medium text-sm"></div>
                    </label>

                    <!-- Judul -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Judul Desain</label>
                        <input
                            type="text"
                            name="title"
                            placeholder="Contoh: Denah Lantai 1, Tampak Depan..."
                            class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-none transition bg-slate-50"
                            required>
                    </div>

                    <!-- Keterangan -->
                    <div>
                        <label class="block text-sm font-medium text-slate-700 mb-2">Keterangan</label>
                        <textarea
                            name="description"
                            rows="3"
                            placeholder="Jelaskan detail desain, catatan khusus, atau permintaan kepada tim kami..."
                            class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-none transition bg-slate-50 resize-none"></textarea>
                    </div>

                    <button type="submit"
                        class="w-full bg-slate-800 hover:bg-slate-700 text-white py-3 rounded-xl font-semibold text-sm transition-all duration-200 flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        Upload Desain
                    </button>
                </form>

                @if(session('upload_success'))
                    <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-green-700 text-sm font-medium">{{ session('upload_success') }}</p>
                    </div>
                @endif

                <!-- Desain yang sudah diupload -->
                @if(auth()->user()->files->count() > 0)
                    <div class="mt-6">
                        <h4 class="text-sm font-semibold text-slate-700 mb-3">Desain Terunggah</h4>
                        <div class="space-y-2">
                            @foreach(auth()->user()->files as $file)
                                <div class="flex items-center gap-3 p-3 bg-slate-50 rounded-xl">
                                    <div class="w-8 h-8 bg-slate-200 rounded-lg flex items-center justify-center flex-shrink-0">
                                        @if(in_array(pathinfo($file->file_path, PATHINFO_EXTENSION), ['jpg','jpeg','png','webp']))
                                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14"/>
                                            </svg>
                                        @else
                                            <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                            </svg>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-slate-700 truncate">{{ $file->title }}</p>
                                        <p class="text-xs text-slate-400">{{ $file->created_at->format('d M Y') }}</p>
                                    </div>
                                    <a href="{{ Storage::url($file->file_path) }}" target="_blank"
                                       class="text-xs text-amber-600 hover:text-amber-700 font-medium flex-shrink-0">
                                        Lihat →
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- === PROGRES PEMBANGUNAN === -->
        <div id="progress-section" class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center gap-3">
                <div class="w-8 h-8 bg-amber-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-amber-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800">Progres Pembangunan</h3>
                    <p class="text-xs text-slate-400">Diperbarui oleh tim kami</p>
                </div>
            </div>

            <div class="p-6">
                @php
                    // Ambil progress photos dari admin untuk user ini
                    // Asumsikan ada model ProjectProgress atau relasi di UserFile dengan tipe 'progress'
                    $progressPhotos = \App\Models\UserFile::where('user_id', auth()->id())
                        ->where('type', 'progress')
                        ->latest()
                        ->get();

                    // Tahapan proyek (bisa disesuaikan dari DB)
                    $stages = [
                        ['name' => 'Perencanaan & Desain', 'status' => 'done'],
                        ['name' => 'Persiapan Lahan',      'status' => 'done'],
                        ['name' => 'Fondasi',               'status' => 'active'],
                        ['name' => 'Struktur',              'status' => 'pending'],
                        ['name' => 'Finishing',             'status' => 'pending'],
                    ];
                    $doneCount  = collect($stages)->where('status','done')->count();
                    $pct        = round(($doneCount / count($stages)) * 100);
                @endphp

                <!-- Progress Bar -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <span class="text-sm font-medium text-slate-700">Total Progres</span>
                        <span class="text-sm font-bold text-amber-600">{{ $pct }}%</span>
                    </div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $pct }}%"></div>
                    </div>
                </div>

                <!-- Stages -->
                <div class="space-y-3 mb-6">
                    @foreach($stages as $i => $stage)
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full flex items-center justify-center flex-shrink-0 text-xs font-bold
                                {{ $stage['status'] === 'done'    ? 'bg-green-100 text-green-600' : '' }}
                                {{ $stage['status'] === 'active'  ? 'bg-amber-100 text-amber-600' : '' }}
                                {{ $stage['status'] === 'pending' ? 'bg-slate-100 text-slate-400' : '' }}">
                                @if($stage['status'] === 'done')
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                    </svg>
                                @elseif($stage['status'] === 'active')
                                    <span class="w-2.5 h-2.5 rounded-full bg-amber-500 animate-pulse block"></span>
                                @else
                                    {{ $i + 1 }}
                                @endif
                            </div>
                            <span class="text-sm
                                {{ $stage['status'] === 'done'    ? 'text-slate-500 line-through' : '' }}
                                {{ $stage['status'] === 'active'  ? 'text-slate-800 font-semibold' : '' }}
                                {{ $stage['status'] === 'pending' ? 'text-slate-400' : '' }}">
                                {{ $stage['name'] }}
                            </span>
                            @if($stage['status'] === 'active')
                                <span class="badge badge-amber ml-auto">Sedang Berjalan</span>
                            @elseif($stage['status'] === 'done')
                                <span class="badge badge-green ml-auto">Selesai</span>
                            @endif
                        </div>
                    @endforeach
                </div>

                <!-- Foto Progres dari Admin -->
                @if($progressPhotos->count() > 0)
                    <div>
                        <h4 class="text-sm font-semibold text-slate-700 mb-3">Foto Terbaru dari Tim</h4>
                        <div class="photo-grid">
                            @foreach($progressPhotos as $photo)
                                <div class="relative group">
                                    <img
                                        src="{{ Storage::url($photo->file_path) }}"
                                        alt="{{ $photo->title }}"
                                        onclick="openLightbox(this.src)"
                                        class="rounded-xl">
                                    <div class="absolute inset-0 bg-black/0 group-hover:bg-black/30 rounded-xl transition-all flex items-center justify-center">
                                        <svg class="w-6 h-6 text-white opacity-0 group-hover:opacity-100 transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                        </svg>
                                    </div>
                                    <p class="text-xs text-slate-500 mt-1 truncate">{{ $photo->title }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="text-center py-8 bg-slate-50 rounded-xl">
                        <svg class="w-10 h-10 text-slate-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"/>
                        </svg>
                        <p class="text-slate-400 text-sm font-medium">Belum ada foto progres</p>
                        <p class="text-slate-400 text-xs mt-1">Tim kami akan mengunggah foto perkembangan di sini</p>
                    </div>
                @endif
            </div>
        </div>

        <!-- === REVIEW === -->
        <div id="review-section" class="bg-white rounded-2xl shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center gap-3">
                <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                    </svg>
                </div>
                <div>
                    <h3 class="font-semibold text-slate-800">Berikan Review</h3>
                    <p class="text-xs text-slate-400">Ceritakan pengalaman Anda</p>
                </div>
            </div>

            <div class="p-6">
                <form action="{{ route('reviews.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <textarea
                        name="message"
                        rows="4"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-amber-400 focus:border-transparent outline-none transition bg-slate-50 resize-none"
                        placeholder="Bagikan pengalaman Anda menggunakan jasa kami..."
                        required></textarea>

                    <button type="submit"
                        class="bg-slate-800 hover:bg-slate-700 text-white px-6 py-2.5 rounded-xl font-semibold text-sm transition flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        Kirim Review
                    </button>
                </form>

                @if(session('success'))
                    <div class="mt-4 p-4 bg-green-50 border border-green-200 rounded-xl flex items-center gap-3">
                        <svg class="w-5 h-5 text-green-500 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <p class="text-green-700 text-sm font-medium">{{ session('success') }}</p>
                    </div>
                @endif
            </div>
        </div>

        <div class="pb-20"></div><!-- Space for float button -->

    </main>
</div>

<!-- ============ LIGHTBOX ============ -->
<div id="lightbox" onclick="closeLightbox()">
    <img id="lightbox-img" src="" alt="Preview">
    <button onclick="closeLightbox()" class="absolute top-4 right-4 w-10 h-10 bg-white/20 rounded-full flex items-center justify-center text-white hover:bg-white/30 transition">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
        </svg>
    </button>
</div>

<!-- ============ FLOAT BUTTON (Penawaran) ============ -->
<a href="/#penawaran" class="float-btn" title="Form Penawaran">
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
    </svg>
    <span class="hidden sm:inline">Form Penawaran</span>
</a>

<script>
    // Sidebar toggle
    function toggleSidebar() {
        document.getElementById('sidebar').classList.toggle('open');
        document.getElementById('sidebar-overlay').classList.toggle('open');
    }
    function closeSidebarMobile() {
        if (window.innerWidth < 768) {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('sidebar-overlay').classList.remove('open');
        }
    }

    // File name preview
    function updateFileName(input) {
        const nameEl = document.getElementById('file-name');
        const iconEl = document.getElementById('upload-icon');
        if (input.files.length) {
            nameEl.textContent = '✓ ' + input.files[0].name;
            nameEl.classList.remove('hidden');
            iconEl.classList.add('hidden');
        } else {
            nameEl.classList.add('hidden');
            iconEl.classList.remove('hidden');
        }
    }

    // Lightbox
    function openLightbox(src) {
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox').classList.add('open');
        document.body.style.overflow = 'hidden';
    }
    function closeLightbox() {
        document.getElementById('lightbox').classList.remove('open');
        document.body.style.overflow = '';
    }
    document.addEventListener('keydown', e => {
        if (e.key === 'Escape') closeLightbox();
    });
</script>

</body>
</html>