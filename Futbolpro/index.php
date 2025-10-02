<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FútbolPro - Noticias, Estadísticas y Tienda</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/panels.css">
</head>
<body>
  <!-- ===== HEADER ===== -->
  <header>
    <nav class="container nav-bar">
      <!-- Logo -->
      <div class="logo">⚽ FútbolPro</div>

      <!-- Menú principal -->
      <ul class="nav-links">
        <li><a href="#" onclick="showPage('home')">Inicio</a></li>
        <li><a href="#" onclick="showPage('news')">Noticias</a></li>
        <li><a href="#" onclick="showPage('stats')">Estadísticas</a></li>
        <li><a href="#" onclick="showPage('leagues')">Ligas</a></li>
        <li><a href="#" onclick="showPage('store')">Tienda</a></li>
        <li><a href="#" onclick="showPage('notifications')">Notificaciones</a></li>
        <li><a href="#" onclick="showPage('about')">Acerca de</a></li>
      </ul>

      <!-- Botones -->
      <div class="auth-buttons">
        <button class="btn btn-darkmode" onclick="toggleDarkMode()">🌙</button>
        <a href="#" class="btn btn-outline" onclick="showPage('login')">Iniciar Sesión</a>
        <a href="#" class="btn btn-primary" onclick="showPage('register')">Registrarse</a>
      </div>
    </nav>
  </header>

  <main class="container main-content">
    <!-- ===== INICIO ===== -->
    <div id="home" class="page active">
      <div class="hero">
        <h1>Bienvenido a FútbolPro</h1>
        <p>Noticias, estadísticas y artículos de fútbol en un solo lugar</p>
        <a href="#" class="btn btn-primary" onclick="showPage('news')">Ver Noticias</a>
      </div>
    </div>

    <!-- ===== ACERCA DE ===== -->
    <div id="about" class="page">
      <div class="about-container">
        <div class="about-header">
          <h2>👨‍💻 Acerca del Creador</h2>
          <p>Conoce la historia y pasión detrás de FútbolPro</p>
        </div>

        <div class="creator-profile">
          <div class="profile-image-container">
            <img src="IMG/Foto_perfil.jpg" alt="Foto del creador" class="profile-image">
            <div class="profile-badge">⚽🤸🏼‍♀️</div>
          </div>

          <div class="profile-info">
            <h3>Angel David Sarmiento</h3>
            <p class="profile-role">Desarrollador programador en sofware & Apasionado del Fútbol y a Porras</p>
            
            <p class="profile-description">
              ¡Hola! Soy Angel Sarmiento, un desarrollador apasionado por la tecnología y el fútbol. 
              Creé FútbolPro con la visión de unir a todos los fanáticos del fútbol en una plataforma 
              completa donde puedan encontrar las últimas noticias, estadísticas detalladas y productos oficiales de algunos clubles.
            </p>

            <div class="skills-container">
              <span class="skill-tag">JavaScript</span>
              <span class="skill-tag">HTML/CSS</span>
              <span class="skill-tag">React</span>
              <span class="skill-tag">Node.js</span>
              <span class="skill-tag">UI/UX Design</span>
              <span class="skill-tag">Análisis Deportivo</span>
            </div>

            <div class="social-links">
              <a href="https://www.instagram.com/angeldesar/" class="social-link">
                💼 Instagram
              </a>
              <a href="https://mail.google.com/mail/u/0/?tab=rm&ogbl#inbox" class="social-link">
                📧 Email
              </a>
              <a href="https://www.facebook.com/angel.sarmiento.921163" class="social-link">
                🐱 Facebook
              </a>
            </div>
          </div>
        </div>

        <div class="stats-grid">
          <div class="stat-item">
            <div class="stat-number">4+</div>
            <div class="stat-label">Años de Experiencia</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">500+</div>
            <div class="stat-label">Proyectos Completados</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">∞</div>
            <div class="stat-label">Pasión por el Fútbol y al porrismo</div>
          </div>
          <div class="stat-item">
            <div class="stat-number">24/7</div>
            <div class="stat-label">Dedicación</div>
          </div>
        </div>

        <div class="passion-section">
          <h4>🎯 Mi Misión</h4>
          <p class="passion-text">
            Mi objetivo es crear la mejor experiencia digital para los fanáticos del fútbol. 
            Cada línea de código que escribo está pensada en mejorar la manera en que los aficionados 
            acceden a la información deportiva. FútbolPro no es solo una página web, es una comunidad 
            donde la pasión por el fútbol se encuentra con la innovación tecnológica.
          </p>
        </div>
      </div>
    </div>

    <!-- ===== NOTICIAS ===== -->
    <div id="news" class="page">
      <h2>📰 Noticias</h2>
      <div class="news-grid">
        <div class="news-card">
          <img src="https://images.unsplash.com/photo-1556056504-5c7696c4c28d?w=400&h=250&fit=crop" alt="Noticia 1">
          <div class="news-card-content">
            <h3>Mundial 2026</h3>
            <p>Se anuncian las sedes oficiales del próximo mundial.</p>
          </div>
        </div>
        <div class="news-card">
          <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?w=400&h=250&fit=crop" alt="Noticia 2">
          <div class="news-card-content">
            <h3>Copa Libertadores</h3>
            <p>Los equipos clasificados a semifinales.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== ESTADÍSTICAS ===== -->
    <div id="stats" class="page">
      <h2>📊 Estadísticas</h2>
      <div class="stats-grid">
        <div class="stat-card">
          <h3>89%</h3>
          <p>Precisión de Pases</p>
        </div>
        <div class="stat-card">
          <h3>2.5</h3>
          <p>Goles por Partido</p>
        </div>
        <div class="stat-card">
          <h3>67%</h3>
          <p>Posesión Media</p>
        </div>
      </div>
    </div>

    <!-- ===== LIGAS ===== -->
    <div id="leagues" class="page">
      <h2>🏆 Ligas</h2>
      <div class="news-grid">
        <div class="news-card">
          <img src="IMG/la_liga.jpg" alt="La Liga">
          <div class="news-card-content">
            <h3>La Liga</h3>
            <p>Resultados y posiciones actualizadas.</p>
          </div>
        </div>
        <div class="news-card">
          <img src="IMG/premier.png" alt="Premier League">
          <div class="news-card-content">
            <h3>Premier League</h3>
            <p>Seguimiento completo del torneo inglés.</p>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== TIENDA ===== -->
    <div id="store" class="page">
      <h2>🛒 Tienda de Fútbol</h2>
      <p>Compra camisetas, balones, zapatillas y más artículos oficiales.</p>
      <div class="store-grid">
        <div class="product-card">
          <img src="IMG/camisa.jpg" alt="Camiseta oficial">
          <h3>Camiseta Oficial</h3>
          <p>$120.000 COP</p>
          <button class="btn btn-primary">Comprar</button>
        </div>
        <div class="product-card">
          <img src="IMG/balon.jpeg" alt="Balón profesional">
          <h3>Balón Profesional</h3>
          <p>$200.000 COP</p>
          <button class="btn btn-primary">Comprar</button>
        </div>
        <div class="product-card">
          <img src="IMG/zapatos.jpeg" alt="Zapatillas deportivas">
          <h3>Zapatillas Adidas</h3>
          <p>$350.000 COP</p>
          <button class="btn btn-primary">Comprar</button>
        </div>
      </div>
    </div>

    <!-- ===== NOTIFICACIONES ===== -->
    <div id="notifications" class="page">
      <h2>🔔 Notificaciones</h2>
      <ul class="notifications-list">
        <li>Tu equipo favorito juega mañana a las 8:00 p.m.</li>
        <li>Nuevo artículo en la tienda: Camiseta edición limitada.</li>
        <li>Se actualizaron las estadísticas de la Champions League.</li>
      </ul>
    </div>

    <!-- ===== PANEL EXCLUSIVO PARA FANS ===== -->
    <div id="panelFan" class="page">
      <div class="dashboard-container">
        <div class="dashboard-header">
          <h2>⚽ Panel de Fan</h2>
          <p>Información exclusiva de tu liga favorita: <span id="fanLiga" class="highlight"></span></p>
        </div>

        <div class="dashboard-stats">
          <div class="stat-box">
            <h3 id="fanEquipo" class="team-name">Tu Equipo</h3>
            <p>Equipo Favorito</p>
          </div>
          <div class="stat-box">
            <h3>24</h3>
            <p>Partidos esta temporada</p>
          </div>
          <div class="stat-box">
            <h3>18</h3>
            <p>Victorias</p>
          </div>
          <div class="stat-box">
            <h3>3°</h3>
            <p>Posición en la tabla</p>
          </div>
        </div>

        <div class="content-grid">
          <div class="content-card">
            <h3>🏆 Próximos Partidos</h3>
            <div class="match-list">
              <div class="match-item">
                <span class="match-date">05 Oct - 20:00</span>
                <span class="match-teams">Real Madrid vs Barcelona</span>
              </div>
              <div class="match-item">
                <span class="match-date">08 Oct - 18:30</span>
                <span class="match-teams">Atlético vs Sevilla</span>
              </div>
              <div class="match-item">
                <span class="match-date">12 Oct - 21:00</span>
                <span class="match-teams">Valencia vs Real Madrid</span>
              </div>
            </div>
          </div>

          <div class="content-card">
            <h3>📰 Noticias Exclusivas</h3>
            <div class="news-list">
              <div class="news-item">
                <h4>Fichaje confirmado</h4>
                <p>Nuevo delantero llega al equipo por 50M€</p>
              </div>
              <div class="news-item">
                <h4>Lesión importante</h4>
                <p>El capitán estará fuera 3 semanas</p>
              </div>
              <div class="news-item">
                <h4>Récord histórico</h4>
                <p>Mayor racha de victorias en la liga</p>
              </div>
            </div>
          </div>

          <div class="content-card">
            <h3>📊 Estadísticas del Equipo</h3>
            <div class="team-stats">
              <div class="stat-row">
                <span>Goles a favor:</span>
                <strong>52</strong>
              </div>
              <div class="stat-row">
                <span>Goles en contra:</span>
                <strong>18</strong>
              </div>
              <div class="stat-row">
                <span>Tarjetas amarillas:</span>
                <strong>34</strong>
              </div>
              <div class="stat-row">
                <span>Tarjetas rojas:</span>
                <strong>2</strong>
              </div>
            </div>
          </div>

          <div class="content-card">
            <h3>🎟️ Entradas Disponibles</h3>
            <p>Compra entradas para el próximo partido</p>
            <button class="btn btn-primary">Ver Entradas</button>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== PANEL EXCLUSIVO PARA PROVEEDORES ===== -->
    <div id="panelProveedor" class="page">
      <div class="dashboard-container">
        <div class="dashboard-header">
          <h2>📦 Panel de Proveedor</h2>
          <p>Gestiona tus productos en la tienda</p>
          <button class="btn btn-primary" onclick="mostrarFormularioProducto()">➕ Agregar Producto</button>
        </div>

        <!-- Formulario para agregar productos -->
        <div id="formProducto" class="form-container" style="display: none; margin-bottom: 30px;">
          <div class="form-header">
            <h3>Nuevo Producto</h3>
            <button type="button" class="btn-back" onclick="ocultarFormularioProducto()">✖ Cerrar</button>
          </div>
          <form id="productoForm">
            <div class="form-group">
              <label for="nombreProducto">Nombre del Producto:</label>
              <input type="text" id="nombreProducto" required>
            </div>
            <div class="form-group">
              <label for="categoriaProducto">Categoría:</label>
              <select id="categoriaProducto" required>
                <option value="">Selecciona categoría</option>
                <option value="Camisetas">Camisetas</option>
                <option value="Balones">Balones</option>
                <option value="Zapatillas">Zapatillas</option>
                <option value="Accesorios">Accesorios</option>
                <option value="Equipamiento">Equipamiento</option>
              </select>
            </div>
            <div class="form-group">
              <label for="precioProducto">Precio (COP):</label>
              <input type="number" id="precioProducto" min="0" step="1000" required>
            </div>
            <div class="form-group">
              <label for="descripcionProducto">Descripción:</label>
              <textarea id="descripcionProducto" rows="3" required></textarea>
            </div>
            <div class="form-group">
              <label for="imagenProducto">URL de la Imagen:</label>
              <input type="url" id="imagenProducto" required>
            </div>
            <div class="form-group">
              <label for="stockProducto">Stock Disponible:</label>
              <input type="number" id="stockProducto" min="0" required>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Publicar Producto</button>
          </form>
        </div>

        <!-- Lista de productos del proveedor -->
        <div class="content-card">
          <h3>📋 Mis Productos</h3>
          <div id="listaProductosProveedor" class="productos-grid">
            <div class="producto-item">
              <img src="IMG/camisa.jpg" alt="Producto">
              <h4>Camiseta Oficial</h4>
              <p class="precio">$120.000 COP</p>
              <p class="stock">Stock: 50 unidades</p>
              <div class="producto-actions">
                <button class="btn btn-outline">✏️ Editar</button>
                <button class="btn btn-outline">🗑️ Eliminar</button>
              </div>
            </div>
          </div>
        </div>

        <div class="dashboard-stats">
          <div class="stat-box">
            <h3>12</h3>
            <p>Productos Activos</p>
          </div>
          <div class="stat-box">
            <h3>89</h3>
            <p>Ventas Totales</p>
          </div>
          <div class="stat-box">
            <h3>$4.5M</h3>
            <p>Ingresos</p>
          </div>
          <div class="stat-box">
            <h3>4.8⭐</h3>
            <p>Calificación</p>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== PANEL EXCLUSIVO PARA ANALISTAS ===== -->
    <div id="panelAnalista" class="page">
      <div class="dashboard-container">
        <div class="dashboard-header">
          <h2>📊 Panel de Analista</h2>
          <p>Gestiona estadísticas y análisis deportivos</p>
          <button class="btn btn-primary" onclick="mostrarFormularioEstadistica()">➕ Agregar Estadística</button>
        </div>

        <!-- Formulario para agregar estadísticas -->
        <div id="formEstadistica" class="form-container" style="display: none; margin-bottom: 30px;">
          <div class="form-header">
            <h3>Nueva Estadística</h3>
            <button type="button" class="btn-back" onclick="ocultarFormularioEstadistica()">✖ Cerrar</button>
          </div>
          <form id="estadisticaForm">
            <div class="form-group">
              <label for="ligaEstadistica">Liga:</label>
              <select id="ligaEstadistica" required>
                <option value="">Selecciona una liga</option>
                <option value="La Liga">La Liga</option>
                <option value="Premier League">Premier League</option>
                <option value="Serie A">Serie A</option>
                <option value="Bundesliga">Bundesliga</option>
                <option value="Ligue 1">Ligue 1</option>
                <option value="Liga Colombiana">Liga Colombiana</option>
              </select>
            </div>
            <div class="form-group">
              <label for="equipoEstadistica">Equipo:</label>
              <input type="text" id="equipoEstadistica" required>
            </div>
            <div class="form-group">
              <label for="tipoEstadistica">Tipo de Estadística:</label>
              <select id="tipoEstadistica" required>
                <option value="">Selecciona tipo</option>
                <option value="Posesión">Posesión de Balón</option>
                <option value="Goles">Goles</option>
                <option value="Asistencias">Asistencias</option>
                <option value="Pases">Precisión de Pases</option>
                <option value="Disparos">Disparos a Puerta</option>
                <option value="Defensiva">Estadísticas Defensivas</option>
              </select>
            </div>
            <div class="form-group">
              <label for="valorEstadistica">Valor/Porcentaje:</label>
              <input type="text" id="valorEstadistica" placeholder="Ej: 67% o 45 goles" required>
            </div>
            <div class="form-group">
              <label for="temporadaEstadistica">Temporada:</label>
              <input type="text" id="temporadaEstadistica" placeholder="Ej: 2024/2025" required>
            </div>
            <div class="form-group">
              <label for="observaciones">Observaciones:</label>
              <textarea id="observaciones" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%;">Guardar Estadística</button>
          </form>
        </div>

        <!-- Estadísticas recientes -->
        <div class="content-card">
          <h3>📈 Estadísticas Recientes</h3>
          <div id="listaEstadisticas" class="estadisticas-list">
            <div class="estadistica-item">
              <div class="est-header">
                <span class="est-liga">La Liga</span>
                <span class="est-fecha">28/09/2025</span>
              </div>
              <h4>Real Madrid - Posesión de Balón</h4>
              <p class="est-valor">67%</p>
              <p class="est-temporada">Temporada 2024/2025</p>
            </div>
            <div class="estadistica-item">
              <div class="est-header">
                <span class="est-liga">Premier League</span>
                <span class="est-fecha">27/09/2025</span>
              </div>
              <h4>Manchester City - Goles</h4>
              <p class="est-valor">52 goles</p>
              <p class="est-temporada">Temporada 2024/2025</p>
            </div>
          </div>
        </div>

        <div class="dashboard-stats">
          <div class="stat-box">
            <h3>156</h3>
            <p>Estadísticas Publicadas</p>
          </div>
          <div class="stat-box">
            <h3>8</h3>
            <p>Ligas Analizadas</p>
          </div>
          <div class="stat-box">
            <h3>45</h3>
            <p>Equipos Estudiados</p>
          </div>
          <div class="stat-box">
            <h3>2.5K</h3>
            <p>Visualizaciones</p>
          </div>
        </div>
      </div>
    </div>

    <!-- ===== LOGIN ===== -->
    <div id="login" class="page">
      <div class="form-container">
        <div class="form-header">
          <h2>Iniciar Sesión</h2>
          <p>Accede a tu cuenta de FútbolPro</p>
        </div>
        <form id="loginForm">
          <div class="form-group">
            <label for="loginEmail">Correo electrónico:</label>
            <input type="email" id="loginEmail" name="email" required>
          </div>
          <div class="form-group">
            <label for="loginPassword">Contraseña:</label>
            <div style="position: relative;">
              <input type="password" id="loginPassword" name="password" required style="padding-right: 45px;">
              <button type="button" onclick="togglePasswordVisibility('loginPassword', 'toggleLoginBtn')" id="toggleLoginBtn" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; font-size: 18px;">👁️</button>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" style="width: 100%;">Iniciar Sesión</button>
        </form>
        <div class="form-toggle">
          <p>¿No tienes cuenta? <a href="#" onclick="showPage('register')">Regístrate aquí</a></p>
        </div>
      </div>
    </div>

    <!-- ===== REGISTRO ===== -->
    <div id="register" class="page">
      <!-- PASO 1: Selección de Rol -->
      <div id="roleSelection" class="form-container">
        <div class="form-header">
          <h2>¿Cómo quieres unirte a FútbolPro?</h2>
          <p>Selecciona el tipo de cuenta que mejor se adapte a ti</p>
        </div>
        
        <div class="role-options">
          <div class="role-card" onclick="selectRole('Fan')">
            <div class="role-icon">⚽</div>
            <h3>Fan</h3>
            <p>Para aficionados que quieren seguir sus equipos favoritos, leer noticias y comprar productos oficiales.</p>
            <ul class="role-features">
              <li>Acceso a noticias y estadísticas</li>
              <li>Notificaciones de partidos</li>
              <li>Tienda completa</li>
            </ul>
          </div>

          <div class="role-card" onclick="selectRole('Proveedor')">
            <div class="role-icon">📰</div>
            <h3>Proveedor</h3>
            <p>Para profesionales del Futbol que quieran vender productor originales en la tienda virtual.</p>
            <ul class="role-features">
              <li>Publicación de artículos</li>
              <li>Acceso a estadísticas avanzadas</li>
              <li>Panel de creador de contenido</li>
            </ul>
          </div>

          <div class="role-card" onclick="selectRole('Analista')">
            <div class="role-icon">📊</div>
            <h3>Analista</h3>
            <p>Para expertos en análisis deportivo que necesitan herramientas avanzadas de estadísticas.</p>
            <ul class="role-features">
              <li>Herramientas de análisis avanzado</li>
              <li>Reportes personalizados</li>
              <li>Acceso a datos históricos</li>
            </ul>
          </div>
        </div>

        <div class="form-toggle">
          <p>¿Ya tienes cuenta? <a href="#" onclick="showPage('login')">Inicia sesión aquí</a></p>
        </div>
      </div>

      <!-- PASO 2: Formulario de Datos -->
      <div id="dataForm" class="form-container" style="display: none;">
        <div class="form-header">
          <h2>Completa tu registro</h2>
          <p id="selectedRoleText">Como <span id="roleText"></span></p>
          <button type="button" class="btn-back" onclick="backToRoleSelection()">← Cambiar rol</button>
        </div>

        <form id="registerForm">
          <div class="form-group">
            <label for="tipoDocumento">Tipo de Documento:</label>
            <select id="tipoDocumento" name="tipoDocumento" required>
              <option value="">Selecciona una opción</option>
              <option value="CEDULA DE CIUDADANIA">CÉDULA DE CIUDADANÍA</option>
              <option value="PASAPORTE">PASAPORTE</option>
              <option value="CEDULA DE EXTRANJERIA">CÉDULA DE EXTRANJERÍA</option>
              <option value="NIT">NIT</option>
            </select>
          </div>

          <div class="form-group">
            <label for="numeroDocumento">Número de Documento:</label>
            <input type="text" id="numeroDocumento" name="numeroDocumento" required>
          </div>

          <div class="form-group">
            <label for="nombres">Nombres:</label>
            <input type="text" id="nombres" name="nombres" required>
          </div>

          <div class="form-group">
            <label for="apellidos">Apellidos:</label>
            <input type="text" id="apellidos" name="apellidos" required>
          </div>

          <div class="form-group">
            <label for="email">Correo electrónico:</label>
            <input type="email" id="email" name="email" required>
          </div>

          <div class="form-group">
            <label for="password">Contraseña:</label>
            <div style="position: relative;">
              <input type="password" id="password" name="password" required style="padding-right: 45px;">
              <button type="button" onclick="togglePasswordVisibility('password', 'toggleRegisterBtn')" id="toggleRegisterBtn" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; font-size: 18px;">👁️</button>
            </div>
          </div>
          
          <!-- Campos específicos por rol -->
          <div id="fanFields" class="role-specific-fields" style="display: none;">
            <div class="form-group">
              <label for="equipoFavorito">Equipo Favorito:</label>
              <input type="text" id="equipoFavorito" name="equipoFavorito">
            </div>
            <div class="form-group">
              <label for="ligaFavorita">Liga Favorita:</label>
              <select id="ligaFavorita" name="ligaFavorita">
                <option value="">Selecciona una liga</option>
                <option value="La Liga">La Liga</option>
                <option value="Premier League">Premier League</option>
                <option value="Serie A">Serie A</option>
                <option value="Bundesliga">Bundesliga</option>
                <option value="Liga Colombiana">Liga Colombiana</option>
              </select>
            </div>
          </div>

          <div id="proveedorFields" class="role-specific-fields" style="display: none;">
            <div class="form-group">
              <label for="medioTrabajo">Medio donde trabajas:</label>
              <input type="text" id="medioTrabajo" name="medioTrabajo">
            </div>
            <div class="form-group">
              <label for="experiencia">Años de experiencia:</label>
              <input type="number" id="experiencia" name="experiencia" min="0">
            </div>
            <div class="form-group">
              <label for="especialidad">Especialidad:</label>
              <select id="especialidad" name="especialidad">
                <option value="">Selecciona especialidad</option>
                <option value="Fútbol Nacional">Fútbol Nacional</option>
                <option value="Fútbol Internacional">Fútbol Internacional</option>
                <option value="Análisis Táctico">Análisis Táctico</option>
                <option value="Mercado de Fichajes">Mercado de Fichajes</option>
              </select>
            </div>
          </div>

          <div id="analistaFields" class="role-specific-fields" style="display: none;">
            <div class="form-group">
              <label for="tipoAnalisis">Tipo de análisis:</label>
              <select id="tipoAnalisis" name="tipoAnalisis">
                <option value="">Selecciona tipo</option>
                <option value="Análisis Táctico">Análisis Táctico</option>
                <option value="Estadísticas Avanzadas">Estadísticas Avanzadas</option>
                <option value="Scouting">Scouting</option>
                <option value="Performance Analysis">Performance Analysis</option>
              </select>
            </div>
            <div class="form-group">
              <label for="herramientas">Herramientas que usas:</label>
              <input type="text" id="herramientas" name="herramientas" placeholder="Ej: Opta, Wyscout, etc.">
            </div>
            <div class="form-group">
              <label for="certificaciones">Certificaciones:</label>
              <input type="text" id="certificaciones" name="certificaciones" placeholder="Opcional">
            </div>
          </div>

          <button type="submit" class="btn btn-primary" style="width: 100%;">Completar Registro</button>
        </form>
      </div>
    </div>
  </main>

  <script>
  // ========== VARIABLES GLOBALES ==========
  let usuarioActual = null;
  let selectedRole = '';

  // ========== FUNCIONES DE NAVEGACIÓN ==========
  function showPage(pageId) {
    const pages = document.querySelectorAll('.page');
    pages.forEach(p => p.classList.remove('active'));
    const target = document.getElementById(pageId);
    if (target) target.classList.add('active');
    
    if (pageId === 'register') {
      resetRegistrationFlow();
    }
  }

  function toggleDarkMode() {
    document.body.classList.toggle("dark-mode");
  }

  function togglePasswordVisibility(inputId, btnId) {
    const passwordInput = document.getElementById(inputId);
    const toggleBtn = document.getElementById(btnId);
    
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
      toggleBtn.textContent = '🙈';
    } else {
      passwordInput.type = 'password';
      toggleBtn.textContent = '👁️';
    }
  }

  // ========== REGISTRO ==========
  function resetRegistrationFlow() {
    document.getElementById('roleSelection').style.display = 'block';
    document.getElementById('dataForm').style.display = 'none';
    selectedRole = '';
    
    const roleCards = document.querySelectorAll('.role-card');
    roleCards.forEach(card => card.classList.remove('selected'));
  }

  function selectRole(role) {
    selectedRole = role;
    
    const roleCards = document.querySelectorAll('.role-card');
    roleCards.forEach(card => {
      card.classList.remove('selected');
      if (card.textContent.includes(role)) {
        card.classList.add('selected');
      }
    });
    
    setTimeout(() => {
      showDataForm();
    }, 500);
  }

  function showDataForm() {
    document.getElementById('roleSelection').style.display = 'none';
    document.getElementById('dataForm').style.display = 'block';
    document.getElementById('roleText').textContent = selectedRole;
    
    const roleFields = document.querySelectorAll('.role-specific-fields');
    roleFields.forEach(field => field.style.display = 'none');
    
    const targetFields = document.getElementById(selectedRole.toLowerCase() + 'Fields');
    if (targetFields) {
      targetFields.style.display = 'block';
    }
  }

  function backToRoleSelection() {
    document.getElementById('dataForm').style.display = 'none';
    document.getElementById('roleSelection').style.display = 'block';
    selectedRole = '';
    document.getElementById('registerForm').reset();
  }

  // ========== PANELES ==========
  function mostrarPanelFan() {
    showPage('panelFan');
  }

  function mostrarPanelProveedor() {
    showPage('panelProveedor');
    cargarProductosProveedor();
  }

  function mostrarPanelAnalista() {
    showPage('panelAnalista');
    cargarEstadisticasAnalista();
  }

  function cargarProductosProveedor() {
    console.log('Cargando productos del proveedor...');
  }

  // ========== PROVEEDOR ==========
  function mostrarFormularioProducto() {
    document.getElementById('formProducto').style.display = 'block';
  }

  function ocultarFormularioProducto() {
    document.getElementById('formProducto').style.display = 'none';
    document.getElementById('productoForm').reset();
  }

  function agregarProductoALista(producto) {
    const lista = document.getElementById('listaProductosProveedor');
    const productoHTML = `
      <div class="producto-item">
        <img src="${producto.imagen}" alt="${producto.nombre}" onerror="this.src='IMG/camisa.jpg'">
        <h4>${producto.nombre}</h4>
        <p class="precio">${parseInt(producto.precio).toLocaleString('es-CO')} COP</p>
        <p class="stock">Stock: ${producto.stock} unidades</p>
        <div class="producto-actions">
          <button class="btn btn-outline">✏️ Editar</button>
          <button class="btn btn-outline">🗑️ Eliminar</button>
        </div>
      </div>
    `;
    lista.insertAdjacentHTML('beforeend', productoHTML);
  }

  // ========== ANALISTA ==========
  function mostrarFormularioEstadistica() {
    document.getElementById('formEstadistica').style.display = 'block';
  }

  function ocultarFormularioEstadistica() {
    document.getElementById('formEstadistica').style.display = 'none';
    document.getElementById('estadisticaForm').reset();
  }

  function agregarEstadisticaALista(est) {
    const lista = document.getElementById('listaEstadisticas');
    const estHTML = `
      <div class="estadistica-item" data-estadistica-id="${est.id || est.estadisticaId}">
        <div class="est-header">
          <span class="est-liga">${est.liga}</span>
          <span class="est-fecha">${est.fecha || new Date().toLocaleDateString('es-CO')}</span>
        </div>
        <h4>${est.equipo} - ${est.tipo || est.tipoEstadistica}</h4>
        <p class="est-valor">${est.valor}</p>
        <p class="est-temporada">Temporada ${est.temporada}</p>
        ${est.observaciones ? `<p class="est-obs">${est.observaciones}</p>` : ''}
        <button class="btn btn-outline" onclick="eliminarEstadistica(${est.id || est.estadisticaId})" style="margin-top: 10px;">🗑️ Eliminar</button>
      </div>
    `;
    lista.insertAdjacentHTML('afterbegin', estHTML);
  }

  async function cargarEstadisticasAnalista() {
    if (!usuarioActual || usuarioActual.rol !== 'Analista') return;
    
    try {
      const response = await fetch(`PHP/listar_estadisticas.php?analistaId=${usuarioActual.id}`);
      const result = await response.json();
      
      if (result.success && result.estadisticas) {
        const lista = document.getElementById('listaEstadisticas');
        lista.innerHTML = '';
        
        if (result.estadisticas.length === 0) {
          lista.innerHTML = '<p style="text-align:center; padding:20px; color:#666;">No has publicado estadísticas aún.</p>';
        } else {
          result.estadisticas.forEach(estadistica => {
            agregarEstadisticaALista(estadistica);
          });
        }
      }
    } catch (error) {
      console.error('Error al cargar estadísticas:', error);
    }
  }

  async function eliminarEstadistica(estadisticaId) {
    if (!confirm('¿Estás seguro de que deseas eliminar esta estadística?')) {
      return;
    }
    
    try {
      const response = await fetch('PHP/eliminar_estadistica.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ id: estadisticaId })
      });

      const result = await response.json();

      if (result.success) {
        alert('✅ ' + result.message);
        const estadisticaElement = document.querySelector(`[data-estadistica-id="${estadisticaId}"]`);
        if (estadisticaElement) {
          estadisticaElement.remove();
        }
      } else {
        alert('❌ ' + result.message);
      }
    } catch (error) {
      console.error('Error:', error);
      alert('❌ Error al eliminar la estadística');
    }
  }

  // ========== SESIÓN ==========
  function actualizarInterfazUsuario() {
    const authButtons = document.querySelector('.auth-buttons');
    const navLinks = document.querySelector('.nav-links');
    
    authButtons.innerHTML = `
      <button class="btn btn-darkmode" onclick="toggleDarkMode()">🌙</button>
      <span style="color:white; margin-left:10px;">👤 ${usuarioActual.nombres} (${usuarioActual.rol})</span>
      <button class="btn btn-outline" onclick="cerrarSesion()">Cerrar Sesión</button>
    `;

    let panelLink = '';
    if (usuarioActual.rol === 'Fan') {
      panelLink = '<li><a href="#" onclick="mostrarPanelFan()">⚽ Mi Panel</a></li>';
      document.getElementById('fanEquipo').textContent = usuarioActual.equipoFavorito || 'No especificado';
      document.getElementById('fanLiga').textContent = usuarioActual.ligaFavorita || 'No especificada';
    } else if (usuarioActual.rol === 'Proveedor') {
      panelLink = '<li><a href="#" onclick="mostrarPanelProveedor()">📦 Mi Panel</a></li>';
    } else if (usuarioActual.rol === 'Analista') {
      panelLink = '<li><a href="#" onclick="mostrarPanelAnalista()">📊 Mi Panel</a></li>';
    }

    if (panelLink) {
      const aboutLi = navLinks.querySelector('li:last-child');
      aboutLi.insertAdjacentHTML('beforebegin', panelLink);
    }
  }

  function cerrarSesion() {
    usuarioActual = null;
    const authButtons = document.querySelector('.auth-buttons');
    authButtons.innerHTML = `
      <button class="btn btn-darkmode" onclick="toggleDarkMode()">🌙</button>
      <a href="#" class="btn btn-outline" onclick="showPage('login')">Iniciar Sesión</a>
      <a href="#" class="btn btn-primary" onclick="showPage('register')">Registrarse</a>
    `;
    alert("👋 Sesión cerrada.");
    showPage('home');
  }

  // ========== EVENTOS DOM ==========
  document.addEventListener('DOMContentLoaded', function() {
    // REGISTRO
    const registerForm = document.getElementById('registerForm');
    if (registerForm) {
      registerForm.addEventListener('submit', async function (e) {
        e.preventDefault();

        const formData = {
          tipoDocumento: document.getElementById('tipoDocumento').value,
          numeroDocumento: document.getElementById('numeroDocumento').value.trim(),
          nombres: document.getElementById('nombres').value.trim(),
          apellidos: document.getElementById('apellidos').value.trim(),
          email: document.getElementById('email').value.trim(),
          password: document.getElementById('password').value.trim(),
          rol: selectedRole
        };

        if (!formData.tipoDocumento || !formData.numeroDocumento || !formData.nombres || 
            !formData.apellidos || !formData.email || !formData.password || !selectedRole) {
          alert("⚠️ Por favor completa todos los campos obligatorios.");
          return;
        }

        if (selectedRole === 'Fan') {
          formData.equipoFavorito = document.getElementById('equipoFavorito').value;
          formData.ligaFavorita = document.getElementById('ligaFavorita').value;
        } else if (selectedRole === 'Proveedor') {
          formData.medioTrabajo = document.getElementById('medioTrabajo').value;
          formData.experiencia = document.getElementById('experiencia').value;
          formData.especialidad = document.getElementById('especialidad').value;
        } else if (selectedRole === 'Analista') {
          formData.tipoAnalisis = document.getElementById('tipoAnalisis').value;
          formData.herramientas = document.getElementById('herramientas').value;
          formData.certificaciones = document.getElementById('certificaciones').value;
        }

        try {
          const response = await fetch('PHP/register.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(formData)
          });

          const result = await response.json();

          if (result.success) {
            alert(`✅ ${result.message}`);
            this.reset();
            resetRegistrationFlow();
            showPage('login');
          } else {
            alert(`❌ ${result.message}`);
          }
        } catch (error) {
          console.error('Error:', error);
          alert('❌ Error al conectar con el servidor.');
        }
      });
    }

    // LOGIN
    const loginForm = document.getElementById('loginForm'); 
    if (loginForm) {
    loginForm.addEventListener('submit', async function (e) {
    e.preventDefault();

    const loginData = {
      email: document.getElementById('loginEmail').value.trim(),
      password: document.getElementById('loginPassword').value.trim()
    };

    if (!loginData.email || !loginData.password) {
      alert("Por favor ingresa correo y contraseña.");
      return;
    }

    try {
      const response = await fetch('PHP/login.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(loginData)
      };

      const result = await response.json();
      
      console.log('Respuesta del servidor:', result); // Para depuración

      if (result.success) {
        // Verificar que result.usuario existe
        if (!result.usuario) {
          alert('Error: No se recibieron datos del usuario');
          console.error('result completo:', result);
          return;
        }
        
        usuarioActual = result.usuario;
        alert(`Bienvenido ${usuarioActual.nombres} (${usuarioActual.rol})`);
        actualizarInterfazUsuario();
        showPage('home');
        this.reset();
      } else {
        alert(result.message || 'Error al iniciar sesión');
      }
    } catch (error) {
      console.error('Error completo:', error);
      alert('Error al conectar con el servidor. Revisa la consola del navegador.');
    }
  });
}
    }

    // PRODUCTOS
    const productoForm = document.getElementById('productoForm');
    if (productoForm) {
      productoForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (!usuarioActual || !usuarioActual.id) {
          alert('❌ Error: Usuario no identificado.');
          return;
        }
        
        const producto = {
          nombre: document.getElementById('nombreProducto').value.trim(),
          categoria: document.getElementById('categoriaProducto').value,
          precio: parseFloat(document.getElementById('precioProducto').value),
          descripcion: document.getElementById('descripcionProducto').value.trim(),
          imagen: document.getElementById('imagenProducto').value.trim(),
          stock: parseInt(document.getElementById('stockProducto').value),
          proveedorId: usuarioActual.id
        };

        if (!producto.nombre || !producto.categoria || !producto.descripcion || !producto.imagen) {
          alert('⚠️ Por favor completa todos los campos obligatorios');
          return;
        }

        if (producto.precio <= 0) {
          alert('⚠️ El precio debe ser mayor a 0');
          return;
        }

        if (producto.stock < 0) {
          alert('⚠️ El stock no puede ser negativo');
          return;
        }

        try {
          const response = await fetch('PHP/guardar_producto.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(producto)
          });

          const result = await response.json();

          if (result.success) {
            alert('✅ ' + result.message);
            this.reset();
            ocultarFormularioProducto();
            producto.id = result.productoId;
            agregarProductoALista(producto);
          } else {
            alert('❌ ' + result.message);
          }
        } catch (error) {
          console.error('Error:', error);
          alert('❌ Error al conectar con el servidor.');
        }
      });
    }

    // ESTADÍSTICAS
    const estadisticaForm = document.getElementById('estadisticaForm');
    if (estadisticaForm) {
      estadisticaForm.addEventListener('submit', async function(e) {
        e.preventDefault();
        
        if (!usuarioActual || !usuarioActual.id) {
          alert('❌ Error: Usuario no identificado.');
          return;
        }
        
        const estadistica = {
          liga: document.getElementById('ligaEstadistica').value,
          equipo: document.getElementById('equipoEstadistica').value.trim(),
          tipoEstadistica: document.getElementById('tipoEstadistica').value,
          valor: document.getElementById('valorEstadistica').value.trim(),
          temporada: document.getElementById('temporadaEstadistica').value.trim(),
          observaciones: document.getElementById('observaciones').value.trim(),
          analistaId: usuarioActual.id,
          fecha: new Date().toLocaleDateString('es-CO')
        };

        if (!estadistica.liga || !estadistica.equipo || !estadistica.tipoEstadistica || 
            !estadistica.valor || !estadistica.temporada) {
          alert('⚠️ Por favor completa todos los campos obligatorios');
          return;
        }

        try {
          const response = await fetch('PHP/guardar_estadistica.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(estadistica)
          });

          const result = await response.json();

          if (result.success) {
            alert('✅ ' + result.message);
            this.reset();
            ocultarFormularioEstadistica();
            estadistica.id = result.estadisticaId;
            agregarEstadisticaALista(estadistica);
          } else {
            alert('❌ ' + result.message);
          }
        } catch (error) {
          console.error('Error:', error);
          alert('❌ Error al conectar con el servidor.');
        }
      });
    }
  });
</script>

</body>
</html>