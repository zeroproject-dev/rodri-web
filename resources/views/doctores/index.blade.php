<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Doctores') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="pb-2">
                        <a href="{{ route('doctores.create') }}"
                            class="inline-block px-4 py-2 mt-4 mr-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                            Nuevo doctor
                        </a>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nombre
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Especialidad
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha de nacimiento
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Correo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Teléfono
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Estado
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctores as $item)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->primer_nombre . ' ' . $item->segundo_nombre . ' ' . $item->paterno . ' ' . $item->materno }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->especialidad }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->fecha_nacimiento->format('d/m/Y') }} -
                                        {{ $item->fecha_nacimiento->age }} Años
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->email }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->numero }}
                                    </td>
                                    <td class="px-6 py-4">
                                        @if ($item->estado)
                                            Habilitado
                                        @else
                                            Deshabilitado
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-6 py-4" colspan="4">
                                        No hay doctores registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $doctores->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
