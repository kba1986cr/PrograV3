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

// Función para renderizar el calendario
function renderCalendar(month, year) {
  calendario.innerHTML = "";
  const daysInMonth = new Date(year, month + 1, 0).getDate();

  for (let i = 1; i <= daysInMonth; i++) {
    const dia = document.createElement("div");
    dia.classList.add("dia");
    dia.innerText = `Día ${i}`;

    dia.addEventListener("click", () => {
      selectedDay = i;
      const selectedMonth = months[month];
      const selectedYear = year;

      diaSeleccionado.innerText = `Fecha: ${selectedDay} de ${selectedMonth} de ${selectedYear}`;
      detalleDia.style.display = "block";

      turnoSelect.innerHTML = '<option value="">Seleccionar Turno</option>';
      turnos.forEach((turno, index) => {
        const option = document.createElement("option");
        option.value = index;
        option.textContent = turno.nombre;
        turnoSelect.appendChild(option);
      });

      turnoSelect.value = "";
      horaInicio.value = "";
      horaInicio.classList.add("hidden");
      horaFin.value = "";
      horaFin.classList.add("hidden");
      nota.value = "";
    });

    calendario.appendChild(dia);
  }
}

// Evento para cambiar entre turnos
turnoSelect.addEventListener("change", (e) => {
  const turnoIndex = e.target.value;
  if (turnoIndex) {
    const turnoSeleccionado = turnos[turnoIndex];
    horaInicio.classList.remove("hidden");
    horaFin.classList.remove("hidden");
    horaInicio.min = turnoSeleccionado.horas.general[0];
    horaInicio.max = turnoSeleccionado.horas.general[1];
    horaFin.min = turnoSeleccionado.horas.general[0];
    horaFin.max = turnoSeleccionado.horas.general[1];
  } else {
    horaInicio.classList.add("hidden");
    horaFin.classList.add("hidden");
  }
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

// Función para alternar el menú lateral
function toggleMenu() {
  const menuContent = document.querySelector(".menu-content");
  menuContent.classList.toggle("active");
}

// Inicialización del calendario y barra de meses
renderMonthScroll();
renderCalendar(currentMonth, currentYear);

// --- Aquí comienzan los bloques comentados ---

// // Función para guardar datos (descomentarlo si decides usarlo)
// async function guardar() {
//   const payload = {
//     fecha: `${selectedYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(selectedDay).padStart(2, '0')}`,
//     turno: turnos[turnoSelect.value].nombre,
//     hora_inicio: horaInicio.value,
//     hora_fin: horaFin.value,
//     nota: nota.value,
//   };

//   const response = await fetch('/turnos', {
//     method: 'POST',
//     headers: { 'Content-Type': 'application/json' },
//     body: JSON.stringify(payload),
//   });

//   const data = await response.json();
//   alert(data.message);
// }
