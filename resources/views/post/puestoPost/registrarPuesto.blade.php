
<x-app-layout meta-title="Gestión de Puestos" meta-description="Formulario para gestionar puestos y sus salarios">
    <x-navigationDos />
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Gestión de Puestos</h1>

        <!-- Formulario para agregar/editar un puesto -->
        <form action="{{ route('puestos.store') }}" method="POST" id="form-puesto"
            class="mb-6 bg-white shadow-md rounded px-8 pt-6 pb-8">
            @csrf <!-- Token CSRF para seguridad -->

            <!-- Campo oculto para almacenar el ID del puesto -->
            <input type="hidden" id="puesto-id" name="puesto_id" value="">

            <div class="mb-4">
                <label for="nombre-puesto" class="block text-gray-700 font-bold mb-2">Nombre del Puesto:</label>
                <input type="text" id="nombre-puesto" name="nombre_puesto"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Ej: Administrador">
            </div>
            <div class="mb-4">
                <label for="salario-puesto" class="block text-gray-700 font-bold mb-2">Salario:</label>
                <input type="number" id="salario-puesto" name="salario_puesto"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    placeholder="Ej: 50000">
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

        <!-- Lista dinámica de puestos -->
        <div id="lista-puestos" class="bg-gray-100 p-4 rounded shadow-md">
            <h2 class="text-xl font-semibold mb-4">Lista de Puestos Registrados</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        {{-- <th class="border px-4 py-2">ID</th> --}}
                        <th class="border px-4 py-2">Nombre</th>
                        <th class="border px-4 py-2">Salario</th>
                        <th class="border px-4 py-2">Acción</th>
                    </tr>
                </thead>
                <tbody id="tabla-puestos">
                    @foreach ($puestos as $puesto)
                        <tr data-id="{{ $puesto->id }}" data-nombre="{{ $puesto->nombre }}" data-salario="{{ $puesto->salario_base }}">
                            {{-- <td class="border px-4 py-2">{{ $puesto->id }}</td> --}}
                            <td class="border px-4 py-2">{{ $puesto->nombre }}</td>
                            <td class="border px-4 py-2">{{ $puesto->salario_base }}</td>
                            <td class="border px-4 py-2">
                                <button type="button" class="seleccionar bg-blue-500 text-white px-2 py-1 rounded">Seleccionar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        const nombrePuestoInput = document.getElementById('nombre-puesto');
        const salarioPuestoInput = document.getElementById('salario-puesto');
        const puestoIdInput = document.getElementById('puesto-id');
        const btnGuardar = document.getElementById('btn-guardar');
        const btnEditar = document.getElementById('btn-editar');
        const btnEliminar = document.getElementById('btn-eliminar');
        const btnCancelar = document.getElementById('btn-cancelar');

        function limpiarFormulario() {
            puestoIdInput.value = '';
            nombrePuestoInput.value = '';
            salarioPuestoInput.value = '';
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
                const salario = row.getAttribute('data-salario');

                // Cargar datos en el formulario
                puestoIdInput.value = id;
                nombrePuestoInput.value = nombre;
                salarioPuestoInput.value = salario;

                // Cambiar estado de los botones
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
            const id = puestoIdInput.value;
            const nombre = nombrePuestoInput.value;
            const salario = salarioPuestoInput.value;

            fetch(`{{ url('puestos') }}/${id}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    nombre_puesto: nombre,
                    salario_puesto: salario
                })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert('Puesto actualizado con éxito');
                    // Actualizar la fila en la tabla sin recargar
                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    row.setAttribute('data-nombre', nombre);
                    row.setAttribute('data-salario', salario);
                    row.children[1].textContent = nombre;
                    row.children[2].textContent = salario;

                    limpiarFormulario();
                } else {
                    alert('Error al actualizar el puesto');
                }
            }).catch(err => console.error(err));
        });

        // Botón Eliminar
        btnEliminar.addEventListener('click', function() {
            const id = puestoIdInput.value;

            if(!confirm('¿Estás seguro de eliminar este puesto?')) {
                return;
            }

            fetch(`{{ url('puestos') }}/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert('Puesto eliminado con éxito');
                    const row = document.querySelector(`tr[data-id="${id}"]`);
                    row.remove();

                    limpiarFormulario();
                } else {
                    alert('Error al eliminar el puesto');
                }
            }).catch(err => console.error(err));
        });
    </script>
    
</x-app-layout>
