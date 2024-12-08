<x-layout meta-titlle="Contact title" meta-description="Contact description">
     <!-- Sección de Contacto -->
     <section class="py-10">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold text-gray-800 dark:text-gray-200 text-center mb-8">Contáctanos</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <!-- Información de Contacto -->
                <div class="space-y-6">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200">Información de contacto</h3>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Estamos aquí para ayudarte. Si tienes alguna pregunta o inquietud, no dudes en comunicarte con nosotros:</p>

                    <div>
                        <p class="text-lg text-gray-600 dark:text-gray-400"><strong>Teléfono:</strong> +34 123 456 789</p>
                        <p class="text-lg text-gray-600 dark:text-gray-400"><strong>Correo Electrónico:</strong> contacto@empresa.com</p>
                        <p class="text-lg text-gray-600 dark:text-gray-400"><strong>Dirección:</strong> Calle Ejemplo 123, Madrid, España</p>
                    </div>
                </div>

                <!-- Formulario de Contacto -->
                <div class="bg-gray-50 p-6 rounded-lg shadow-md">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-800 mb-4">Envíanos un mensaje</h3>
                    <form action="/send-message" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label for="name" class="block text-lg font-medium text-gray-700">Tu Nombre</label>
                                <input type="text" id="name" name="name" class="w-full p-3 border border-gray-300 rounded-md" required>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-lg font-medium text-gray-700">Tu Correo Electrónico</label>
                                <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-md" required>
                            </div>

                            <div>
                                <label for="message" class="block text-lg font-medium text-gray-700">Tu Mensaje</label>
                                <textarea id="message" name="message" rows="4" class="w-full p-3 border border-gray-300 rounded-md" required></textarea>
                            </div>

                            <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition duration-300">Enviar Mensaje</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</x-layout> 