<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-gary-500 text-white font-bold rounded-md px-4 py-2 shadow">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 flex gap-4 text-gray-900">
                    <a href="{{ route('send.sms') }}"
                        class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Send SMS') }}
                    </a>

                    <a href="{{ route('send.otp', 1) }}"
                        class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Send OTP') }}
                    </a>

                    <a href="{{ route('database.backup') }}"
                        class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Backup') }}
                    </a>

                    <a href="{{ route('calculate.marks') }}"
                        class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Calculate Marks') }}
                    </a>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-6">
                <div class="p-6 flex gap-4 text-gray-900">
                    <a href="{{ route('upload.video') }}"
                        class="bg-gray-800 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                        {{ __('Upload Video') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
