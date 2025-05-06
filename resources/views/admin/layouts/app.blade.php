<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Sistema Escolar - Admin')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

    <!-- Iconos con Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen font-[Poppins] text-gray-800">

    <!-- Contenido -->
    <div class="flex items-center justify-center min-h-screen px-4">
        @yield('content')
    </div>

    <!-- Scripts adicionales desde vistas -->
    @yield('scripts')

    <!-- Script de cierre de sesión por inactividad -->
    <script>
        let timeout;
        const minutes = 5;
        const redirectUrl = '/logout';

        function resetTimer() {
            clearTimeout(timeout);
            timeout = setTimeout(() => {
                alert('Sesión cerrada por inactividad');
                window.location.href = redirectUrl;
            }, minutes * 60 * 1000);
        }

        ['click', 'mousemove', 'keydown', 'scroll', 'touchstart'].forEach(evt =>
            window.addEventListener(evt, resetTimer)
        );
        resetTimer();
    </script>

    <!-- Script de bloqueo por intentos fallidos de login -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const MAX_ATTEMPTS = 3;
            const LOCK_TIME_MINUTES = 3;
            const lockKey = 'login_locked_until';
            const attemptsKey = 'login_attempts';

            const form = document.querySelector('form[data-login]');
            const errorDisplay = document.createElement('p');
            errorDisplay.className = 'text-red-500 mt-2 text-sm';

            const now = Date.now();
            const lockedUntil = localStorage.getItem(lockKey);

            if (lockedUntil && now < parseInt(lockedUntil)) {
                const remaining = Math.ceil((parseInt(lockedUntil) - now) / 60000);
                showError(`Demasiados intentos. Intenta nuevamente en ${remaining} minuto(s).`);
                if (form) form.querySelector('button[type="submit"]').disabled = true;
            }

            function showError(message) {
                errorDisplay.textContent = message;
                if (form && !form.contains(errorDisplay)) {
                    form.appendChild(errorDisplay);
                }
            }

            if (form) {
                form.addEventListener('submit', (e) => {
                    const attempts = parseInt(localStorage.getItem(attemptsKey)) || 0;

                    if (lockedUntil && Date.now() < parseInt(lockedUntil)) {
                        e.preventDefault();
                        showError('Intento bloqueado. Espera 3 minutos.');
                        return;
                    }

                    // Simula fallo de login: reemplaza esto con lógica real
                    const isValid = false; // Cambiar a true si validación es exitosa

                    if (!isValid) {
                        e.preventDefault();
                        const newAttempts = attempts + 1;
                        localStorage.setItem(attemptsKey, newAttempts);
                        if (newAttempts >= MAX_ATTEMPTS) {
                            const unlockTime = Date.now() + LOCK_TIME_MINUTES * 60 * 1000;
                            localStorage.setItem(lockKey, unlockTime);
                            localStorage.setItem(attemptsKey, 0);
                            showError('Demasiados intentos. Intenta de nuevo en 3 minutos.');
                            form.querySelector('button[type="submit"]').disabled = true;
                        } else {
                            showError(`Credenciales incorrectas. Intento ${newAttempts} de ${MAX_ATTEMPTS}.`);
                        }
                    }
                });
            }
        });
    </script>
</body>
</html>
