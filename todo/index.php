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
    <?php
         if (isset($_SESSION['mess'])) {
            if (isset($_SESSION['mess']['login'])) {
                echo "<script>alert('login!');</script>";
                // echo "<script> document.getElementById('messName').innerHTML = '".$_SESSION['mess']['name']."'; </script>";
                // echo "<script src='js/mess_reg_auth/mess1.js'></script>";
            }
            if (isset($_SESSION['mess']['pass'])) {
                echo "<script>alert('pass!');</script>";
            }
            if (isset($_SESSION['mess']['pass-auth'])) {
                echo "<script>alert('pass auth!');</script>";
            }
            if (isset($_SESSION['mess']['login-auth'])) {
                echo "<script>alert('login auth!');</script>";
            }
            unset($_SESSION['mess']);
         }
         
         ?>
</body>
</html>