<!-- upload_file.php -->

<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $folder_id = $_POST['folder_id'];
    $file_name = $_FILES['file']['name'];
    $file_path = 'uploads/' . basename($file_name);

    if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
        $sql = "INSERT INTO files (name, folder_id, path, last_modified, modified_by) VALUES ('$file_name', '$folder_id', '$file_path', NOW(), '$user_id')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Archivo subido exitosamente";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error al subir el archivo.";
    }
}
?>

<?php include 'header.php'; ?>

<div class="container">
    <h2>Subir archivo</h2>
    <form method="post" enctype="multipart/form-data">
        <select name="folder_id" required>
            <?php
            $sql = "SELECT * FROM folders WHERE user_id='$user_id'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($folder = $result->fetch_assoc()) {
                    echo "<option value='" . $folder['id'] . "'>" . $folder['name'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay carpetas disponibles</option>";
            }
            ?>
        </select>
        <input type="file" name="file" required>
        <input type="submit" value="Subir archivo">
    </form>
</div>
