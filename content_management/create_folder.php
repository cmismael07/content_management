<!-- create_folder.php -->

<?php
include 'db.php';
session_start();
$success_message = "";
$error_message = "";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $folder_name = $_POST['folder_name'];
    $sql = "INSERT INTO folders (name, user_id, last_modified, modified_by) VALUES ('$folder_name', '$user_id', NOW(), '$user_id')";
    
    if ($conn->query($sql) === TRUE) {
        $success_message = "Carpeta creada exitosamente";
    } else {
        $error_message =  "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php include 'header.php'; ?>

<div class="container">
    <h2>Crear nueva carpeta</h2>
    <form method="post">
        <input type="text" name="folder_name" placeholder="Nombre de la carpeta" required>
        <input type="submit" value="Crear carpeta">
    </form>
</div>
