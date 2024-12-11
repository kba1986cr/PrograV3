<x-layout meta-titlle="About title" meta-description="About description"> 

    <div id="calendar"></div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const calendarEl = document.getElementById('calendar');

            const calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth', // Vista predeterminada
                selectable: true,            // Permitir selección de días
                headerToolbar: {             // Barra de herramientas
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    locale: 'es',
                },
                select: function (info) {    // Acción al seleccionar días
                    fetch('{{ route('calendar.store') }}', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            start: info.startStr,
                            end: info.endStr
                        })
                    })
                    .then(response => response.json())
                    .then(data => {
                        alert(`Seleccionaste desde ${data.start} hasta ${data.end}`);
                    })
                    .catch(error => console.error('Error:', error));
                }
            });

            calendar.render();
        });
    </script>

</x-layout>