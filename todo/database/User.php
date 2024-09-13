<?php 
require_once 'Connect.php';
session_start();

class User extends Connect {
    private $error_valid = false;
    private $error_valid_text = [];

    private function validate_reg($login, $pass) {

        $this->checkEmpty(trim($login), 'login', 'Не введено имя пользователя');
        if (!isset($this->error_valid_text['login'])) {
            if (strlen($login) > 30) {
                $this->error_valid = true;
                $this->error_valid_text["login"] = 'Введите имя до 30 символов';
            } 
        }

        $this->checkEmpty(trim($pass), 'pass', 'Не введен пароль');
        if (!isset($this->error_valid_text['pass'])) { 
            if (strlen($pass) < 4 or strlen($pass) > 50) {
                $this->error_valid = true;
                $this->error_valid_text["pass"] = 'Введите пароль от 4 до 50 символов';
            }  
        }

    }

    public function reg($login, $pass) {

        $this->validate_reg($login, $pass);
        
        if (!$this->error_valid) {
                $password_hash = password_hash($pass, PASSWORD_DEFAULT);
                $que = $this->connection->query("INSERT INTO users (username, password_hash) VALUES ('$login', '$password_hash')");
        
            if ($que) {
                $_SESSION['user'] = $this->connection->insert_id;

                $this->error_valid = true;
                $this->error_valid_text["done"] = "Вы успешно зарегистрировались";
                $_SESSION['mess'] = $this->error_valid_text;
                header("Location: ../all_notes.php");
            } 
            else {
                $this->error_valid = true;
                $this->error_valid_text["db"] = $this->connection->error;
                $_SESSION['mess'] = $this->error_valid_text;
                header("Location: ../reg.php");
            }
        }
        else {
            $_SESSION['mess'] = $this->error_valid_text;
            header("Location: ../reg.php");
        }
        
    }

    private function checkEmpty($value, $field, $message) {
        if (empty($value)) {
            $this->error_valid = true;
            $this->error_valid_text[$field] = $message;
        }
    }

    public function auth($login, $pass) {
   
        $this->checkEmpty(trim($login), 'login-auth', 'Не введен логин');
        $this->checkEmpty(trim($pass), 'pass-auth', 'Не введен пароль');

        if (!isset($this->error_valid_text['login'])) { 
            $login_check = $this->connection->query("SELECT * FROM users WHERE username='$login'");
            
            if ($login_check->num_rows == 0) {
                $this->error_valid = true;
                $this->error_valid_text["login-auth"] = 'Неверный логин';
                $_SESSION['mess'] = $this->error_valid_text;
                header("Location: ../index.php");
            }  

            else if (!isset($this->error_valid_text['pass'])) {

                if ($login_check->num_rows != 0) {
                    $login_check = $login_check->fetch_array();
                    if (password_verify($pass, $login_check['password_hash'])) {
                            $_SESSION['user'] = $login_check['id'];
                            $this->error_valid = true;
                            $this->error_valid_text["done"] = "Вы успешно авторизовались";
                            $_SESSION['mess'] = $this->error_valid_text;
                            header("Location: ../all_notes.php");
                    }
                    else {
                        $this->error_valid = true;
                        $this->error_valid_text["pass-auth"] = 'Неверный пароль';
                        $_SESSION['mess'] = $this->error_valid_text;
                        header("Location: ../index.php");
                    }
                }
                
            } 
            else {
                $_SESSION['mess'] = $this->error_valid_text;
                header("Location: ../index.php");
            }
        }
        else {
            $_SESSION['mess'] = $this->error_valid_text;
            header("Location: ../index.php");
        }
         
    }

    public function exit () {
        unset($_SESSION['user']);
        header("Location: ../index.php");
    }

}
?>
