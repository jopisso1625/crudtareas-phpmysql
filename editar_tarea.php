<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "SELECT * FROM task WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $name = $row['name'];
        $description = $row['description'];
    }
}


if (isset($_POST['update_task'])) {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $query = "UPDATE task set name='$name', description='$description' WHERE id=$id";

    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Tarea Actualizada';
    $_SESSION['message_type'] = 'warning';

    header("Location:index.php");
}


?>

<?php include('includes/header.php') ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <h4 class="text-center">Editar Tarea</h4>
                <form action="editar_tarea.php?id=<?php echo $_GET['id']; ?>" method="POST">

                    <div class="form-group">
                        <input type="text" name="name" value="<?php echo $name ?>" class="form-control" placeholder="Update Title">
                    </div>

                    <div class="form-group">
                        <textarea name="description" rows="2" class="form-control" placeholder="Update Description"><?php echo $description ?></textarea>
                    </div>

                    <button class="btn btn-success w-100" name="update_task">Actualizar</button>

                </form>
            </div>

        </div>
    </div>
</div>


<?php include('includes/footer.php') ?>