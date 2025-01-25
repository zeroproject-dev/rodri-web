<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Estadisticas') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <div class="">
                        <div style="width: 800px; margin: auto;">
                            <strong>Tiempo de uso de las escenas</strong>
                            <canvas id="totalTimeScenes"></canvas>
                        </div>
                    </div>
                    <select class="ml-2" id="pacientes" onchange="onSelectPaciente(this)">
                        <option value="">-- Selecciona un paciente --</option>
                        @foreach($pacientes as $paciente)
                        <option value="{{ $paciente->id }}">
                            {{ $paciente->primer_nombre }} {{ $paciente->segundo_nombre }} {{ $paciente->paterno }} {{ $paciente->materno }}
                        </option>
                        @endforeach
                    </select>

                    <div id="paciente-charts" class="hidden">
                        <div class="gap-2 flex justify-evenly w-full">
                            <div style="width: 500px; margin: auto;display: inline-block;">
                                <strong>Tiempo de sesiones</strong>
                                <canvas id="timeSesion"></canvas>
                            </div>

                            <div style="width: 500px; margin: auto;display: inline-block;">
                                <strong>Tiempo de uso de las escenas</strong>
                                <canvas id="timeSesionScene"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- <pre>{{ json_encode(json_decode($estadisticas), JSON_PRETTY_PRINT) }}</pre> -->
                    <!-- <pre>{{ json_encode(json_decode($pacientes), JSON_PRETTY_PRINT) }}</pre> -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.umd.js" integrity="sha512-ZwR1/gSZM3ai6vCdI+LVF1zSq/5HznD3ZSTk7kajkaj4D292NLuduDCO1c/NT8Id+jE58KYLKT7hXnbtryGmMg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dayjs/1.11.13/dayjs.min.js" integrity="sha512-FwNWaxyfy2XlEINoSnZh1JQ5TRRtGow0D6XcmAWmYCRgvqOUTnzCxPc9uF35u5ZEpirk1uhlPVA19tflhvnW1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const data = JSON.parse(@json($estadisticas));
        const pacientes = JSON.parse(@json($pacientesJson));

        function togglePacienteVisivilityCharts(flag) {
            const divCharts = document.getElementById('paciente-charts');
            divCharts.classList.toggle('hidden', flag);
        }

        console.log(pacientes);

        function initTotalTimeInScenes() {
            function getMinutesFromTime(estadisticas, initialObj) {
                return estadisticas.reduce((acc, item) => {
                    if (item.nombre !== 'TIME') return acc;
                    const { time, scene } = JSON.parse(item.valor);
                    if (acc[scene]) acc[scene] += time / 60;
                    else acc[scene] = time / 60;
                    return acc;
                }, initialObj || {});
            }

            const timeGrouped = data.reduce((acc, item) => {
                return getMinutesFromTime(item.estadisticas, acc);
            }, {});

            const testCanvas = document.getElementById('totalTimeScenes');
            const testCtx = testCanvas.getContext('2d');
            const testChart = new Chart(testCtx, {
                type: 'bar',
                data: {
                    labels: Object.keys(timeGrouped),
                    datasets: [
                        {
                            label: 'Minutos dentro de una escena',
                            data: Object.values(timeGrouped),
                        }
                    ],
                }
            });
        }

        initTotalTimeInScenes();

        function showDaysSesionTime(daysSesionTime) {
            const labels = Object.keys(daysSesionTime);
            const values = Object.values(daysSesionTime);

            const canvas = document.getElementById('timeSesion');
            const ctx = canvas.getContext('2d');

            const chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels,
                    datasets: [
                        {
                            label: 'Tiempo total de sesion por día.',
                            data: values,
                        }
                    ],
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                        }
                    }
                }
            });
        }

        function showScenesTime(s) {
            const labels = Object.keys(s);
            const values = Object.values(s);

            const canvas = document.getElementById('timeSesionScene');
            const ctx = canvas.getContext('2d');

            const chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels,
                    datasets: [
                        {
                            label: 'Tiempo de escenas.',
                            data: values,
                        }
                    ],
                }
            });

        }

        function onSelectPaciente(selectElement) {
            const pacienteId = selectElement.value;
            if (!pacienteId) return togglePacienteVisivilityCharts(true);
            togglePacienteVisivilityCharts(false);

            const sesions = data.filter((sesion)=>sesion.paciente_id == pacienteId);

            const daysSesionTime = {};
            const scenesTime = {};

            sesions.forEach((sesion) => {
                const day = dayjs(sesion.created_at).format('DD/MM/YYYY');

                daysSesionTime[day] = daysSesionTime[day] || 0;

                const fechaInicio = dayjs(`2000-01-01 ${sesion.hora_inicio}`);
                const fechaFin = dayjs(`2000-01-01 ${sesion.hora_fin}`);

                const diffInMinutes = fechaFin.diff(fechaInicio, 'minute', true);

                daysSesionTime[day] += diffInMinutes;

                sesion.estadisticas.forEach((estadistica) => {
                    if (estadistica.nombre !== 'TIME') return;
                    const { time, scene } = JSON.parse(estadistica.valor);
                    scenesTime[scene] = scenesTime[scene] || 0;
                    scenesTime[scene] += time;
                });
            });

            showDaysSesionTime(daysSesionTime);

            showScenesTime(scenesTime);
        }

    </script>

</x-app-layout>
