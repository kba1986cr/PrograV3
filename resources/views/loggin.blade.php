{{-- <x-layout meta-titlle="Loggin title" meta-description="Loggin description">
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Loggin</h1>
    </div>

</x-layout> --}}

{{-- <x-layout meta-title="Calendario de Turnos" meta-description="Gestión de turnos">
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Calendario de Turnos</h1>

        <div id="calendario" class="calendario"></div>
        <div id="detalle-dia" class="detalle-dia" style="display: none;">
            <h3 id="dia-seleccionado">Día Seleccionado:</h3>
            <select id="turno-select" class="turno-select">
                <option value="">Seleccionar Turno</option>
            </select>
            <input id="hora-inicio" type="time" class="hora-inicio">
            <input id="hora-fin" type="time" class="hora-fin">
            <textarea id="nota" class="nota" placeholder="Notas del día..."></textarea>
            <div class="actions">
                <button class="boton" onclick="guardar()">Guardar</button>
                <button class="boton" onclick="actualizar()">Actualizar</button>
                <button class="boton" onclick="eliminar()">Eliminar</button>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/scriptIndex.js') }}"></script>
</x-layout> --}}

{{-- <x-layout meta-title="Loggin title" meta-description="Loggin description">
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Calendario</h1>
        <div class="main-content">
            <div class="left-section">
                <header>Encabezado de la Sección Principal</header>
                <div class="div">
                    <div class="content">
                        <div class="calendario" id="calendario"></div>
                    </div>
                </div>
                <section class="retractable-section">
                    <div class="detalle-dia" id="detalle-dia" style="display: none;">
                        <h3 id="dia-seleccionado">Día Seleccionado:</h3>
                        <select id="turno-select" class="turno-select"></select>
                        <input id="hora-inicio" type="time" class="hora-inicio hidden">
                        <input id="hora-fin" type="time" class="hora-fin hidden">
                        <textarea id="nota" class="nota" placeholder="Notas del día..."></textarea>
                        <div class="actions">
                            <button class="boton" onclick="guardar()">Guardar</button>
                            <button class="boton" onclick="actualizar()" style="display: none;">Actualizar</button>
                            <button class="boton" onclick="eliminar()" style="display: none;">Eliminar</button>
                        </div>
                    </div>
                </section>
            </div>
            <div class="right-section">
                <div class="div">
                    <div class="month-scroll" id="month-scroll"></div>
                    <div class="year-controls">
                        <button class="botonDos" onclick="changeYear(-1)">Anterior Año</button>
                        <button class="botonDos" onclick="changeYear(1)">Siguiente Año</button>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/scriptIndex.js') }}"></script>
    </div>
    <div>@dump('turnos')</div>

</x-layout> --}}

{{-- <x-layout meta-title="Loggin title" meta-description="Loggin description">
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Calendario</h1>
        <div class="main-content flex">
            <!-- Sección izquierda -->
            <div class="left-section flex-1">
                <header>Encabezado de la Sección Principal</header>
                <div class="content">
                    <div id="calendario" class="calendario"></div>
                </div>
                <section id="detalle-dia" class="detalle-dia hidden">
                    <h3 id="dia-seleccionado">Día Seleccionado:</h3>
                    <select id="turno-select" class="turno-select"></select>
                    <input id="hora-inicio" type="time" class="hora-inicio hidden">
                    <input id="hora-fin" type="time" class="hora-fin hidden">
                    <textarea id="nota" class="nota" placeholder="Notas del día..."></textarea>
                    <div class="actions flex gap-2">
                        <button onclick="guardar()" class="boton">Guardar</button>
                        <button onclick="actualizar()" class="boton hidden">Actualizar</button>
                        <button onclick="eliminar()" class="boton hidden">Eliminar</button>
                    </div>
                </section>
            </div>

            <!-- Sección derecha -->
            <div class="right-section flex-1">
                <div class="month-scroll" id="month-scroll"></div>
                <div class="year-controls flex justify-between mt-4">
                    <button onclick="changeYear(-1)" class="botonDos">Anterior Año</button>
                    <button onclick="changeYear(1)" class="botonDos">Siguiente Año</button>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/scriptIndex.js') }}"></script>
    </div>
</x-layout> --}}

{{-- <x-layout meta-titlle="Loggin title" meta-description="Loggin description">
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Calendario</h1>
        <div class="main-content">
            <div class="main-content">
                <!-- Sección Izquierda (60%) -->
                <div class="left-section">
                    <header>Encabezado de la Sección Principal</header>
                    <div class="div">
                        <div class="content">
                            <div class="calendario" id="calendario"></div>
                        </div>
                    </div>
                    <section class="retractable-section">
                        <!-- Contenedor de Detalles del Día Seleccionado -->
                        <div class="detalle-dia" id="detalle-dia" style="display: none;">
                            <h3 id="dia-seleccionado">Día Seleccionado:</h3>
                            <select id="turno-select" class="turno-select">
                                <option value="">Seleccionar Turno</option>
                                <!-- Opciones de turno se agregan dinámicamente -->
                            </select>
                            <input id="hora-inicio" type="time" class="hora-inicio hidden">
                            <input id="hora-fin" type="time" class="hora-fin hidden">
                            <textarea id="nota" class="nota" placeholder="Notas del día..."></textarea>
                            <div class="actions">
                                <button class="boton" onclick="guardar()">Guardar</button>
                                <button class="boton" onclick="actualizar()" style="display: none;">Actualizar</button>
                                <button class="boton" onclick="eliminar()" style="display: none;">Eliminar</button>
                            </div>
                        </div>
                    </section>
                    <section class="section">Primera Sección</section>
                </div>


                <!-- Sección Derecha (40%) -->
                <div class="right-section">
                    <div class="div">
                        <div class="month-scroll" id="month-scroll"></div>
                        <div class="year-controls">
                            <button class= "botonDos" onclick="changeYear(-1)">Anterior Año</button>
                            <button class= "botonDos" onclick="changeYear(1)">Siguiente Año</button>
                        </div>
                    </div>
                </div>
                <div class="div">Contenido del Div 2</div>
            </div>
        </div>
    </div>
    <footer>
        <p>Pie de Página</p>
    </footer>
    <script src="scriptIndex.js"></script>
    </div>
</x-layout> --}}

{{-- <x-layout meta-title="Login Title" meta-description="Login Description">
    <div class="mx-auto mt-4 max-w-6xl">
        <!-- Título Principal -->
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Calendario</h1>

        <div class="main-content flex">
            <!-- Sección Izquierda (60%) -->
            <div class="left-section w-3/5 px-4">
                <header class="mb-4 font-bold text-lg">Encabezado de la Sección Principal</header>
                <div class="div border p-4 rounded shadow-md">
                    <div class="content">
                        <!-- Calendario Principal -->
                        <div class="calendario" id="calendario"></div>
                    </div>
                </div>

                <!-- Detalle del Día Seleccionado -->
                <section class="retractable-section mt-4">
                    <div class="detalle-dia p-4 border rounded shadow-md hidden" id="detalle-dia">
                        <h3 id="dia-seleccionado" class="mb-2 text-lg font-bold">Día Seleccionado:</h3>
                        <select id="turno-select" class="turno-select mb-2 w-full border rounded p-2">
                            <option value="">Seleccionar Turno</option>
                            <!-- Opciones de turno dinámicas -->
                        </select>
                        <input id="hora-inicio" type="time"
                            class="hora-inicio mb-2 w-full border rounded p-2 hidden">
                        <input id="hora-fin" type="time" class="hora-fin mb-2 w-full border rounded p-2 hidden">
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
            </section>
            <section class="section">Primera Sección</section>
            </div>

            <!-- Sección Derecha (40%) -->
            <div class="right-section w-2/5 px-4">
                <div class="div border p-4 rounded shadow-md">
                    <!-- Scroll de Meses -->
                    <div class="month-scroll overflow-y-auto max-h-64" id="month-scroll"></div>

                    <!-- Controles de Año -->
                    <div class="year-controls mt-4 flex justify-between">
                        <button class="botonDos bg-gray-500 text-white px-4 py-2 rounded"
                            onclick="changeYear(-1)">Anterior Año</button>
                        <button class="botonDos bg-gray-500 text-white px-4 py-2 rounded"
                            onclick="changeYear(1)">Siguiente Año</button>
                    </div>
                </div>
                <div class="div">Contenido del Div 2</div>
            </div>
        </div>

        <!-- Pie de Página -->
        <footer class="bg-gray-800 text-white text-center py-4 mt-4">
            <p>&copy; 2024 Tu Empresa. Todos los derechos reservados.</p>
        </footer>

        <!-- Script de Funcionalidad -->
        <script src="scriptIndex.js"></script>
    </div>
</x-layout> --}}

{{-- <x-app-layout meta-title="Login Title" meta-description="Login Description">
    <div class="mx-auto mt-4 max-w-6xl">
       
        <!-- Título Principal -->
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Calendario</h1>
                
        <div class="main-content flex">
            <!-- Sección Izquierda (60%) -->
            <div class="left-section w-3/5 px-4">
                <header class="mb-4 font-bold text-lg">Encabezado de la Sección Principal</header>
                <div class="div border p-4 rounded shadow-md">
                    <div class="content">
                        <!-- Calendario Principal -->
                        <div class="calendario" id="calendario"></div>
                    </div>
                </div>

                <!-- Detalle del Día Seleccionado -->
                <section class="retractable-section mt-4">
                    <div class="detalle-dia p-4 border rounded shadow-md hidden" id="detalle-dia">
                        <h3 id="dia-seleccionado" class="mb-2 text-lg font-bold">Día Seleccionado:</h3>
                        <select id="turno-select" class="turno-select mb-2 w-full border rounded p-2">
                            <option value="">Seleccionar Turno</option>
                            <!-- Opciones de turno dinámicas -->
                        </select>

                        <!-- Contenedor de Horarios -->
                        <div class="time-controls flex items-center gap-4 mb-2">
                            <div class="flex flex-col items-center">
                                <label for="hora-inicio" class="text-sm font-medium mb-1">Inicio:</label>
                                <input id="hora-inicio" type="time" class="hora-inicio border rounded p-2">
                            </div>
                            <div class="flex flex-col items-center">
                                <label for="hora-fin" class="text-sm font-medium mb-1">Fin:</label>
                                <input id="hora-fin" type="time" class="hora-fin border rounded p-2">
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
            </div>

            <!-- Sección Derecha (40%) -->
            <div class="right-section w-2/5 px-4">
                <div class="div border p-4 rounded shadow-md">
                    <!-- Scroll de Meses -->
                    <div class="month-scroll overflow-y-auto max-h-64" id="month-scroll"></div>
                </div>
                <div class="div">Hola</div>
            </div>
        </div>
    </div>
</x-app-layout>  ESTE ESTA FUNCIONAL --}}

<x-app-layout meta-titlle="Loggin title" meta-description="Loggin description">
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Loggin</h1>
    </div>
</x-app-layout>
