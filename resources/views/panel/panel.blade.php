<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Panel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-2 sm:px-6 lg:px-8">
            <!-- Premios y Ganadores -->
            <div class="flex">
                <div class="size-1/2 p-2">
                    <x-card>
                        @include('panel.partes.premios')
                    </x-card>
                </div>

                <div class="size-1/2 p-2">
                    <x-card>
                        @include('panel.partes.ganadores')
                    </x-card>
                </div>
            </div>

            <!-- Clientes -->
            <x-card class="mt-3">
                @include('panel.partes.clientes')
            </x-card>
        </div>
    </div>
</x-app-layout>
