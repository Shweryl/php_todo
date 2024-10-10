<?php
require 'config.php';
if($_POST){
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "INSERT INTO todo(title, description) VALUES (:title, :description)";
    $pdostatement = $pdo->prepare($sql);
    $result = $pdostatement->execute(
        array(
            ':title' => $title,
            ':description' => $description,
        )
    );
    if($result){
        echo "<script>alert('New Todo is added'); window.location.href='index.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-md mt-5">
        <div class="card w-50 mx-auto">
            <div class="card-body">
                <h2>Create New Record</h2>
                <form action="create.php" method="POST">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" rows="8" value=""></textarea>
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" class="btn btn-dark" value="Submit">
                        <a href="index.php" type="button" class="btn btn-dark">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>