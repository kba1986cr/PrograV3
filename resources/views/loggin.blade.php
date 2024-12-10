<x-app-layout meta-title="Calendario Interactivo" meta-description="Gestión de Turnos y Calendarios">
    
        <!-- Título Bienvenida -->
        <h1 class="text-3xl mt-4 font-semibold text-gray-800 dark:text-gray-200 text-center mb-8">Calendario</h1>

            <!-- Sección central principal -->
            <div class="py-3 px-4 ">
                <<div class="mx-auto max-w-6xl">
                    <p class=" text-gray-700 dark:text-gray-200 my-4 text-1xl text-center  ">Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit amet consectetur adipisicing elit
                    </p>
                </div>
                <div class="flex justify-center items-center space-x-4 p-4 rounded shadow-md">
                    <form action="{{ route('registrarPuesto') }}" method="GET">
                        <button type="submit"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500">
                            Configuración
                        </button>
                        <!-- Button trigger modal -->
                        <button type="button"
                            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out border-2 border-transparent rounded-md dark:text-sky-200 bg-sky-800 hover:bg-sky-700 active:bg-sky-700 focus:outline-none focus:border-sky-500"data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Registrar Datos
                        </button>
                    </div>

    <section class="flex items-center justify-between px-10 py-20 ">

                        <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Registro</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">

                            <!-- Contenido del modal -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="puesto-select">Puesto</label>
                                        <select name="puesto_id" id="puesto-select" class="form-control">
                                            @foreach ($puestos as $puesto)
                                                <option value="{{ $puesto->id }}">{{ $puesto->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

                        
                <!-- Calendario generado dinámicamente -->
                <div class="w-3/4">
                    <div class="calendar-container bg-white shadow-md  " >
                        <div class="calendar" id="calendar" class=></div>
                            <!-- Calendario aquí -->
                        </div>
                    </div>
                
                         
                <!-- Sección Derecha (Opciones y Turnos) -->
<div class="w-2/3 pl-10 rounded">
    <div class="bg-white mt-4 p-4 border-l-8 border-blue-500">
        <!-- Tabla de Puestos -->
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-100">
                    <th class="text-left px-4 py-2 border">Nombre</th>
                    <th class="text-left px-4 py-2 border">Salario Base</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($puestos as $puesto)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border">{{ $puesto->nombre }}</td>
                    <td class="px-4 py-2 border">{{ $puesto->salario_base }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


                <!-- Modal -->
                <div id="dateModal" class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center hidden">
                    <div class="bg-white rounded-lg shadow-lg w-1/3">
                        <div class="border-b px-4 py-2 flex justify-between items-center">
                            <h3 class="font-semibold text-lg">Seleccionar fechas</h3>
                            <button id="closeModal" class="text-gray-600 hover:text-gray-800">&times;</button>
                        </div>
                        <div class="p-4">
                            <p id="selectedDates" class="text-gray-700">No hay fechas seleccionadas.</p>
                        </div>
                        <div class="flex justify-end p-4 border-t">
                            <button id="cancelModal" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">Cancelar</button>
                            <button id="saveModal" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Guardar</button>
                        </div>
                    </div>
                </div>

                <!-- Detalle del Día Seleccionado -->
                <section class="retractable-section mt-4">
                    <div class="detalle-dia p-4 border rounded shadow-md hidden" id="detalle-dia-1">
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
                    <div class="detalle-dia p-4 border rounded shadow-md hidden" id="detalle-dia-2">
                        <div class="mb-2"></div>
                    </div>
                </section>
            </div>

            
            </div>
        </div>
    </div>

</section>

    <!-- Scripts de Bootstrap y FullCalendar -->
    <!-- Asegúrate de cargar el Bootstrap Bundle (que incluye Popper) -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script> --}}
</x-app-layout>
