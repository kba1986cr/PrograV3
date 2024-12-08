<x-layout meta-title="Gestión de Puestos" meta-description="Formulario para gestionar puestos y sus salarios">
    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 font-serif text-3xl text-center text-sky-600 dark:text-sky-500">Gestión de Puestos</h1>

        <!-- Formulario para agregar o editar un puesto -->
        <form id="form-puesto" class="mb-6 bg-white shadow-md rounded px-8 pt-6 pb-8">
            <div class="mb-4">
                <label for="nombre-puesto" class="block text-gray-700 font-bold mb-2">Nombre del Puesto:</label>
                <input type="text" id="nombre-puesto" name="nombre_puesto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ej: Administrador">
            </div>
            <div class="mb-4">
                <label for="salario-puesto" class="block text-gray-700 font-bold mb-2">Salario:</label>
                <input type="number" id="salario-puesto" name="salario_puesto" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ej: 50000">
            </div>
            <input type="hidden" id="puesto-id">
            <div class="flex items-center justify-between">
                <button type="button" id="btn-guardar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Guardar</button>
                <button type="button" id="btn-cancelar" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline hidden">Cancelar</button>
            </div>
        </form>

        <!-- Lista dinámica de puestos -->
        <div id="lista-puestos" class="bg-gray-100 p-4 rounded shadow-md">
            <h2 class="text-xl font-semibold mb-4">Lista de Puestos Registrados</h2>
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border px-4 py-2">Nombre</th>
                        <th class="border px-4 py-2">Salario</th>
                    </tr>
                </thead>
                <tbody id="tabla-puestos">
                    <!-- Contenido dinámico -->
                    
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
