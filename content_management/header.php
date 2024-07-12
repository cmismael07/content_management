<!-- header.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/topbar.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>EcuadorProtege</title>
</head>
<body>
    
<header>
<div class="navbar">
            <h1>EcuadorProtege</h1>
        <button class="menu-button" onclick="toggleMenu()">☰</button>
        <div class="nav-items-right">
            
        <ul class="navbar-navi">
        <div id="search-mod" class="mod">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <input type="text" id="search-input" placeholder="Buscar...">
        <button id="search-btn">Buscar</button>
    </div>
</div>
            <li class="nav-item"><p><?php echo htmlspecialchars($username); ?></p></li>
            <li class="nav-item"><p><?php echo htmlspecialchars($role); ?></p></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Cerrar Sesión</a></li>
            <li class="nav-item"><a href="#" id="search-icon"><i class="fas fa-search"></i></a></li>
            
        </ul>
        </div>
        
</div>
</header>
</body>
</html>
