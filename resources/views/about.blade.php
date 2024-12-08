<x-layout meta-titlle="About title" meta-description="About description"> 

    <div class="mx-auto mt-4 max-w-6xl">
        <h1 class="my-4 text-3xl font-semibold text-center black  ">Acerca de nosotros</h1>
    </div>
    
    <div class="mx-auto mt-4 max-w-6xl">
        <p class="my-4 text-1xl text-center black  ">Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit amet consectetur adipisicing elit
        </p>
    </div>
    
    <div class="flex items-center justify-between max-w-4xl mx-auto p-7 gap-8 rounded-lg shadow-md">

    {{-- Izquierda --}}
    <img src="{{ asset('storage\img\yo.jpg') }}" alt="yo" class="w-80 h-96 object-cover rounded">
    
    {{-- Derecha --}}
    <img src="{{ asset('storage\img\harold.jpg') }}" alt="harold" class="w-80 h-96 object-cover rounded">
        </div>
</x-layout>