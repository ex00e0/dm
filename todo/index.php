<?php require "header.php"; 
?>
<body id="body">
    <div class="dark_body"></div>
    <div class="vh17"></div>
    <form class="modal_block" method="post" action="user/auth.php">
         <div class="headline r2 c2">ВХОД</div>
         <input class="r3 c2 inputTextModal" placeholder="Введите логин..." required name="login">
         <input class="r5 c2 inputTextModal" placeholder="Введите пароль..." required name="pass" type="password">
         <input type="submit" class="r7 c2 inputSubmitModal w22" value="ВОЙТИ">
         <a class="r7 c2 moveModal" href="reg.php">У меня нет аккаунта</a>
    </form>
    <div id="mess" style="position: absolute;
    top:23.5%;
    left:-20%;
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
    background-color:  rgba(108,99,255, 0.6); "><div>
        <?php
         if (isset($_SESSION['mess'])) {
            if (isset($_SESSION['mess']['login'])) {
                $task_mess = $_SESSION['mess']['login'];
                echo "<script>document.getElementById('mess').style.left = '0%'; </script>";
                // echo "<script> document.getElementById('messName').innerHTML = '".$_SESSION['mess']['name']."'; </script>";
                // echo "<script src='js/mess_reg_auth/mess1.js'></script>";
            }
            if (isset($_SESSION['mess']['pass'])) {
                $task_mess = $_SESSION['mess']['pass'];
                echo "<script>document.getElementById('mess').style.left = '0%'; </script>";
            }
            if (isset($_SESSION['mess']['pass-auth'])) {
                $task_mess = $_SESSION['mess']['pass-auth'];
                echo "<script>document.getElementById('mess').style.left = '0%'; </script>";
            }
            if (isset($_SESSION['mess']['login-auth'])) {
                $task_mess = $_SESSION['mess']['login-auth'];
                echo "<script>document.getElementById('mess').style.left = '0%'; </script>";
            }
            unset($_SESSION['mess']);
         }
         
         ?>
         <?=$task_mess?></div></div>
    
</body>

<script src="js/mess.js"></script>
</html>