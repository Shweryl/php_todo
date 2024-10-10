<?php
require('config.php');
if($_POST){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $id = $_POST['id'];
    $pdostatement = $pdo->prepare("UPDATE todo SET title='$title', description='$description' WHERE id='$id'");
    $result = $pdostatement->execute();
    if($result){
        echo "<script>alert('New Todo is edited'); window.location.href='index.php';</script>";
    };

}else{
    $pdostatement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container-md mt-5">
        <div class="card w-50 mx-auto">
            <div class="card-body">
                <h2>Edit Record</h2>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $result[0]['id'] ?>">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $result[0]['title'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <textarea class="form-control" name="description" rows="8" value=""><?php echo $result[0]['description'] ?></textarea>
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