
/////////

// const calendario = document.getElementById("calendario");
// const monthScroll = document.getElementById("month-scroll");
// const detalleDia = document.getElementById("detalle-dia");
// const diaSeleccionado = document.getElementById("dia-seleccionado");
// const turnoSelect = document.getElementById("turno-select");
// const horaInicio = document.getElementById("hora-inicio");
// const horaFin = document.getElementById("hora-fin");
// const nota = document.getElementById("nota");
// let selectedDay;
// let selectedTurno;
// let existeRegistro = false;

// const months = [
//   "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", 
//   "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
// ];
// const turnos = [
//   { nombre: "Administrativo", horas: { general: ["16:00", "22:00"] } },
//   { nombre: "Citas", horas: { general: ["03:00", "06:00"] } },
//   { nombre: "1er Turno", horas: { general: ["03:00", "06:00"] } },
//   { nombre: "2do Turno", horas: { general: ["03:00", "14:00"] } },
//   { nombre: "3er Turno", horas: { general: ["14:00", "22:00"] } },
// ];
// let currentMonth = new Date().getMonth();
// let currentYear = new Date().getFullYear();

// function renderCalendar(month, year) {
//   calendario.innerHTML = "";
//   const daysInMonth = new Date(year, month + 1, 0).getDate();
//   for (let i = 1; i <= daysInMonth; i++) {
//     const dia = document.createElement("div");
//     dia.classList.add("dia");
//     dia.innerText = `Día ${i}`;

//     dia.addEventListener("click", () => {
//       selectedDay = i;
//       diaSeleccionado.innerText = `Día seleccionado: ${selectedDay}`;
//       detalleDia.style.display = "block";
//       turnoSelect.innerHTML = '<option value="">Seleccionar Turno</option>';

//       turnos.forEach((turno, index) => {
//         const option = document.createElement("option");
//         option.value = index;
//         option.textContent = turno.nombre;
//         turnoSelect.appendChild(option);
//       });

//       resetInputs();
//     });

//     calendario.appendChild(dia);
//   }
// }

// turnoSelect.addEventListener("change", (e) => {
//   const turnoIndex = e.target.value;
//   if (turnoIndex) {
//     const turnoSeleccionado = turnos[turnoIndex];
//     horaInicio.classList.remove("hidden");
//     horaFin.classList.remove("hidden");
//     horaInicio.min = turnoSeleccionado.horas.general[0];
//     horaInicio.max = turnoSeleccionado.horas.general[1];
//     horaFin.min = turnoSeleccionado.horas.general[0];
//     horaFin.max = turnoSeleccionado.horas.general[1];
//   } else {
//     horaInicio.classList.add("hidden");
//     horaFin.classList.add("hidden");
//   }
// });

// function resetInputs() {
//   turnoSelect.value = "";
//   horaInicio.value = "";
//   horaInicio.classList.add("hidden");
//   horaFin.value = "";
//   horaFin.classList.add("hidden");
//   nota.value = "";
// }

// function changeYear(offset) {
//   currentYear += offset;
//   renderMonthScroll();
//   renderCalendar(currentMonth, currentYear);
// }

// function renderMonthScroll() {
//   monthScroll.innerHTML = "";
//   months.forEach((month, index) => {
//     const monthItem = document.createElement("div");
//     monthItem.classList.add("month-item");
//     monthItem.innerText = `${month} ${currentYear}`;
//     monthItem.addEventListener("click", () => {
//       currentMonth = index;
//       renderCalendar(currentMonth, currentYear);
//     });
//     monthScroll.appendChild(monthItem);
//   });
// }

// monthScroll.addEventListener("wheel", (event) => {
//   event.preventDefault();
//   currentYear += event.deltaY < 0 ? 1 : -1;
//   renderMonthScroll();
// });

// function guardar() {
//   if (!validarFormulario()) return;

//   const params = new URLSearchParams({
//     dia: selectedDay,
//     turno: turnos[turnoSelect.value].nombre,
//     hora_inicio: horaInicio.value,
//     hora_fin: horaFin.value,
//     nota: nota.value,
//     accion: "guardar",
//   });

//   fetch("index.php", {
//     method: "POST",
//     headers: { "Content-Type": "application/x-www-form-urlencoded" },
//     body: params,
//   })
//     .then((response) => response.text())
//     .then((data) => alert(data))
//     .catch((error) => console.error("Error:", error));
// }

// function validarFormulario() {
//   if (!turnoSelect.value || !horaInicio.value || !horaFin.value) {
//     alert("Por favor, completa todos los campos antes de guardar.");
//     return false;
//   }
//   return true;
// }

// //Renderizar elementos al cargar
// renderMonthScroll();
// renderCalendar(currentMonth, currentYear);

/////////

// async function guardar() {
//   const payload = {
//       dia: selectedDay,
//       turno: turnoSelect.value,
//       hora_inicio: horaInicio.value,
//       hora_fin: horaFin.value,
//       nota: nota.value,
//   };

//   const response = await fetch('/turnos', {
//       method: 'POST',
//       headers: { 'Content-Type': 'application/json' },
//       body: JSON.stringify(payload),
//   });

//   const data = await response.json();
//   alert(data.message);
//   renderCalendar(currentMonth, currentYear); // Refrescar el calendario
// }

// async function actualizar(id) {
//   const payload = {
//       dia: selectedDay,
//       turno: turnoSelect.value,
//       hora_inicio: horaInicio.value,
//       hora_fin: horaFin.value,
//       nota: nota.value,
//   };

//   const response = await fetch(`/turnos/${id}`, {
//       method: 'PUT',
//       headers: { 'Content-Type': 'application/json' },
//       body: JSON.stringify(payload),
//   });

//   const data = await response.json();
//   alert(data.message);
//   renderCalendar(currentMonth, currentYear);
// }

// async function eliminar(id) {
//   const response = await fetch(`/turnos/${id}`, {
//       method: 'DELETE',
//   });

//   const data = await response.json();
//   alert(data.message);
//   renderCalendar(currentMonth, currentYear);
// }

////////

// const calendario = document.getElementById("calendario");
// const monthScroll = document.getElementById("month-scroll");
// const detalleDia = document.getElementById("detalle-dia");
// const diaSeleccionado = document.getElementById("dia-seleccionado");
// const turnoSelect = document.getElementById("turno-select");
// const horaInicio = document.getElementById("hora-inicio");
// const horaFin = document.getElementById("hora-fin");
// const nota = document.getElementById("nota");

// let selectedDay;
// let currentMonth = new Date().getMonth();
// let currentYear = new Date().getFullYear();
// let existeRegistro = false;

// const months = [
//   "Enero",
//   "Febrero",
//   "Marzo",
//   "Abril",
//   "Mayo",
//   "Junio",
//   "Julio",
//   "Agosto",
//   "Septiembre",
//   "Octubre",
//   "Noviembre",
//   "Diciembre",
// ];

// const turnos = [
//   { nombre: "Administrativo", horas: { general: ["16:00", "22:00"] } },
//   { nombre: "Citas", horas: { general: ["03:00", "06:00"] } },
//   { nombre: "1er Turno", horas: { general: ["03:00", "06:00"] } },
//   { nombre: "2do Turno", horas: { general: ["03:00", "14:00"] } },
//   { nombre: "3er Turno", horas: { general: ["14:00", "22:00"] } },
// ];

// function renderCalendar(month, year) {
//   calendario.innerHTML = "";
//   const daysInMonth = new Date(year, month + 1, 0).getDate();
//   for (let i = 1; i <= daysInMonth; i++) {
//     const dia = createDayElement(i);
//     calendario.appendChild(dia);
//   }
// }

// function createDayElement(day) {
//   const dia = document.createElement("div");
//   dia.classList.add("dia");
//   dia.innerText = `Día ${day}`;
//   dia.addEventListener("click", () => handleDayClick(day));
//   return dia;
// }

// async function handleDayClick(day) {
//   selectedDay = day;
//   diaSeleccionado.innerText = `Día seleccionado: ${selectedDay}`;
//   detalleDia.style.display = "block";

//   populateTurnoSelect();
//   resetInputs();

//   // Verificar si existe un registro para el día seleccionado
//   const response = await fetch(`/turnos?dia=${selectedDay}`);
//   const data = await response.json();
//   existeRegistro = data.existe;

//   if (existeRegistro) {
//     turnoSelect.value = data.turno;
//     horaInicio.value = data.hora_inicio;
//     horaFin.value = data.hora_fin;
//     nota.value = data.nota;
//   }

//   toggleActionButtons(existeRegistro);
// }

// function populateTurnoSelect() {
//   turnoSelect.innerHTML = '<option value="">Seleccionar Turno</option>';
//   turnos.forEach((turno, index) => {
//     const option = document.createElement("option");
//     option.value = index;
//     option.textContent = turno.nombre;
//     turnoSelect.appendChild(option);
//   });
// }

// function resetInputs() {
//   turnoSelect.value = "";
//   horaInicio.value = "";
//   horaInicio.classList.add("hidden");
//   horaFin.value = "";
//   horaFin.classList.add("hidden");
//   nota.value = "";
// }

// function toggleActionButtons(existe) {
//   const guardarBtn = document.getElementById("guardar-btn");
//   const actualizarBtn = document.getElementById("actualizar-btn");
//   const eliminarBtn = document.getElementById("eliminar-btn");

//   guardarBtn.style.display = existe ? "none" : "inline";
//   actualizarBtn.style.display = existe ? "inline" : "none";
//   eliminarBtn.style.display = existe ? "inline" : "none";
// }

// async function guardar() {
//   const payload = {
//     dia: selectedDay,
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

//   if (data.success) {
//     existeRegistro = true;
//     renderCalendar(currentMonth, currentYear);
//     toggleActionButtons(true);
//   }
// }

// async function actualizar() {
//   const payload = {
//     dia: selectedDay,
//     turno: turnos[turnoSelect.value].nombre,
//     hora_inicio: horaInicio.value,
//     hora_fin: horaFin.value,
//     nota: nota.value,
//   };

//   const response = await fetch(`/turnos/${selectedDay}`, {
//     method: 'PUT',
//     headers: { 'Content-Type': 'application/json' },
//     body: JSON.stringify(payload),
//   });

//   const data = await response.json();
//   alert(data.message);

//   if (data.success) {
//     renderCalendar(currentMonth, currentYear);
//   }
// }

// async function eliminar() {
//   const response = await fetch(`/turnos/${selectedDay}`, {
//     method: 'DELETE',
//   });

//   const data = await response.json();
//   alert(data.message);

//   if (data.success) {
//     existeRegistro = false;
//     renderCalendar(currentMonth, currentYear);
//     toggleActionButtons(false);
//   }
// }

// function renderMonthScroll() {
//   monthScroll.innerHTML = "";
//   months.forEach((month, index) => {
//     const monthItem = document.createElement("div");
//     monthItem.classList.add("month-item");
//     monthItem.innerText = `${month} ${currentYear}`;
//     monthItem.addEventListener("click", () => {
//       currentMonth = index;
//       renderCalendar(currentMonth, currentYear);
//     });
//     monthScroll.appendChild(monthItem);
//   });
// }

// monthScroll.addEventListener("wheel", (event) => {
//   event.preventDefault();
//   currentYear += event.deltaY < 0 ? 1 : -1;
//   renderMonthScroll();
// });

// renderMonthScroll();
// renderCalendar(currentMonth, currentYear);


///////

// const calendario = document.getElementById("calendario");
// const detalleDia = document.getElementById("detalle-dia");
// const fechaSeleccionada = document.getElementById("fecha-seleccionada");
// const turnoSelect = document.getElementById("turno");
// const horaInicio = document.getElementById("horaInicio");
// const horaFin = document.getElementById("horaFin");
// const nota = document.getElementById("nota");
// const guardarBtn = document.getElementById("guardar");
// const actualizarBtn = document.getElementById("actualizar");
// const eliminarBtn = document.getElementById("eliminar");

// async function renderCalendar(month, year) {
//   calendario.innerHTML = "";
//   const daysInMonth = new Date(year, month + 1, 0).getDate();

//   for (let i = 1; i <= daysInMonth; i++) {
//     const dia = document.createElement("div");
//     dia.classList.add("dia");
//     dia.innerText = `Día ${i}`;
//     dia.addEventListener("click", async () => {
//       const selectedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
//       await cargarDetalles(selectedDate);
//     });
//     calendario.appendChild(dia);
//   }
// }

// async function cargarDetalles(fecha) {
//   const response = await fetch(`/turnos/${fecha}`);
//   const turno = await response.json();

//   fechaSeleccionada.innerText = `Fecha: ${fecha}`;

//   if (turno) {
//     turnoSelect.value = turno.turno;
//     horaInicio.value = turno.hora_inicio;
//     horaFin.value = turno.hora_fin;
//     nota.value = turno.nota;
//     actualizarBtn.style.display = "inline-block";
//     eliminarBtn.style.display = "inline-block";
//     guardarBtn.style.display = "none";
//   } else {
//     turnoSelect.value = "";
//     horaInicio.value = "";
//     horaFin.value = "";
//     nota.value = "";
//     guardarBtn.style.display = "inline-block";
//     actualizarBtn.style.display = "none";
//     eliminarBtn.style.display = "none";
//   }
// }

// // Inicializar el calendario
// const currentYear = new Date().getFullYear();
// const currentMonth = new Date().getMonth();
// renderCalendar(currentMonth, currentYear);


// document.addEventListener("DOMContentLoaded", () => {
//   // Elementos principales
//   const calendario = document.getElementById("calendario");
//   const detalleDia = document.getElementById("detalle-dia");
//   const diaSeleccionado = document.getElementById("dia-seleccionado");
//   const turnoSelect = document.getElementById("turno-select");
//   const horaInicio = document.getElementById("hora-inicio");
//   const horaFin = document.getElementById("hora-fin");
//   const nota = document.getElementById("nota");
//   const guardarBtn = document.querySelector(".boton[onclick='guardar()']");
//   const actualizarBtn = document.querySelector(".boton[onclick='actualizar()']");
//   const eliminarBtn = document.querySelector(".boton[onclick='eliminar()']");

//   // Renderiza el calendario para un mes y año dados
//   async function renderCalendar(month, year) {
//       calendario.innerHTML = ""; // Limpia el contenido actual del calendario

//       const daysInMonth = new Date(year, month + 1, 0).getDate(); // Días en el mes actual
//       for (let i = 1; i <= daysInMonth; i++) {
//           const dia = document.createElement("div");
//           dia.classList.add("dia", "border", "p-2", "rounded", "cursor-pointer", "text-center");
//           dia.innerText = i;

//           // Evento al hacer clic en un día
//           dia.addEventListener("click", async () => {
//               const selectedDate = `${year}-${String(month + 1).padStart(2, '0')}-${String(i).padStart(2, '0')}`;
//               await cargarDetalles(selectedDate); // Carga detalles del día seleccionado
//           });

//           calendario.appendChild(dia);
//       }
//   }

//   // Cargar los detalles de un día seleccionado desde la base de datos
//   async function cargarDetalles(fecha) {
//       const response = await fetch(`/turnos/${fecha}`);
//       const turno = await response.json();

//       diaSeleccionado.innerText = `Día Seleccionado: ${fecha}`;
//       detalleDia.classList.remove("hidden"); // Muestra la sección de detalles del día

//       if (turno) {
//           // Si hay un turno en la base de datos, llena los campos
//           turnoSelect.value = turno.turno || "";
//           horaInicio.value = turno.hora_inicio || "";
//           horaFin.value = turno.hora_fin || "";
//           nota.value = turno.nota || "";

//           // Configura los botones
//           guardarBtn.classList.add("hidden");
//           actualizarBtn.classList.remove("hidden");
//           eliminarBtn.classList.remove("hidden");
//       } else {
//           // Si no hay turno, limpia los campos
//           turnoSelect.value = "";
//           horaInicio.value = "";
//           horaFin.value = "";
//           nota.value = "";

//           // Configura los botones
//           guardarBtn.classList.remove("hidden");
//           actualizarBtn.classList.add("hidden");
//           eliminarBtn.classList.add("hidden");
//       }
//   }

//   // Función para guardar un nuevo turno
//   async function guardar() {
//       const fecha = diaSeleccionado.innerText.split(": ")[1];
//       const datos = {
//           turno: turnoSelect.value,
//           hora_inicio: horaInicio.value,
//           hora_fin: horaFin.value,
//           nota: nota.value,
//       };

//       const response = await fetch(`/turnos/${fecha}`, {
//           method: "POST",
//           headers: { "Content-Type": "application/json" },
//           body: JSON.stringify(datos),
//       });

//       if (response.ok) {
//           alert("Turno guardado correctamente");
//           await cargarDetalles(fecha); // Recarga los detalles
//       } else {
//           alert("Error al guardar el turno");
//       }
//   }

//   // Función para actualizar un turno existente
//   async function actualizar() {
//       const fecha = diaSeleccionado.innerText.split(": ")[1];
//       const datos = {
//           turno: turnoSelect.value,
//           hora_inicio: horaInicio.value,
//           hora_fin: horaFin.value,
//           nota: nota.value,
//       };

//       const response = await fetch(`/turnos/${fecha}`, {
//           method: "PUT",
//           headers: { "Content-Type": "application/json" },
//           body: JSON.stringify(datos),
//       });

//       if (response.ok) {
//           alert("Turno actualizado correctamente");
//           await cargarDetalles(fecha); // Recarga los detalles
//       } else {
//           alert("Error al actualizar el turno");
//       }
//   }

//   // Función para eliminar un turno
//   async function eliminar() {
//       const fecha = diaSeleccionado.innerText.split(": ")[1];

//       const response = await fetch(`/turnos/${fecha}`, {
//           method: "DELETE",
//       });

//       if (response.ok) {
//           alert("Turno eliminado correctamente");
//           detalleDia.classList.add("hidden"); // Oculta los detalles
//           renderCalendar(currentMonth, currentYear); // Recarga el calendario
//       } else {
//           alert("Error al eliminar el turno");
//       }
//   }

//   // Inicializar el calendario
//   const currentYear = new Date().getFullYear();
//   const currentMonth = new Date().getMonth();
//   renderCalendar(currentMonth, currentYear);
// });


////

// document.addEventListener("DOMContentLoaded", () => {
//   Elementos principales
//   const calendario = document.getElementById("calendario");
//   const monthScroll = document.getElementById("month-scroll");
//   const detalleDia = document.getElementById("detalle-dia");
//   const diaSeleccionado = document.getElementById("dia-seleccionado");
//   const turnoSelect = document.getElementById("turno-select");
//   const horaInicio = document.getElementById("hora-inicio");
//   const horaFin = document.getElementById("hora-fin");
//   const nota = document.getElementById("nota");
//   let selectedDay;
//   let selectedTurno;
//   let existeRegistro = false;

//   const months = [
//     "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", 
//     "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
//   ];

//   const turnos = [
//     { nombre: "Administrativo", horas: { general: ["16:00", "22:00"] } },
//     { nombre: "Citas", horas: { general: ["03:00", "06:00"] } },
//     { nombre: "1er Turno", horas: { general: ["03:00", "06:00"] } },
//     { nombre: "2do Turno", horas: { general: ["03:00", "14:00"] } },
//     { nombre: "3er Turno", horas: { general: ["14:00", "22:00"] } }
//   ];

//   let currentMonth = new Date().getMonth();
//   let currentYear = new Date().getFullYear();

//   Función para renderizar el calendario
//   function renderCalendar(month, year) {
//     calendario.innerHTML = "";
//     const daysInMonth = new Date(year, month + 1, 0).getDate();

//     for (let i = 1; i <= daysInMonth; i++) {
//       const dia = document.createElement("div");
//       dia.classList.add("dia");
//       dia.innerText = `Día ${i}`;

//       dia.addEventListener("click", () => {
//         selectedDay = i;
//         const selectedMonth = months[month];
//         const selectedYear = year;
//         diaSeleccionado.innerText = `Fecha: ${selectedDay} de ${selectedMonth} de ${selectedYear}`;
//         detalleDia.style.display = "block";
//         populateTurnoSelect();
//         resetInputs();
//         checkRegistro(selectedDay, turnoSelect.value);
//       });

//       calendario.appendChild(dia);
//     }
//   }

//   Función para llenar el selector de turnos
//   function populateTurnoSelect() {
//     turnoSelect.innerHTML = '<option value="">Seleccionar Turno</option>';
//     turnos.forEach((turno, index) => {
//       const option = document.createElement("option");
//       option.value = index;
//       option.textContent = turno.nombre;
//       turnoSelect.appendChild(option);
//     });
//   }

//   Función para resetear los inputs
//   function resetInputs() {
//     turnoSelect.value = "";
//     horaInicio.value = "";
//     horaInicio.classList.add("hidden");
//     horaFin.value = "";
//     horaFin.classList.add("hidden");
//     nota.value = "";
//   }

//   Verificar si existe un registro para el día seleccionado
//   function checkRegistro(dia, turnoIndex) {
//     Simulación de registro existente con 50% de probabilidad
//     const existe = Math.random() < 0.5;
//     existeRegistro = existe;
//     toggleActionButtons(existeRegistro);
//   }

//   Mostrar u ocultar los botones según exista o no un registro
//   function toggleActionButtons(existe) {
//     const buttons = document.querySelectorAll(".actions button");
//     buttons[1].style.display = existe ? "inline" : "none"; // Botón Actualizar
//     buttons[2].style.display = existe ? "inline" : "none"; // Botón Eliminar
//   }

//   Enviar solicitud para guardar, actualizar o eliminar
//   function enviarSolicitud(accion) {
//     if (!validarFormulario()) return;

//     const params = new URLSearchParams({
//       dia: selectedDay,
//       turno: turnos[turnoSelect.value].nombre,
//       hora_inicio: horaInicio.value,
//       hora_fin: horaFin.value,
//       nota: nota.value,
//       accion: accion,
//     });

//     fetch("index.php", {
//       method: "POST",
//       headers: { "Content-Type": "application/x-www-form-urlencoded" },
//       body: params,
//     })
//     .then((response) => response.text())
//     .then((data) => alert(data))
//     .catch((error) => console.error("Error:", error));
//   }

//   Función para validar formulario
//   function validarFormulario() {
//     if (!turnoSelect.value || !horaInicio.value || !horaFin.value) {
//       alert("Por favor, completa todos los campos antes de guardar.");
//       return false;
//     }
//     return true;
//   }

//   Función para guardar turno
//   async function guardar() {
//     const payload = {
//       fecha: `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(selectedDay).padStart(2, '0')}`,
//       turno: turnos[turnoSelect.value].nombre,
//       hora_inicio: horaInicio.value,
//       hora_fin: horaFin.value,
//       nota: nota.value,
//     };

//     const response = await fetch('/turnos', {
//       method: 'POST',
//       headers: { 'Content-Type': 'application/json' },
//       body: JSON.stringify(payload),
//     });

//     const data = await response.json();
//     alert(data.message);
//   }

//   Función para actualizar turno
//   async function actualizar() {
//     enviarSolicitud("actualizar");
//   }

//   Función para eliminar turno
//   async function eliminar() {
//     enviarSolicitud("eliminar");
//   }

//   Función para cambiar de año con el scroll
//   function changeYear(offset) {
//     currentYear += offset;
//     renderMonthScroll();
//     renderCalendar(currentMonth, currentYear);
//   }

//   Función para renderizar la navegación entre meses
//   function renderMonthScroll() {
//     monthScroll.innerHTML = "";
//     months.forEach((month, index) => {
//       const monthItem = document.createElement("div");
//       monthItem.classList.add("month-item");
//       monthItem.innerText = `${month} ${currentYear}`;
//       monthItem.addEventListener("click", () => {
//         currentMonth = index;
//         renderCalendar(currentMonth, currentYear);
//       });
//       monthScroll.appendChild(monthItem);
//     });
//   }

//   Escuchar evento de desplazamiento del mes
//   monthScroll.addEventListener("wheel", (event) => {
//     event.preventDefault();
//     currentYear += event.deltaY < 0 ? 1 : -1;
//     renderMonthScroll();
//   });

//   Inicialización del calendario y la vista de mes
//   renderMonthScroll();
//   renderCalendar(currentMonth, currentYear);
// });