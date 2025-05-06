<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Escolar - Prueba</title>
    <!-- Incluimos Tailwind CSS desde CDN para estilizar -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Opcional: Agregamos una fuente moderna desde Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        /* Animación sutil para el título */
        .animate-title {
            animation: fadeIn 1s ease-in-out;
        }
        @keyframes fadeIn {
            0% { opacity: 0; transform: translateY(-20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center">
    <div class="container mx-auto p-6 bg-white rounded-xl shadow-lg max-w-2xl">
        <!-- Título con estilo dinámico y animación -->
        <h1 class="text-4xl font-bold text-blue-700 mb-4 animate-title text-center">
            {{ $mensaje }}
        </h1>
        <!-- Párrafo con mejor tipografía y espaciado -->
        <p class="text-lg text-gray-600 text-center">
            Este es el inicio de nuestro sistema escolar. ¡Prepárate para una experiencia educativa increíble!
        </p>
        <!-- Botón decorativo para darle interactividad -->
        <div class="mt-6 text-center">
            <a href="#" class="inline-block bg-blue-600 text-white font-semibold py-2 px-6 rounded-lg hover:bg-blue-700 transition duration-300">
                Explorar Sistema
            </a>
        </div>
    </div>
</body>
</html>