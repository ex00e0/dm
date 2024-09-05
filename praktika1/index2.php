<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get">
    <input type="date" min="<?=date('Y-m-d')?>" name="date">
    <input type="submit">
    </form>
</body>
</html>
<?php 
$date = isset($_GET['date'])?$_GET['date']:false;
if ($date) {
    $today = date('Y-m-d');
        echo "осталось:".((strtotime($date) - strtotime($today))/60/60/24)." дней";

        // echo ;
        //  $today->getTimestamp();
}
?>