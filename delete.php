<?php
require 'config.php';
$pdostatement = $pdo->prepare("DELETE FROM todo WHERE id=".$_GET['id']);
$result = $pdostatement->execute();
if($result){
    echo "<script>alert('New Todo is deleted'); window.location.href='index.php';</script>";
}
?>