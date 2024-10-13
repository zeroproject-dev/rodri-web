<form id="form_part_1" action="{{ route('sesiones.store') }}" method="POST">
    @csrf
    <div class="grid gap-6 mb-6 md:grid-cols-2">
        <div>
            <label for="pacientes" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                Selecciona el paciente
            </label>
            <select id="pacientes" name="paciente_id"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                <option selected>Selecciona un paciente</option>
                @foreach ($pacientes as $item)
                    <option value="{{ $item->id }}">
                        {{ $item->primer_nombre . ' ' . $item->segundo_nombre . ' ' . $item->paterno . ' ' . $item->materno }}
                    </option>
                @endforeach
            </select>
            @error('paciente_id')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="tipo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tipo</label>
            <input type="text" id="tipo" name="tipo"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                placeholder="Nombre" value="{{ old('tipo') }}" />
            @error('tipo')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="fecha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fecha</label>
            <input id="fecha" name="fecha" type="date"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
            @error('fecha')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
    </div>

    <button type="submit"
        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Iniciar la Sesión
    </button>
</form>


<form id="form_part_2" action="" method="POST" style="display:none;">
    @csrf
    @method('PUT')

    <div class="mb-6">
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notas</label>
        <textarea id="message" rows="4" name="notas"
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
            placeholder="Escribe tus notas aqui..."></textarea>
        @error('notas')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="sintomas-options" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
            Selecciona síntomas
        </label>
        <select id="sintomas-options"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
            <option selected>Selecciona síntomas para agregarlos</option>
            <option value="- Flashbacks donde el paciente siente como si estuviera reviviendo el evento traumático.">-
                Flashbacks donde el paciente siente como si estuviera reviviendo el evento traumático.</option>
            <option value="- Pensamientos intrusivos sobre el trauma.">- Pensamientos intrusivos sobre el trauma.
            </option>
            <option
                value="- Pesadillas relacionadas con el evento traumático, tanto durante como después de la sesión de realidad virtual.">
                - Pesadillas relacionadas con el evento traumático, tanto durante como después de la sesión de realidad
                virtual.</option>
            <option
                value="- Aumento del miedo, ansiedad o nerviosismo cuando se expone a escenarios relacionados con el trauma.">
                - Aumento del miedo, ansiedad o nerviosismo cuando se expone a escenarios relacionados con el trauma.
            </option>
            <option value="- Sensación de impotencia o desesperanza.">- Sensación de impotencia o desesperanza.</option>
            <option value="- Alteración del estado de ánimo, con tendencia a la tristeza o irritabilidad.">- Alteración
                del estado de ánimo, con tendencia a la tristeza o irritabilidad.</option>
            <option value="- Sentimientos de irrealidad o desconexión con el entorno.">- Sentimientos de irrealidad o
                desconexión con el entorno</option>
            <option value="- Sensación de estar emocionalmente adormecido o desconectado.">- Sensación de estar
                emocionalmente adormecido o desconectado.</option>
            <option
                value="- Aumento en la frecuencia cardíaca o palpitaciones durante la exposición a la realidad virtual.">
                - Aumento en la frecuencia cardíaca o palpitaciones durante la exposición a la realidad virtual.
            </option>
            <option value="- Sudoración excesiva o sensación de calor corporal.">- Sudoración excesiva o sensación de
                calor corporal.</option>
            <option value="- Hipervigilancia, o sensación de estar siempre en alerta frente a amenazas.">-
                Hipervigilancia, o sensación de estar siempre en alerta frente a amenazas.</option>
            <option value="- Mareos o náuseas, especialmente en entornos de realidad virtual más inmersivos.">- Mareos o
                náuseas, especialmente en entornos de realidad virtual más inmersivos.</option>
            <option value="- Temblores o espasmos musculares involuntarios.">- Temblores o espasmos musculares
                involuntarios.</option>
            <option value="- Sensación de fatiga o agotamiento emocional después de las sesiones de realidad virtual.">-
                Sensación de fatiga o agotamiento emocional después de las sesiones de realidad virtual.</option>
            <option
                value="- Dificultad para concentrarse o pensar con claridad después de la exposición a los estímulos traumáticos.">
                - Dificultad para concentrarse o pensar con claridad después de la exposición a los estímulos
                traumáticos.</option>
        </select>
        @error('paciente_id')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-6">
        <label for="sintomas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Notas</label>
        <textarea id="sintomas" rows="4" name="sintomas" readonly
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
            placeholder=""></textarea>
        @error('sintomas')
            <span class="text-red-500 text-sm">{{ $message }}</span>
        @enderror
    </div>


    <div>
        <label for="contador" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duración de la
            Sesión</label>
        <p id="contador" class="text-lg font-bold">00:00:00</p>
    </div>

    <button type="submit"
        class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">
        Finalizar Sesión
    </button>
</form>

<x-slot name="scripts">
    <script>
        const formPart1 = document.getElementById('form_part_1');
        formPart1.addEventListener('submit', function(event) {
            event.preventDefault();

            let formData = new FormData(this);

            if (formData.get('paciente_id') == 'Selecciona un paciente' || !formData.get('tipo') || !formData.get(
                    'fecha')) {
                alert('Todos los campos son requeridos');
                return;
            }

            fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    }
                })
                .then(response => {
                    return response.json()
                })
                .then(data => {

                    if (data.session_id) {
                        document.getElementById('form_part_2').action = `/sesiones/${data.session_id}`;
                        document.getElementById('form_part_2').style.display = 'block';
                        formPart1.style.display = 'none';
                        startTimer();
                    }
                })
                .catch(error => console.error('Error:', error));
        });

        let startTime;
        let currentTime = '';

        function startTimer() {
            startTime = new Date();

            setInterval(function() {
                let now = new Date();
                let diff = now - startTime;
                let hours = Math.floor(diff / 3600000);
                let minutes = Math.floor((diff % 3600000) / 60000);
                let seconds = Math.floor((diff % 60000) / 1000);

                currentTime =
                    `${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`

                document.getElementById('contador').textContent = currentTime;
            }, 1000);
        }

        const sintomas = document.getElementById('sintomas-options');

        sintomas.addEventListener('change', function(e) {
            let option = sintomas.options[sintomas.selectedIndex];
            let textarea = document.getElementById('sintomas');
            textarea.value += `${currentTime} ${option.value}\n`;
        });
    </script>
</x-slot>
