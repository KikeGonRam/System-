<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal Educativo Integrado</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@500;600;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    :root {
      /* Light Theme */
      --primary: #1e40af;
      --secondary: #3b82f6;
      --accent: #93c5fd;
      --background: #f1f5f9;
      --card-bg: #ffffff;
      --text: #1e293b;
      --subtext: #64748b;
      --shadow: rgba(0, 0, 0, 0.15);
      --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
      --preescolar: #f59e0b;
      --primaria: #22d3ee;
      --secundaria: #8b5cf6;
      --preparatoria: #ec4899;
      --universidad: #3b82f6;
    }

    [data-theme="dark"] {
      /* Dark Theme */
      --primary: #60a5fa;
      --secondary: #93c5fd;
      --accent: #1e40af;
      --background: #1e293b;
      --card-bg: #2d3748;
      --text: #f1f5f9;
      --subtext: #94a3b8;
      --shadow: rgba(0, 0, 0, 0.3);
      --gradient: linear-gradient(135deg, var(--primary), var(--secondary));
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    body {
      background: var(--gradient);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .container {
      width: 95%;
      max-width: 1200px;
      background: var(--card-bg);
      border-radius: 20px;
      box-shadow: 0 15px 40px var(--shadow);
      padding: 3rem;
      position: relative;
      overflow: hidden;
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .header {
      text-align: center;
      margin-bottom: 3rem;
      position: relative;
    }

    .theme-toggle {
      position: absolute;
      top: 1rem;
      right: 1rem;
      background: none;
      border: none;
      cursor: pointer;
      font-size: 1.5rem;
      color: var(--text);
      transition: transform 0.3s ease;
    }

    .theme-toggle:hover {
      transform: rotate(180deg);
    }

    .logo {
      background: var(--gradient);
      color: var(--card-bg);
      width: 100px;
      height: 100px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 3rem;
      margin: 0 auto 1.5rem;
      box-shadow: 0 5px 20px var(--shadow);
      transition: transform 0.4s ease;
    }

    .logo:hover {
      transform: rotate(360deg) scale(1.1);
    }

    h1 {
      font-family: 'Poppins', sans-serif;
      font-size: 2.8rem;
      color: var(--text);
      margin-bottom: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 1.5px;
    }

    .subtitle {
      color: var(--subtext);
      font-size: 1.2rem;
      font-weight: 500;
    }

    .level-selector {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 20px;
      margin: 3rem 0;
    }

    .level-btn {
      padding: 14px 28px;
      border: none;
      border-radius: 50px;
      font-size: 1.1rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      z-index: 1;
      color: var(--card-bg);
    }

    .level-btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: var(--accent);
      transition: left 0.3s ease;
      z-index: -1;
    }

    .level-btn:hover::before {
      left: 0;
    }

    .level-btn:hover {
      color: var(--text);
      transform: scale(1.05);
    }

    .level-btn.preescolar { background: var(--preescolar); }
    .level-btn.primaria { background: var(--primaria); }
    .level-btn.secundaria { background: var(--secundaria); }
    .level-btn.preparatoria { background: var(--preparatoria); }
    .level-btn.universidad { background: var(--universidad); }

    .level-btn[aria-label]:hover::after {
      content: attr(aria-label);
      position: absolute;
      top: -40px;
      left: 50%;
      transform: translateX(-50%);
      background: var(--primary);
      color: var(--card-bg);
      padding: 8px 12px;
      border-radius: 8px;
      font-size: 0.9rem;
      white-space: nowrap;
      z-index: 10;
    }

    .user-types {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2.5rem;
      margin-bottom: 3rem;
    }

    .user-card {
      background: var(--card-bg);
      border-radius: 20px;
      padding: 2.5rem;
      text-align: center;
      transition: all 0.4s ease;
      position: relative;
      overflow: hidden;
      box-shadow: 0 10px 25px var(--shadow);
    }

    .user-card::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.2), transparent);
      transition: all 0.5s ease;
    }

    .user-card:hover::before {
      transform: translate(25%, 25%);
    }

    .user-card:hover {
      transform: translateY(-12px) scale(1.03);
      box-shadow: 0 25px 50px var(--shadow);
    }

    .user-card i {
      font-size: 3.5rem;
      margin-bottom: 1.5rem;
      color: var(--primary);
      transition: color 0.3s ease, transform 0.3s ease;
    }

    .user-card:hover i {
      color: var(--secondary);
      transform: scale(1.2);
    }

    .user-card h3 {
      font-family: 'Poppins', sans-serif;
      color: var(--text);
      font-size: 1.7rem;
      margin-bottom: 0.75rem;
    }

    .user-card p {
      font-size: 1rem;
      color: var(--subtext);
      margin-bottom: 1.5rem;
    }

    .btn {
      background: var(--gradient);
      color: var(--card-bg);
      border: none;
      padding: 0.9rem 2rem;
      border-radius: 50px;
      text-decoration: none;
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size: 1.1rem;
      transition: all 0.3s ease;
      position: relative;
      z-index: 1;
      overflow: hidden;
    }

    .btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: var(--accent);
      transition: left 0.3s ease;
      z-index: -1;
    }

    .btn:hover::before {
      left: 0;
    }

    .btn:hover {
      color: var(--text);
      transform: scale(1.1);
    }

    .footer {
      text-align: center;
      margin-top: 3rem;
      font-size: 0.95rem;
      color: var(--subtext);
      font-weight: 500;
    }

    .confetti {
      position: fixed;
      width: 12px;
      height: 12px;
      background: var(--accent);
      border-radius: 50%;
      animation: confettiFall 6s ease-in-out infinite;
      z-index: -1;
      pointer-events: none;
    }

    @keyframes confettiFall {
      0% { transform: translateY(-100vh) rotate(0deg); opacity: 1; }
      100% { transform: translateY(100vh) rotate(1080deg); opacity: 0; }
    }

    @media (max-width: 768px) {
      .container { padding: 2rem; }
      h1 { font-size: 2.2rem; }
      .logo { width: 80px; height: 80px; font-size: 2.5rem; }
      .user-card { padding: 2rem; }
      .btn { padding: 0.8rem 1.8rem; font-size: 1rem; }
      .level-btn { padding: 12px 24px; font-size: 1rem; }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <button class="theme-toggle" aria-label="Cambiar tema">
        <i class="fas fa-moon"></i>
      </button>
      <div class="logo"><i class="fas fa-graduation-cap"></i></div>
      <h1>Portal Educativo Integrado</h1>
      <p class="subtitle">¡Tu plataforma para aprender, enseñar y gestionar con facilidad!</p>
    </div>

    <div class="level-selector">
      <button class="level-btn preescolar" aria-label="Explora el nivel Preescolar">Preescolar</button>
      <button class="level-btn primaria" aria-label="Explora el nivel Primaria">Primaria</button>
      <button class="level-btn secundaria" aria-label="Explora el nivel Secundaria">Secundaria</button>
      <button class="level-btn preparatoria" aria-label="Explora el nivel Preparatoria">Preparatoria</button>
      <button class="level-btn universidad" aria-label="Explora el nivel Universidad">Universidad</button>
    </div>

    <div class="user-types">
      <div class="user-card">
        <i class="fas fa-user-graduate"></i>
        <h3>Estudiantes</h3>
        <p>Accede a tus clases, revisa calificaciones y mantente al día con tu progreso.</p>
        <a href="#" class="btn">¡Explorar Ahora!</a>
      </div>
      <div class="user-card">
        <i class="fas fa-chalkboard-teacher"></i>
        <h3>Docentes</h3>
        <p>Organiza tus clases, crea actividades y registra asistencias fácilmente.</p>
        <a href="#" class="btn">¡Comenzar!</a>
      </div>
      <div class="user-card">
        <i class="fas fa-users-cog"></i>
        <h3>Administradores</h3>
        <p>Gestiona usuarios, niveles educativos y genera reportes avanzados.</p>
        <a href="#" class="btn">¡Administrar!</a>
      </div>
    </div>

    <div class="footer">
      © 2025 Sistema de Gestión Escolar. Diseñado con 💙 para transformar la educación.
    </div>
  </div>

  <script>
    // Theme Toggle
    const themeToggle = document.querySelector('.theme-toggle');
    const body = document.body;
    const themeIcon = themeToggle.querySelector('i');

    // Load saved theme
    if (localStorage.getItem('theme') === 'dark') {
      body.setAttribute('data-theme', 'dark');
      themeIcon.classList.replace('fa-moon', 'fa-sun');
    }

    themeToggle.addEventListener('click', () => {
      const isDark = body.getAttribute('data-theme') === 'dark';
      body.setAttribute('data-theme', isDark ? 'light' : 'dark');
      themeIcon.classList.toggle('fa-moon', isDark);
      themeIcon.classList.toggle('fa-sun', !isDark);
      localStorage.setItem('theme', isDark ? 'light' : 'dark');
    });

    // Confetti Effect
    function createConfetti() {
      const confetti = document.createElement('div');
      confetti.className = 'confetti';
      confetti.style.left = Math.random() * 100 + 'vw';
      confetti.style.background = ['var(--preescolar)', 'var(--primaria)', 'var(--secundaria)', 'var(--preparatoria)', 'var(--universidad)'][Math.floor(Math.random() * 5)];
      confetti.style.width = Math.random() * 8 + 8 + 'px';
      confetti.style.height = confetti.style.width;
      document.body.appendChild(confetti);
      setTimeout(() => confetti.remove(), 6000);
    }

    setInterval(createConfetti, 200);

    // Button Click Animation
    document.querySelectorAll('.level-btn, .btn').forEach(btn => {
      btn.addEventListener('click', (e) => {
        e.preventDefault();
        btn.style.transform = 'scale(0.95)';
        setTimeout(() => {
          btn.style.transform = 'scale(1)';
        }, 100);
      });
    });
  </script>
</body>
</html>