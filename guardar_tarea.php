<?php
include("db.php");

if (isset($_POST['save_task'])) {
    if (empty($_POST['name']) || empty($_POST['description'])) {
        // header("Location:index.php");

        if (empty($_POST['name'])) {
            $_SESSION['errn'] = '*Escribe el nombre';
        }
        if (empty($_POST['description'])) {
            $_SESSION['errd'] = '*Escribe la descripcion';
        }
    } else {

        $name = $_POST['name'];
        $description = $_POST['description'];
        $query = "INSERT INTO task(name,description) VALUES('$name','$description')";
        $result = mysqli_query($conn, $query);

        $_SESSION['message'] = 'Tarea Guardada';
        $_SESSION['message_type'] = 'success';
    }
    header("Location:index.php");
}
