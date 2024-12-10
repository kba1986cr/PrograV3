<x-app-layout meta-title="Gestión de Horarios" meta-description="Formulario para gestionar horarios">
    <x-navigationDos />
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Gestión de Horarios</h1>

        <!-- Formulario para agregar/editar un horario -->
        <form action="{{ route('horarios.store') }}" method="POST" id="form-horario"
            class="mb-6 bg-white shadow-md rounded px-8 pt-6 pb-8">
            @csrf <!-- Token CSRF para seguridad -->

            <!-- Campo oculto para almacenar el ID del horario -->
            <input type="hidden" id="horario-id" name="horario_id" value="">

            <div class="mb-4">
                <label for="nombre-horario" class="block text-gray-700 font-bold mb-2">Nombre del Horario:</label>
                <input type="text" id="nombre-horario" name="nombre_horario"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Ej: Administrador">
            </div>

            <div class="mb-4 flex space-x-4">
                <!-- Hora de Entrada -->
                <div class="w-1/2">
                    <label for="entrada" class="block text-gray-700 font-bold mb-2">Hora de Entrada:</label>
                    <input type="time" id="entrada" name="hora_inicio"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Ej: 08:00">
                </div>

                <!-- Hora de Salida -->
                <div class="w-1/2">
                    <label for="salida" class="block text-gray-700 font-bold mb-2">Hora de Salida:</label>
                    <input type="time" id="salida" name="hora_fin"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        placeholder="Ej: 17:00">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <!-- Botón Guardar (crear) -->
                <button type="submit" id="btn-guardar"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Guardar
                </button>

                <!-- Botón Editar (oculto por defecto) -->
                <button type="button" id="btn-editar"
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hidden">
                    Editar
                </button>

                <!-- Botón Eliminar (oculto por defecto) -->
                <button type="button" id="btn-eliminar"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hidden">
                    Eliminar
                </button>

                <!-- Botón Cancelar (oculto por defecto) -->
                <button type="button" id="btn-cancelar"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hidden">
                    Cancelar
                </button>
            </div>
        </form>

        <!-- Lista dinámica de horarios -->
        <div id="lista-horarios" class="bg-gray-100 p-4 rounded shadow-md">
            <h2 class="text-xl font-semibold mb-4">Lista de Horarios Registrados</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">Horario</th>
                        <th class="border px-4 py-2">Entrada</th>
                        <th class="border px-4 py-2">Salida</th>
                        <th class="border px-4 py-2">Acción</th>
                    </tr>
                </thead>
                <tbody id="tabla-horarios">
                    @foreach ($horarios as $horario)
                        <tr data-id="{{ $horario->id }}" data-nombre="{{ $horario->nombre }}"
                            data-hora_inicio="{{ $horario->hora_inicio }}" data-hora_fin="{{ $horario->hora_fin }}">
                            <td class="border px-4 py-2">{{ $horario->nombre }}</td>
                            <td class="border px-4 py-2">{{ $horario->hora_inicio }}</td>
                            <td class="border px-4 py-2">{{ $horario->hora_fin }}</td>
                            <td class="border px-4 py-2">
                                <button type="button"
                                    class="seleccionar bg-blue-500 text-white px-2 py-1 rounded">Seleccionar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const nombreHorarioInput = document.getElementById('nombre-horario');
        const entradaInput = document.getElementById('entrada');
        const salidaInput = document.getElementById('salida');
        const horarioIdInput = document.getElementById('horario-id');
        const btnGuardar = document.getElementById('btn-guardar');
        const btnEditar = document.getElementById('btn-editar');
        const btnEliminar = document.getElementById('btn-eliminar');
        const btnCancelar = document.getElementById('btn-cancelar');
        
        // Limpiar el formulario
        function limpiarFormulario() {
            horarioIdInput.value = '';
            nombreHorarioInput.value = '';
            entradaInput.value = '';
            salidaInput.value = '';
            btnEditar.classList.add('hidden');
            btnEliminar.classList.add('hidden');
            btnCancelar.classList.add('hidden');
            btnGuardar.classList.remove('hidden');
        }
    
        // Al hacer clic en "Seleccionar"
        document.querySelectorAll('.seleccionar').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                const id = row.getAttribute('data-id');
                const nombre = row.getAttribute('data-nombre');
                const entrada = row.getAttribute('data-hora_inicio');
                const salida = row.getAttribute('data-hora_fin');
    
                // Cargar datos en el formulario
                horarioIdInput.value = id;
                nombreHorarioInput.value = nombre;
                entradaInput.value = entrada;
                salidaInput.value = salida;
    
                // Cambiar el estado de los botones
                btnGuardar.classList.add('hidden');
                btnEditar.classList.remove('hidden');
                btnEliminar.classList.remove('hidden');
                btnCancelar.classList.remove('hidden');
            });
        });
    
        // Botón Cancelar
        btnCancelar.addEventListener('click', function() {
            limpiarFormulario();
        });
    
        // Botón Editar (actualizar)
        btnEditar.addEventListener('click', function() {
            const id = horarioIdInput.value;
            const nombre = nombreHorarioInput.value;
            const entrada = entradaInput.value;
            const salida = salidaInput.value;
    
            // Hacer la solicitud para actualizar el horario
            fetch(`/horarios/${id}`, {  // Corregido: Añadido el '/' antes del url
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'  // Asegúrate de que esto es correcto dentro de Blade
                },
                body: JSON.stringify({
                    nombre_horario: nombre,
                    hora_inicio: entrada,
                    hora_salida: salida,
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Horario actualizado con éxito');
    
                    // Obtener la fila correspondiente a este horario
                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    if (row) {
                        // Actualizar las celdas de la fila
                        row.setAttribute('data-nombre', nombre);
                        row.setAttribute('data-hora_inicio', entrada);
                        row.setAttribute('data-hora_fin', salida);
                        row.children[0].textContent = nombre; // Columna de nombre
                        row.children[1].textContent = entrada; // Columna de hora de entrada
                        row.children[2].textContent = salida; // Columna de hora de salida
                    }
    
                    // Limpiar el formulario después de la actualización
                    limpiarFormulario();
                } else {
                    alert('Error al actualizar el horario');
                }
            })
            .catch(err => console.error('Error:', err));
        });
    
        // Botón Eliminar
        btnEliminar.addEventListener('click', function() {
            const id = horarioIdInput.value;
    
            if (!confirm('¿Estás seguro de eliminar este horario?')) {
                return;
            }
    
            fetch(`/horarios/${id}`, {  // Corregido: Añadido el '/' antes del url
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'  // Asegúrate de que esto es correcto dentro de Blade
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Horario eliminado con éxito');
                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    row.remove();
    
                    limpiarFormulario();
                } else {
                    alert('Error al eliminar el horario');
                }
            })
            .catch(err => console.error(err));
        });
    </script>
    
    
    
</x-app-layout>
