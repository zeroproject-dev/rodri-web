<x-main-layout>
    <x-slot name="header">
        <h1 class="text-white text-3xl font-semibold">Pacientes</h1>
    </x-slot>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <div class="pb-2">
            <a href="{{ route('pacientes.create') }}" class="inline-block px-4 py-2 mt-4 mr-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                Nuevo paciente
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
                        Correo
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
                @forelse ($pacientes as $item)
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $item->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->nombre }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $item->correo }}
                        </td>
                        <td class="px-6 py-4"> 
                            @if ($item->estado)
                                Activo
                            @else
                                Inactivo
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Editar</a>
                            <br />
                            @if ($item->estado)
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Deshabilitar</a>
                            @else
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Activar</a>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td class="px-6 py-4" colspan="4">
                            No hay pacientes registrados.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        {{ $pacientes->links() }}
    </div>
</x-main-layout>
