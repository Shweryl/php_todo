<?php
require 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    $pdostatement = $pdo->prepare("SELECT * FROM todo ORDER BY id DESC");
    $pdostatement->execute();
    $result = $pdostatement->fetchAll();
    ?>
    <div class="card">
        <div class="card-body">
            <h2>Todo Home Page</h2>
            <a href="create.php" type="button" class="btn btn-dark">Create</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result) {
                        foreach ($result as $item) {                          

                    ?>
                            <tr>
                                <td><?php echo $item['id'] ?></td>
                                <td><?php echo $item['title'] ?></td>
                                <td><?php echo $item['description'] ?></td>
                                <td><?php echo date('Y-m-d', strtotime($item['created_at'])) ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $item['id'] ?>" type="button" class="btn btn-dark">Edit</a>
                                    <a href="delete.php?id=<?php echo $item['id'] ?>" type="button" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                    <?php
                    }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>