<?php 
require_once 'Connect.php';
session_start();

class Task extends Connect {
    private $error_valid = false;
    private $error_valid_text = [];

    public function add_task($title, $description) {
        if (mb_strlen($title) > 35) {
            $this->error_valid = true;
        }

        if (!$this->error_valid) {
            if ($description == '') {
                $query = $this->connection->query("INSERT INTO `tasks`(`user_id`, `title`) VALUES ('".$_SESSION['user']."','$title')");
            }
            else {
                 $query = $this->connection->query("INSERT INTO `tasks`(`user_id`, `title`, `description`) VALUES ('".$_SESSION['user']."','$title','$description')");
            }
           
            return 'Задача добавлена';
        }
        else {
            return 'Введите заголовок до 35 символов';
        }

    }

    public function get_tasks ($search, $filter) {
        $query = "SELECT * FROM tasks WHERE user_id = ".$_SESSION['user']." ";
        if ($search != NULL) {
            $query.= "AND title LIKE '%$search%' ";
        }
        if ($filter != NULL) {
            $query.= "AND is_completed = '$filter' ";
        }

        $tasks = $this->connection->query($query)->fetch_all();
        return $tasks;
    } 

    public function get_task ($id) {
        $query = "SELECT * FROM tasks WHERE id = $id ";
        $tasks = $this->connection->query($query)->fetch_all();
        return $tasks;
    } 

    public function change_task ($id, $checkbox) {
        if ($checkbox == "true") {
            $query = $this->connection->query("UPDATE tasks SET is_completed = 'false' WHERE id = $id ");
            return 'Задача не выполнена';
        }
        else if ($checkbox == "false") {
            $query = $this->connection->query("UPDATE tasks SET is_completed = 'true' WHERE id = $id ");
            return 'Задача выполнена';
        }
    } 

    public function get_last_id () {
        $task_id = $this->connection->insert_id;
        return $task_id;
    } 

    public function get_count () {
        $task_id = $this->connection->query("SELECT * FROM tasks WHERE user_id = ".$_SESSION['user']." ")->num_rows;
        return $task_id;
    } 

    public function delete_task ($id) {
            $query = $this->connection->query("DELETE FROM tasks WHERE id = $id ");
            return "Задача удалена";
    } 

    public function edit_task($title, $description, $id) {
        if (mb_strlen($title) > 35) {
            $this->error_valid = true;
        }

        if (!$this->error_valid) {
            $query = $this->connection->query("UPDATE `tasks` SET `title` = '$title', `description` = '$description' WHERE id = $id ");
           
            return 'Задача отредактирована';
        }
        else {
            return 'Введите заголовок до 35 символов';
        }

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
