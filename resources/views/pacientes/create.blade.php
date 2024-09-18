<x-main-layout>
    <x-slot name="header">
        <h1 class="text-white text-3xl font-semibold">Crear Paciente</h1>
    </x-slot>

    <section>
        <div class="py-4">
            <a href="{{ route('pacientes.index') }}" class="inline-block px-4 py-2 mt-4 mr-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                Regresar
            </a>
        </div>

        @include('pacientes.partials.form')
    </section>
</x-main-layout>
