<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Portal Educativo Integrado</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    :root {
      --primary: #005f73;
      --secondary: #0a9396;
      --accent: #94d2bd;
      --background: #f0f5f9;
      --text: #1e293b;
      --light: #ffffff;
      --preescolar: #ff9e00;
      --primaria: #00b4d8;
      --secundaria: #7209b7;
      --preparatoria: #f72585;
      --universidad: #3a86ff;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Inter', sans-serif;
    }

    body {
      background-color: var(--background);
      background-image: radial-gradient(circle at 10% 20%, rgba(0, 95, 115, 0.05) 0%, rgba(10, 147, 150, 0.03) 90%);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .container {
      width: 95%;
      max-width: 1200px;
      background-color: var(--light);
      border-radius: 24px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
      padding: 2.5rem;
      position: relative;
      overflow: hidden;
    }

    .container::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 8px;
      background: linear-gradient(90deg, var(--preescolar), var(--primaria), var(--secundaria), var(--preparatoria), var(--universidad));
    }

    .header {
      text-align: center;
      margin-bottom: 3rem;
      position: relative;
    }

    .header::after {
      content: "";
      position: absolute;
      bottom: -1.5rem;
      left: 50%;
      transform: translateX(-50%);
      width: 100px;
      height: 3px;
      background: var(--accent);
    }

    .logo-container {
      position: relative;
      width: 100px;
      height: 100px;
      margin: 0 auto 1.5rem;
    }

    .logo-bg {
      position: absolute;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      background: var(--primary);
      display: flex;
      justify-content: center;
      align-items: center;
      box-shadow: 0 10px 25px rgba(0, 95, 115, 0.2);
      animation: pulse 2s infinite;
    }

    .logo-icon {
      color: white;
      font-size: 2.5rem;
      z-index: 2;
      position: relative;
    }

    .logo-ring {
      position: absolute;
      width: 120%;
      height: 120%;
      border: 2px dashed var(--accent);
      border-radius: 50%;
      top: -10%;
      left: -10%;
      animation: rotate 20s linear infinite;
    }

    @keyframes rotate {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }

    @keyframes pulse {
      0% { transform: scale(1); }
      50% { transform: scale(1.05); }
      100% { transform: scale(1); }
    }

    h1 {
      font-family: 'Playfair Display', serif;
      font-size: 2.5rem;
      color: var(--text);
      margin-bottom: 0.5rem;
      text-shadow: 1px 1px 0px rgba(0, 0, 0, 0.05);
    }

    .subtitle {
      color: #64748b;
      font-size: 1.1rem;
      max-width: 600px;
      margin: 0 auto;
    }

    .level-selector {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 15px;
      margin: 3rem 0;
    }

    .level-btn {
      padding: 10px 22px;
      border: none;
      border-radius: 30px;
      background: #f1f5f9;
      font-size: 0.95rem;
      font-weight: 600;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      position: relative;
      overflow: hidden;
    }

    .level-btn::before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
      transition: 0.5s;
    }

    .level-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    }

    .level-btn:hover::before {
      left: 100%;
    }

    .level-btn.preescolar:hover { background-color: var(--preescolar); color: white; }
    .level-btn.primaria:hover { background-color: var(--primaria); color: white; }
    .level-btn.secundaria:hover { background-color: var(--secundaria); color: white; }
    .level-btn.preparatoria:hover { background-color: var(--preparatoria); color: white; }
    .level-btn.universidad:hover { background-color: var(--universidad); color: white; }

    .user-types {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
    }

    .user-card {
      background: #ffffff;
      border-radius: 16px;
      padding: 2rem;
      text-align: center;
      transition: all 0.4s;
      position: relative;
      border: 1px solid #f1f5f9;
    }

    .user-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM12 60c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%23f0f5f9' fill-opacity='0.6' fill-rule='evenodd'/%3E%3C/svg%3E");
      opacity: 0.5;
      border-radius: 16px;
      z-index: 0;
    }

    .user-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
      border-color: var(--accent);
    }

    .icon-wrapper {
      width: 80px;
      height: 80px;
      background: linear-gradient(135deg, var(--secondary), var(--primary));
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 1.5rem;
      position: relative;
      z-index: 1;
      box-shadow: 0 10px 20px rgba(10, 147, 150, 0.2);
    }

    .user-card:hover .icon-wrapper {
      transform: scale(1.1);
    }

    .user-card i {
      font-size: 2.5rem;
      color: white;
    }

    .user-card h3 {
      color: var(--text);
      font-size: 1.4rem;
      margin-bottom: 1rem;
      position: relative;
      z-index: 1;
    }

    .user-card p {
      font-size: 1rem;
      color: #6b7280;
      margin-bottom: 1.5rem;
      position: relative;
      z-index: 1;
    }

    .btn {
      background: linear-gradient(135deg, var(--primary), var(--secondary));
      color: white;
      border: none;
      padding: 0.75rem 1.5rem;
      border-radius: 30px;
      text-decoration: none;
      font-weight: 600;
      font-size: 1rem;
      transition: all 0.3s;
      position: relative;
      z-index: 1;
      box-shadow: 0 5px 15px rgba(0, 95, 115, 0.2);
      display: inline-block;
    }

    .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(0, 95, 115, 0.3);
    }

    .ancient-motif {
      position: absolute;
      width: 200px;
      height: 200px;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='200' height='200' viewBox='0 0 200 200'%3E%3Cg fill='none' stroke='%2394d2bd' stroke-width='1' opacity='0.2'%3E%3Ccircle cx='100' cy='100' r='90'/%3E%3Ccircle cx='100' cy='100' r='70'/%3E%3Ccircle cx='100' cy='100' r='50'/%3E%3Ccircle cx='100' cy='100' r='30'/%3E%3Cpath d='M100,10 L100,190 M10,100 L190,100 M29.29,29.29 L170.71,170.71 M29.29,170.71 L170.71,29.29'/%3E%3C/g%3E%3C/svg%3E");
      opacity: 0.1;
      z-index: 0;
    }

    .motif-1 {
      top: -100px;
      left: -100px;
    }

    .motif-2 {
      bottom: -100px;
      right: -100px;
    }

    .footer {
      text-align: center;
      margin-top: 3rem;
      padding-top: 1rem;
      border-top: 1px solid #e2e8f0;
      font-size: 0.9rem;
      color: #94a3b8;
      position: relative;
      z-index: 1;
    }

    .social-links {
      display: flex;
      justify-content: center;
      gap: 1rem;
      margin-top: 1rem;
    }

    .social-links a {
      color: var(--primary);
      font-size: 1.2rem;
      transition: 0.3s;
    }

    .social-links a:hover {
      color: var(--secondary);
      transform: translateY(-3px);
    }

    @media (max-width: 768px) {
      .container {
        padding: 1.5rem;
      }
      
      h1 {
        font-size: 2rem;
      }
      
      .level-selector {
        gap: 10px;
      }
      
      .level-btn {
        padding: 8px 16px;
        font-size: 0.85rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="ancient-motif motif-1"></div>
    <div class="ancient-motif motif-2"></div>
    
    <div class="header">
      <div class="logo-container">
        <div class="logo-ring"></div>
        <div class="logo-bg">
          <i class="fas fa-school logo-icon"></i>
        </div>
      </div>
      <h1>Portal Educativo Integrado</h1>
      <p class="subtitle">Uniendo la sabiduría tradicional con las tecnologías del futuro para una experiencia educativa completa</p>
    </div>

    <div class="level-selector">
      <button class="level-btn preescolar"><i class="fas fa-baby fa-sm mr-2"></i> Preescolar</button>
      <button class="level-btn primaria"><i class="fas fa-child fa-sm mr-2"></i> Primaria</button>
      <button class="level-btn secundaria"><i class="fas fa-user fa-sm mr-2"></i> Secundaria</button>
      <button class="level-btn preparatoria"><i class="fas fa-user-graduate fa-sm mr-2"></i> Preparatoria</button>
      <button class="level-btn universidad"><i class="fas fa-university fa-sm mr-2"></i> Universidad</button>
    </div>

    <div class="user-types">
      <div class="user-card">
        <div class="icon-wrapper">
          <i class="fas fa-user-graduate"></i>
        </div>
        <h3>Estudiantes</h3>
        <p>Accede a tu plataforma de aprendizaje, consulta materiales didácticos, calificaciones y participa en comunidades virtuales.</p>
        <a href="#" class="btn">Ingresar ahora</a>
      </div>
      
      <div class="user-card">
        <div class="icon-wrapper">
          <i class="fas fa-chalkboard-teacher"></i>
        </div>
        <h3>Docentes</h3>
        <p>Gestiona tus clases, materiales didácticos, calificaciones y mantén comunicación efectiva con tus estudiantes.</p>
        <a href="#" class="btn">Ingresar ahora</a>
      </div>
      
      <div class="user-card">
        <div class="icon-wrapper">
          <i class="fas fa-users-cog"></i>
        </div>
        <h3>Administradores</h3>
        <p>Supervisa todos los aspectos del sistema educativo, genera reportes analíticos y administra usuarios y permisos.</p>
        <a href="#" class="btn">Ingresar ahora</a>
      </div>
    </div>

    <div class="footer">
      <p>&copy; 2025 Sistema de Gestión Escolar • Todos los derechos reservados</p>
      <div class="social-links">
        <a href="#"><i class="fab fa-facebook"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
  </div>

  <script>
    // Añadir efectos de hover a los botones de nivel
    document.querySelectorAll('.level-btn').forEach(button => {
      button.addEventListener('mouseover', function() {
        // Resaltar el botón actual
        this.style.transform = 'scale(1.05)';
      });
      
      button.addEventListener('mouseout', function() {
        // Volver a la normalidad
        this.style.transform = 'scale(1)';
      });
      
      button.addEventListener('click', function() {
        // Destacar el botón seleccionado
        document.querySelectorAll('.level-btn').forEach(btn => {
          btn.style.fontWeight = '400';
          btn.classList.remove('active');
        });
        
        this.style.fontWeight = '700';
        this.classList.add('active');
      });
    });

    // Efecto de animación para las tarjetas de usuario
    document.querySelectorAll('.user-card').forEach(card => {
      card.addEventListener('mouseenter', function() {
        this.querySelectorAll('.icon-wrapper, .btn').forEach(el => {
          el.style.transition = 'all 0.4s ease';
        });
      });
    });
  </script>
</body>
</html>