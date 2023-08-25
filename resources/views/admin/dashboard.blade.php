<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
        <ul class="mt-4 list-none">
            <li class="mb-2"><a href="{{ route('admin.verifyfiles') }}" class="text-blue-600 hover:underline">Verify Files</a></li>
            <li><a href="{{ route('admin.admin.verified.files') }}" class="text-blue-600 hover:underline">View Verified Files</a></li>
        </ul>
    </x-slot>

    <x-slot name="content">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    
                </div>
            </div>
        </div>
    </x-slot>
</x-admin-layout>
