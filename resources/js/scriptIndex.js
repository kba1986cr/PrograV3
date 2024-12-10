// Elementos del DOM

const monthScroll = document.getElementById("month-scroll");
const detalleDia = document.getElementById("detalle-dia");
const diaSeleccionado = document.getElementById("dia-seleccionado");
const turnoSelect = document.getElementById("turno-select");
const horaInicio = document.getElementById("hora-inicio");
const horaFin = document.getElementById("hora-fin");
const nota = document.getElementById("nota");
  const calendario = document.getElementById("calendar");
  const modal = document.getElementById('dateModal');
  const closeModal = document.getElementById('closeModal');
  const cancelModal = document.getElementById('cancelModal');
  const saveModal = document.getElementById('saveModal');
  const selectedDatesEl = document.getElementById('selectedDates');

// Modal


// Variables globales
let selectedStart = null;
let selectedEnd = null;
let selectedDay;
let selectedTurno;
let existeRegistro = false;
let currentMonth = new Date().getMonth();
let currentYear = new Date().getFullYear();

const months = [
  "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
  "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre",
];

const turnos = [
  { nombre: "Administrativo", horas: { general: ["16:00", "22:00"] } },
  { nombre: "Citas", horas: { general: ["03:00", "06:00"] } },
  { nombre: "1er Turno", horas: { general: ["03:00", "06:00"] } },
  { nombre: "2do Turno", horas: { general: ["03:00", "14:00"] } },
  { nombre: "3er Turno", horas: { general: ["14:00", "22:00"] } },
];


//Full Calendar el de arriba es e hice

  const calendar = new FullCalendar.Calendar(calendario, {
    initialView: 'dayGridMonth',
    selectable: true,  // Permitir selección de días
    locale: 'es',
    events: '/eventos', // Ruta para cargar eventos
    headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
    },
    select: function (info) {
        // Guardar las fechas seleccionadas
        selectedStart = info.startStr;
        selectedEnd = info.endStr;

        // Actualizar el contenido del modal
        selectedDatesEl.innerText = `Has seleccionado desde ${selectedStart} hasta ${selectedEnd}.`;

        // Mostrar el modal
        modal.classList.remove('hidden');
    },
    dateClick: function (info) {
        // Acción al hacer clic en una fecha específica (opcional)
    }
});

// Función para cerrar el modal
const closeModalHandler = () => {
    modal.classList.add('hidden');
};

// Evento para cerrar el modal
closeModal.addEventListener('click', closeModalHandler);
cancelModal.addEventListener('click', closeModalHandler);

// Manejar el botón "Guardar" en el modal
saveModal.addEventListener('click', function () {
    if (selectedStart && selectedEnd) {
        alert(`Fechas guardadas: ${selectedStart} a ${selectedEnd}`);
        // Aquí puedes enviar las fechas al servidor usando fetch/AJAX si es necesario.
    }
    closeModalHandler();
});

// Renderizar el calendario
calendar.render();

// Manejar la selección de días y envío a Laravel
calendar.on('select', function (info) {
    fetch('/calendar/store', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            start: info.startStr,
            end: info.endStr
        })
    })
    .then(response => response.json())
    .then(data => {
      console.log('Fechas guardadas', data);
    })
    .catch(error => {
      console.error('Error al guardar las fechas:', error);
    });
});


// Función para renderizar la barra de meses
function renderMonthScroll() {
  monthScroll.innerHTML = "";
  months.forEach((month, index) => {
    const monthItem = document.createElement("div");
    monthItem.classList.add("month-item");
    monthItem.innerText = `${month} ${currentYear}`;
    monthItem.addEventListener("click", () => {
      currentMonth = index;
      renderCalendar(currentMonth, currentYear);
    });
    monthScroll.appendChild(monthItem);
  });
}

// Evento para cambiar de año con el scroll
monthScroll.addEventListener("wheel", (event) => {
  event.preventDefault();
  currentYear += event.deltaY < 0 ? 1 : -1;
  renderMonthScroll();
});


// Inicialización del calendario y barra de meses
renderMonthScroll();
renderCalendar(currentMonth, currentYear);

;