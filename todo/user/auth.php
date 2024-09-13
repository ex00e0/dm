<?php
require "../database/User.php";
$user = new User;
$user -> auth($_POST['login'], $_POST['pass']);
?>