<?php
class Connect { private $host = 'localhost';
                private $user = 'root';
                private $pass = '';
                private $db = 'todo';
                public $connection = null;
                public function __construct () {$this->connection = new mysqli ($this->host, $this->user , $this->pass , $this->db);}   }
?>