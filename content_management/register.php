<?php
include 'db.php';
session_start();

if ($_SESSION['role'] != 'admin' && $_SESSION['role'] != 'admin_cliente') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$password', '$role')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo usuario creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<?php include 'header.php'; ?>

<div class="container">
    <h2>Registrar nuevo usuario</h2>
    <form method="post">
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <select name="role" required>
            <option value="admin">Admin</option>
            <option value="admin_cliente">Admin Cliente</option>
            <option value="usuario">Usuario</option>
            <option value="cliente">Cliente</option>
        </select>
        <input type="submit" value="Registrar">
    </form>
</div>
