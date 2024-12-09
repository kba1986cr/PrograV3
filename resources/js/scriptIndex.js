// Elementos del DOM
const calendario = document.getElementById("calendario");
const monthScroll = document.getElementById("month-scroll");
const detalleDia = document.getElementById("detalle-dia");
const diaSeleccionado = document.getElementById("dia-seleccionado");
const turnoSelect = document.getElementById("turno-select");
const horaInicio = document.getElementById("hora-inicio");
const horaFin = document.getElementById("hora-fin");
const nota = document.getElementById("nota");

// Variables globales
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

document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    locale: 'es',
    events: '/eventos', // Ruta para cargar eventos
    dateClick: function (info) {
        // Abre un modal o formulario para crear el evento.
    }
  });
  calendar.render();
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


