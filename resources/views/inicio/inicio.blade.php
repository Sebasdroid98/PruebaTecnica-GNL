<x-guest-layout>
    @section('title')
        Prueba - Global Next Level
    @endsection

    <div class="py-3">
        <div class="max-w-8xl mx-2 sm:px-6 lg:px-8">
            <!-- Propuesta landing page -->
            @include('inicio.partes.propuesta')

            <!-- Registro de clientes -->
            <div class="mt-6 max-w-5xl mx-auto sm:px-6 lg:px-8" id="form-clientes">
                <x-card>
                    @include('inicio.partes.registro-clientes')
                </x-card>
            </div>

            <!-- Lista de ganadores -->
            <div class="mt-6 max-w-5xl mx-auto sm:px-6 lg:px-8" id="list-ganadores">
                <x-card>
                    @include('inicio.partes.lista-ganadores')
                </x-card>
            </div>

        </div>
    </div>
</x-guest-layout>
