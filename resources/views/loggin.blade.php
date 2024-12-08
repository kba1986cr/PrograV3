<x-app-layout meta-title="Calendario Interactivo" meta-description="Gestión de Turnos y Calendarios">

    <div class="mx-auto mt-4 max-w-6xl">
        <!-- Título Principal -->
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Calendario</h1>

        <div class="main-content flex">
            <!-- Sección Izquierda (Calendario) -->
            <div class="left-section w-3/5 px-4">
                <header class="mb-4 font-bold text-lg">Seleccione un día para gestionar su turno</header>
                <div class="div border p-4 rounded shadow-md">
                    <form action="{{ route('registrarDatos') }}" method="GET">
                        <button type="submit" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500">
                            Datos
                        </button>
                    </form>
                    
                    <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out  border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500" type="submit">Enviar</button>

                </div>
                <div class="div border p-4 rounded shadow-md">
                    <div class="content">
                        <div class="calendar" id="calendar">
                            <!-- Calendario generado dinámicamente -->
                            {{-- <div id='calendar'></div> --}}
                        </div>
                    </div>
                </div>

                <!-- Detalle del Día Seleccionado -->
                <section class="retractable-section mt-4">
                    <div class="detalle-dia p-4 border rounded shadow-md hidden" id="detalle-dia">
                        <h3 id="dia-seleccionado" class="mb-2 text-lg font-bold">Día Seleccionado:</h3>
                        <label for="turno-select" class="block mb-2 font-medium">Turno:</label>
                        <select id="turno-select" class="turno-select mb-2 w-full border rounded p-2">
                            <option value="">Seleccionar Turno</option>
                        </select>
                        <div class="time-controls flex items-center gap-4 mb-2">
                            <div>
                                <label for="hora-inicio" class="text-sm font-medium">Hora de Inicio:</label>
                                <input id="hora-inicio" type="time" class="hora-inicio border rounded p-2 w-full">
                            </div>
                            <div>
                                <label for="hora-fin" class="text-sm font-medium">Hora de Fin:</label>
                                <input id="hora-fin" type="time" class="hora-fin border rounded p-2 w-full">
                            </div>
                        </div>
                        <textarea id="nota" class="nota w-full border rounded p-2" placeholder="Notas del día..."></textarea>
                        <div class="actions mt-4 flex gap-2">
                            <button class="boton bg-blue-500 text-white px-4 py-2 rounded"
                                onclick="guardar()">Guardar</button>
                            <button class="boton bg-yellow-500 text-white px-4 py-2 rounded hidden"
                                onclick="actualizar()">Actualizar</button>
                            <button class="boton bg-red-500 text-white px-4 py-2 rounded hidden"
                                onclick="eliminar()">Eliminar</button>
                        </div>
                    </div>
                </section>
                <section class="retractable-section mt-4">
                    <div class="detalle-dia p-4 border rounded shadow-md hidden" id="detalle-dia">
                        @dump('puestos')
                        {{-- @foreach ($puestos as $puesto)
                            <div class="mb-2">
                                <a href="/loggin/{{ $puesto->id }}"
                                    class="text-blue-500 hover:underline">{{ $puesto->nombre }}</a>
                            </div>
                        @endforeach
                        <div class="day" data-fecha="2024-12-06">
                            @dump('turnos')
                            @foreach ($turnos as $turno)
                                <div class="mb-2">
                                    <a href="/loggin/{{ $turno->id }}"
                                        class="text-blue-500 hover:underline">{{ $turno->nota }}</a>
                                </div>
                            @endforeach
                        </div> --}}
                    </div>
                </section>
            </div>

            <!-- Sección Derecha (Opciones y Turnos) -->
            <div class="right-section w-2/5 px-4">
                <div class="div border p-4 rounded shadow-md">
                    <div class="month-scroll" id="month-scroll">
                        <!-- Scroll para meses -->
                    </div>
                </div>
                <div class="div mt-4 border p-4 rounded shadow-md">
                    @foreach ($puestos as $puesto)
                        <div class="mb-2">
                            <a href="/loggin/{{ $puesto->id }}"
                                class="text-blue-500 hover:underline">{{ $puesto->nombre }}</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{-- <script src="{{ asset('js/scriptIndex.js') }}"></script> --}}
        <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>
    </div>

</x-app-layout>
