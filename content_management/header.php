<!-- header.php -->
<?php
$success_message = "";
$error_message = "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/topbar.css">
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="css/folder_management.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>EcuadorProtege</title>
</head>
<body>
    
<header>
<nav class="navbar">
            <h1>EcuadorProtege</h1>
        <button class="menu-button" onclick="toggleMenu()">☰</button>
        <div class="nav-items-right">
            
        <div id="search-mod" class="mod">
    <!--div class="modal-content">
        <span class="close-btn">&times;</span>
        <a href="#" id="search-icon"><i class="fas fa-search"></i></a>
        <input type="text" id="search-input" placeholder="Buscar...">
        <button id="search-btn">Buscar</button>
    </div-->
</div>
           <!--p><--?php echo htmlspecialchars($role); ?></p-->
           <a href="dashboard.php" class="nav-link">Inicio</a>
           <a href="logout.php" class="nav-link">Cerrar Sesión</a>
            
        </div>
        
</nav>
</header>
<?php if ($success_message || $error_message): ?>
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p><?php echo $success_message ?: $error_message; ?></p>
            </div>
        </div>
    <?php endif; ?>
<script src="js/create.js"></script>
</body>
</html>
