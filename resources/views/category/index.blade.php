<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menu Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Selamat Datang, Admin!</h3>
                    <p>Ini adalah halaman Kategori. Layarnya sudah nggak putih lagi kan? 😎</p>

                    <p class="mt-4 text-sm text-gray-500">
                        Nantinya, tabel daftar kategori dan tombol "Tambah Kategori" akan diletakkan di sini.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>