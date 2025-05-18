<div>
    <div class="flex">
        <div class="size-1/2 p-2">
            <img src="{{ asset('media/images/imagen1.jpg') }}" alt="Logo" class="mx-auto rounded mb-4" />
        </div>
        <div class="size-1/2 px-2 py-4">
            <x-card class="mt-8">
                <h1 class="text-xl mb-4 font-bold text-center text-gray-900 dark:text-white">Bienvenido a Global Next Level</h1>
                <hr>
                @if ($premio)
                    <p class="mt-4 text-center text-gray-600 dark:text-gray-400">Tenemos el gusto de informarte las novedades de hoy, <strong class="text-xl font-bold">!Estamos de sorteo!</strong>.</p>
                    <p class="mt-4 text-center text-gray-600 dark:text-gray-400">Sí, como lo has leído, hoy estamos sorteando un increible premio, el cual es: <strong>{{ $premio->nombre }}</strong>.</p>
                @else
                    <p class="mt-4 text-center text-gray-600 dark:text-gray-400">En este momento no tenemos sorteos activos. Pero proximamente estaremos sorteando premios.</p>
                @endif
                <p class="mt-4 text-center text-gray-600 dark:text-gray-400">Para participar, por favor regístrate <x-nav-link href="#form-clientes">presionando aquí</x-nav-link>.</p>
                <p class="mt-4 text-center text-gray-600 dark:text-gray-400">Si ya estás registrado no olvides revisar el listado de ganadores y si tienes alguna duda, nuestros agentes te atenderán de inmediato.</p>
                <div class="flex justify-center">
                    <x-button-link class="mt-4 mr-2 text-center" href="#form-clientes">Regístrate aquí</x-button-link>
                    <x-button-link class="mt-4 text-center" href="#list-ganadores">Lista de ganadores</x-button-link>
                </div>
            </x-card>
        </div>
    </div>
</div>