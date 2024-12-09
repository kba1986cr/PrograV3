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