<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Biodata Mahasiswa</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
        @endif
    </head>
    <body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC] flex items-center justify-center min-h-screen p-6">
        
        <main class="w-full max-w-md">
            <div class="bg-white dark:bg-[#161615] p-8 lg:p-12 shadow-[inset_0px_0px_0px_1px_rgba(26,26,0,0.16)] dark:shadow-[inset_0px_0px_0px_1px_#fffaed2d] rounded-2xl transition-all">
                
                <div class="mb-8 text-center">
                    <h1 class="text-xl font-bold uppercase tracking-widest text-[#f53003] dark:text-[#FF4433]">
                        Identitas Mahasiswa
                    </h1>
                    <div class="h-1 w-20 bg-[#f53003] dark:bg-[#FF4433] mx-auto mt-2 rounded-full"></div>
                </div>
                
                
                <div class="space-y-4 text-base font-medium">
                    <div class="flex flex-col border-b border-[#e3e3e0] dark:border-[#3E3E3A] pb-2">
                        <span class="text-xs uppercase text-[#706f6c] dark:text-[#A1A09A] tracking-wider">Nama Lengkap</span>
                        <p class="mt-1">Choirul Amir Siregar</p>
                    </div>

                    <div class="flex flex-col border-b border-[#e3e3e0] dark:border-[#3E3E3A] pb-2">
                        <span class="text-xs uppercase text-[#706f6c] dark:text-[#A1A09A] tracking-wider">Nomor Induk Mahasiswa</span>
                        <p class="mt-1">20230140249</p>
                    </div>

                    <div class="flex flex-col border-b border-[#e3e3e0] dark:border-[#3E3E3A] pb-2">
                        <span class="text-xs uppercase text-[#706f6c] dark:text-[#A1A09A] tracking-wider">Kelas</span>
                        <p class="mt-1">PWF C</p>
                    </div>
                </div>

                <div class="mt-10">
                    <a href="#" class="block text-center px-6 py-3 bg-[#1b1b18] dark:bg-[#eeeeec] text-white dark:text-[#1C1C1A] rounded-xl font-semibold hover:opacity-90 transition-opacity">
                        Modul Pertemuan 1
                    </a>
                </div>

            </div>
        </main>

    </body>
</html>