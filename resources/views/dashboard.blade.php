<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pusat Kendali E-Disposisi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold mb-4">Selamat Datang, {{ Auth::user()->name }}!</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- KHUSUS OPERATOR --}}
                        @hasrole('operator')
                            <div class="border-l-4 border-blue-500 bg-blue-50 p-4 rounded shadow-sm">
                                <h4 class="font-bold text-blue-700">Menu Operator (Sekretariat)</h4>
                                <p class="text-sm text-gray-600 mt-1">Anda memiliki otoritas untuk mencatat surat masuk dan memulai alur disposisi.</p>

                                {{-- TOMBOL INI YANG HILANG DI KODE ANDA --}}
                                <div class="mt-4">
                                    <a href="{{ route('surat.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                        + Catat Surat Masuk
                                    </a>
                                </div>
                            </div>
                        @endhasrole

                        {{-- KHUSUS PIMPINAN --}}
                        @role('pimpinan')
                        <div class="border-l-4 border-green-500 bg-green-50 p-4 rounded shadow-sm">
                            <h4 class="font-bold text-green-700">Menu Pimpinan (Walikota/Sekda)</h4>
                            <p class="text-sm text-gray-600 mt-1">Silakan periksa daftar surat masuk untuk memberikan instruksi disposisi.</p>
                            <div class="mt-4">
                                <a href="#" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 transition ease-in-out duration-150">
                                    Lihat Kotak Masuk Disposisi
                                </a>
                            </div>
                        </div>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
