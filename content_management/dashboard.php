<!-- dashboard.php -->

<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];
?>

<?php include 'header.php'; ?>

<div class="container">
    <h2>Panel de Control</h2>
    <?php if ($role == 'admin' || $role == 'admin_cliente'): ?>
        <button onclick="location.href='register.php'"><i class="fas fa-user-plus"></i> Crear nuevo usuario</button>
    <?php endif; ?>
    <button onclick="location.href='create_folder.php'"><i class="fas fa-folder-plus"></i> Nueva carpeta</button>
    <button onclick="location.href='upload_file.php'"><i class="fas fa-upload"></i> Subir archivo</button>

    <?php
    // Dependiendo del rol del usuario, mostramos diferentes vistas
    if ($role == 'admin') {
        // Mostrar todas las carpetas y archivos
        $sql = "SELECT folders.*, users.username AS modified_by FROM folders JOIN users ON folders.modified_by = users.id";
    } elseif ($role == 'admin_cliente') {
        // Mostrar carpetas y archivos creados por admin_cliente y clientes
        $sql = "SELECT folders.*, users.username AS modified_by FROM folders JOIN users ON folders.modified_by = users.id WHERE folders.user_id = '$user_id' OR folders.user_id IN (SELECT id FROM users WHERE role = 'cliente')";
    } elseif ($role == 'usuario') {
        // Mostrar carpetas y archivos subidos por clientes
        $sql = "SELECT folders.*, users.username AS modified_by FROM folders JOIN users ON folders.modified_by = users.id WHERE folders.user_id IN (SELECT id FROM users WHERE role = 'cliente')";
    } elseif ($role == 'cliente') {
        // Mostrar carpetas y archivos del cliente
        $sql = "SELECT folders.*, users.username AS modified_by FROM folders JOIN users ON folders.modified_by = users.id WHERE folders.user_id = '$user_id'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($folder = $result->fetch_assoc()) {
            echo "<div class='folder'>";
            echo "<div class='details'>";
            echo "<i class='fas fa-folder'></i>";
            echo "<span>" . $folder['name'] . "</span>";
            echo "</div>";
            echo "<div class='actions'>";
            echo "<span>Última modificación: " . $folder['last_modified'] . " por " . $folder['modified_by'] . "</span>";
            echo "<button><i class='fas fa-eye'></i> Ver archivos</button>";
            echo "</div>";
            echo "</div>";

            $folder_id = $folder['id'];
            $sql_files = "SELECT files.*, users.username AS modified_by FROM files JOIN users ON files.modified_by = users.id WHERE files.folder_id = '$folder_id'";
            $result_files = $conn->query($sql_files);

            if ($result_files->num_rows > 0) {
                while ($file = $result_files->fetch_assoc()) {
                    echo "<div class='file'>";
                    echo "<div class='details'>";
                    echo "<i class='fas fa-file'></i>";
                    echo "<span>" . $file['name'] . "</span>";
                    echo "</div>";
                    echo "<div class='actions'>";
                    echo "<span>Última modificación: " . $file['last_modified'] . " por " . $file['modified_by'] . "</span>";
                    echo "<button><i class='fas fa-download'></i> Descargar</button>";
                    echo "</div>";
                    echo "</div>";
                }
            } else {
                echo "<p>No hay archivos en esta carpeta.</p>";
            }
        }
    } else {
        echo "<p>No se encontraron carpetas.</p>";
    }
    ?>
</div>
