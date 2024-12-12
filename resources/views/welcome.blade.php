<x-layout meta-titlle="Home title" meta-description="Home description">

 <!-- Contenedor principal -->
 <section class="flex items-center justify-between px-10 py-20 ">
    <!-- Imagen a la izquierda -->
    <div class="">
        <img src="{{ asset('storage\img\calendar.jpg') }}" alt="Imagen" class="w-4/5 h-auto rounded shadow-md">
    </div>

    <!-- Texto a la derecha -->
    <div class="w-1/2 pl-10">
        <h1 class="text-4xl font-semibold text-gray-800 dark:text-gray-200 mb-4">
            Bienvenido a Nuestro Servicio
        </h1>wd
        <p class="text-lg text-gray-800 dark:text-gray-300 mb-6">
            Dudas de tus horas laborales, nosotros te ayudamos a organizarlas.
        </p>
        <a href="#cta" class="bg-blue-600 text-white px-6 py-3 no-underline rounded-lg shadow-md hover:bg-blue-700 transition duration-300">¡Comienza Ahora!</a>
    </div>
</section>

    
    

</x-layout>
