<?php
require "../database/User.php";
$user = new User;
$user -> reg($_POST['login'], $_POST['pass']);
?>