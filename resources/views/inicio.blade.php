<x-guest-layout>
    @section('title')
        Prueba - Global Next Level
    @endsection

    <div class="py-3">
        <div class="max-w-8xl mx-2 sm:px-6 lg:px-8">
            <!-- Propuesta landing page -->
            <x-inicio.anuncios />

            <!-- Registro de clientes -->
            <div class="mt-6 max-w-5xl mx-auto sm:px-6 lg:px-8" id="form-clientes">
                <x-card>
                    <x-inicio.registro-clientes />
                </x-card>
            </div>

            <!-- Lista de ganadores -->
            <div class="mt-6 max-w-5xl mx-auto sm:px-6 lg:px-8" id="list-ganadores">
                <x-card>
                    <x-panel.tabla-ganadores />
                </x-card>
            </div>

        </div>
    </div>
</x-guest-layout>
