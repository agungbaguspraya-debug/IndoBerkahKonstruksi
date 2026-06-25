<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Portofolio</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    @include('layout.header')

<section class="bg-gray-100 pt-24 md:pt-28 pb-16 px-4">
    <div class="max-w-7xl mx-auto">

        <!-- Filter — scrollable horizontal di mobile -->
        <div class="overflow-x-auto pb-2 mb-8 md:mb-10 -mx-4 px-4">
            <ul class="inline-flex overflow-hidden border border-gray-300 rounded-full bg-white whitespace-nowrap text-sm">
                <li>
                    <button class="px-4 md:px-5 py-2.5 md:py-3 text-amber-500 hover:bg-amber-50 transition duration-300">
                        Semua
                    </button>
                </li>
                <li>
                    <button class="px-4 md:px-5 py-2.5 md:py-3 hover:text-amber-400">
                        Pembangunan Rumah
                    </button>
                </li>
                <li>
                    <button class="px-4 md:px-5 py-2.5 md:py-3 hover:text-amber-400">
                        Gedung Komersial
                    </button>
                </li>
                <li>
                    <button class="px-4 md:px-5 py-2.5 md:py-3 hover:text-amber-400">
                        Konsultasi Konstruksi
                    </button>
                </li>
                <li>
                    <button class="px-4 md:px-5 py-2.5 md:py-3 hover:text-amber-400">
                        Renovasi Bangunan
                    </button>
                </li>
            </ul>
        </div>

        <!-- Grid: 1 kolom mobile, 2 tablet, 4 desktop -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 md:gap-8">

            @php
                $items = [
                    ['img' => 'porto1.jpg',  'title' => 'Melakukan Desain Interior Di Sesetan', 'cat' => 'Hunian, Interior'],
                    ['img' => 'porto2.jpg',  'title' => 'Pembangunan Kos-kosan di Gatsu',        'cat' => 'Hunian'],
                    ['img' => 'porto3.jpg',  'title' => 'Pembangunan Kos-kosan di Sanur',         'cat' => 'Hunian'],
                    ['img' => 'porto4.jpg',  'title' => 'Pembangunan Rumah di Sesetan',           'cat' => 'Hunian'],
                    ['img' => 'porto5.jpg',  'title' => 'Rumah Minimalis #5',                     'cat' => 'Hunian'],
                    ['img' => 'porto6.jpg',  'title' => 'Rumah Minimalis #6',                     'cat' => 'Hunian'],
                    ['img' => 'porto7.jpg',  'title' => 'Rumah Minimalis #7',                     'cat' => 'Hunian'],
                    ['img' => 'porto8.jpg',  'title' => 'Rumah Minimalis #8',                     'cat' => 'Hunian'],
                    ['img' => 'porto9.jpg',  'title' => 'Rumah Minimalis #9',                     'cat' => 'Hunian'],
                    ['img' => 'porto10.jpg', 'title' => 'Rumah Minimalis #10',                    'cat' => 'Hunian'],
                    ['img' => 'porto11.jpg', 'title' => 'Rumah Minimalis #11',                    'cat' => 'Hunian'],
                    ['img' => 'porto12.jpg', 'title' => 'Rumah Minimalis #12',                    'cat' => 'Hunian'],
                    ['img' => 'porto13.png', 'title' => 'Rumah Minimalis #13',                    'cat' => 'Hunian'],
                    ['img' => 'porto14.jpg', 'title' => 'Rumah Minimalis #14',                    'cat' => 'Hunian'],
                    ['img' => 'porto15.jpg', 'title' => 'Rumah Minimalis #15',                    'cat' => 'Hunian'],
                    ['img' => 'porto16.jpg', 'title' => 'Rumah Minimalis #16',                    'cat' => 'Hunian'],
                    ['img' => 'porto17.jpg', 'title' => 'Rumah Minimalis #17',                    'cat' => 'Hunian'],
                    ['img' => 'porto18.jpg', 'title' => 'Rumah Minimalis #18',                    'cat' => 'Hunian'],
                    ['img' => 'porto19.jpg', 'title' => 'Rumah Minimalis #19',                    'cat' => 'Hunian'],
                    ['img' => 'porto20.jpg', 'title' => 'Rumah Minimalis #20',                    'cat' => 'Hunian'],
                ];
            @endphp

            @foreach($items as $item)
            <div class="group">
                <div class="overflow-hidden rounded-lg shadow">
                    <img
                        src="image/Portofolio/{{ $item['img'] }}"
                        alt="{{ $item['title'] }}"
                        class="w-full aspect-[4/3] object-cover group-hover:scale-105 duration-500"
                    >
                </div>
                <h3 class="mt-3 md:mt-4 text-base md:text-xl font-bold">
                    {{ $item['title'] }}
                </h3>
                <p class="mt-1 md:mt-2 text-gray-500 text-sm">
                    {{ $item['cat'] }}
                </p>
            </div>
            @endforeach

        </div>

    </div>
</section>

@include('layout.footer') 
</body>
</html>