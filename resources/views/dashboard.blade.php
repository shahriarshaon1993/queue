<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @if (session('success'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="mt-4">
                        <a href="{{ route('generate.invoice') }}"
                            class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                            Generate Invoice
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
