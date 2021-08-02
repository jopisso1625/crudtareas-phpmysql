<?php
include("db.php");

if (isset($_POST['save_task'])) {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $query = "INSERT INTO task(name,description) VALUES('$name','$description')";
    $result = mysqli_query($conn, $query);

    $_SESSION['message'] = 'Tarea Guardada';
    $_SESSION['message_type'] = 'success';

    header("Location:index.php");
}
