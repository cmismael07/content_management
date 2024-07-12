<?php
include 'db.php';

$username = 'admin';
$password = 'admin';
$hashed_password = password_hash($password, PASSWORD_BCRYPT);
$role = 'admin';

$sql = "INSERT INTO users (username, password, role) VALUES ('$username', '$hashed_password', '$role')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
