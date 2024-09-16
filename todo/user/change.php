<?php 
require "../database/Task.php";

$task = new Task;
$task = $task -> change_task($_POST['id'], $_POST['checkbox']);

// echo "dsfsd";
// echo "<div>$task</div>";
?>
<div id="mess"></div> 
<!--  style="position: absolute;
    top:23.5%;
    left:0;
    font-size:1vmax;
    border-radius: 0.5vmax;
    width: 17vmax;
    text-align: center;
    color:#F7F7F7;
    height:3vmax;
    display:grid;
    align-items:center;
    font-family: 'KanitM';
    text-transform: uppercase;
    transition: all 1s ease-out;
    background-color:  rgba(108,99,255, 0.6); "><div><?=$task?></div>-->
