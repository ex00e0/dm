<?php 
require_once 'Connect.php';
session_start();

class Task extends Connect {
    private $error_valid = false;
    private $error_valid_text = [];

    public function add_task($title, $description) {
        if (mb_strlen($title) > 35) {
            $this->error_valid = true;
            $this->error_valid_text["title"] = 'Введите заголовок до 35 символов';
        }

        echo $description;

    }

    // public function edit_task() {
    //     $update = "UPDATE tasks SET ";
    //     $update_check = false;

    //     $old_info = $this->connection->query("SELECT * FROM tasks WHERE task_id=$task_id")->fetch_assoc();
      
    //     if ($name != $old_info["title"]) {
    //         $update.= "title = '$name', ";
    //         $update_check = true;
    //     }
    //     if ($description != $old_info["description"]) {
    //         $update.= "description = '$description', ";
    //         $update_check = true;
    //     }
    //     if ($update_check) {
    //         $update = substr($update, 0, -2); 
    //         $update .= " WHERE task_id = $task_id";
    //         $update = $this->connection->query($update);
    //         if ($update) {
    //             return true;
    //         }
    //         else {
    //             $this->error_valid = true;
    //             $this->error_valid_text['database'] = $this->connection->error;
    //             return false;
    //         }
            
    //     }
    //     else {
    //         $this->error_valid = true;
    //         $this->error_valid_text['edit'] = 'Информация актуальна';
    //         return false;
    //     }
    // }

}
?>
