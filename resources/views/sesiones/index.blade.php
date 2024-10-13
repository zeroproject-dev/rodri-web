<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sesiones') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <script>
            function openModal(registro) {
                document.getElementById('modal-title').innerText = registro.tipo;

                const duration = registro.duracion_segundos;
                const hours = Math.floor(duration / 3600);
                const minutes = Math.floor((duration % 3600) / 60);
                const seconds = duration % 60;
                const time = hours + ':' + minutes + ':' + seconds;

                let body = '';
                body += '<b>Paciente:</b> ' + registro.paciente.primer_nombre + ' ' + registro.paciente.segundo_nombre + ' ' +
                    registro
                    .paciente.paterno + ' ' + registro.paciente.materno + '<br />';
                body += '<b>Fecha:</b> ' + registro.fecha + '<br />';
                body += '<b>Tiempo:</b> ' + time + '<br />';
                body += '<b>Notas:</b> ' + registro.notas ?? '' + '<br />';
                body += '<b>Sintomas:</b> <br />' + (registro.sintomas ?? '').replace(/\n/g, '<br />') ?? '' + '<br />';

                document.getElementById('modal-body').innerHTML = body;
                document.getElementById('modal').classList.remove('hidden');
            }

            function closeModal() {
                document.getElementById('modal').classList.add('hidden');
            }
        </script>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="pb-2">
                        <a href="{{ route('sesiones.create') }}"
                            class="inline-block px-4 py-2 mt-4 mr-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-green-600 border border-transparent rounded-lg active:bg-green-600 hover:bg-green-700 focus:outline-none focus:shadow-outline-green">
                            Nueva sesion
                        </a>
                    </div>
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    ID
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Paciente
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Fecha
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Tipo
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Acciones
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($sesiones as $item)
                                <tr
                                    class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $item->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $item->paciente->primer_nombre . ' ' . $item->paciente->segundo_nombre . ' ' . $item->paciente->paterno . ' ' . $item->paciente->materno }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->fecha->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $item->tipo }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button onclick="openModal({{ $item }})"
                                            class="bg-green-500 text-white px-4 py-2 rounded">Ver</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="px-6 py-4" colspan="4">
                                        No hay sesiones registradas.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $sesiones->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<div id="modal" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
    <div class="bg-white rounded-lg p-6 w-1/3">
        <h2 class="text-xl font-bold" id="modal-title"></h2>
        <p id="modal-body" class="mt-4"></p>
        <button onclick="closeModal()" class="mt-4 bg-red-500 text-white px-4 py-2 rounded">Cerrar</button>
    </div>
</div>
