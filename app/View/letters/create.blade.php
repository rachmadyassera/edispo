<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Catat Surat Masuk Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('surat.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label for="reference_number" :value="__('Nomor Surat')" />
                            <x-text-input id="reference_number" name="reference_number" type="text" class="mt-1 block w-full" required />
                        </div>
                        <div>
                            <x-input-label for="sender" :value="__('Asal Surat (Instansi/Pengirim)')" />
                            <x-text-input id="sender" name="sender" type="text" class="mt-1 block w-full" required />
                        </div>
                        <div>
                            <x-input-label for="letter_date" :value="__('Tanggal Surat')" />
                            <x-text-input id="letter_date" name="letter_date" type="date" class="mt-1 block w-full" required />
                        </div>
                        <div>
                            <x-input-label for="received_date" :value="__('Tanggal Diterima')" />
                            <x-text-input id="received_date" name="received_date" type="date" class="mt-1 block w-full" required />
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-input-label for="subject" :value="__('Perihal Surat')" />
                        <textarea id="subject" name="subject" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3" required></textarea>
                    </div>
                    <div class="mt-6">
                        <x-primary-button>{{ __('Simpan Surat') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
