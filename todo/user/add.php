<?php 
require "../../database/Task.php";

$task = new Task;
$task = $task -> add_task($_POST['title'], $_POST['description']);

echo "<script>alert('DDDDDDFYK');</script>";
?>