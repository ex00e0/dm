<?php 
require "../database/Task.php";

$task = new Task;
$task = $task -> add_task($_POST['title'], $_POST['description']);

// echo "dsfsd";
// echo "<div>$task</div>";
?>
<div id="mess"><?=$task?></div>