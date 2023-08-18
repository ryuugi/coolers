<?php
session_start();
// ERROR HANDLER
error_reporting(E_ALL);
ini_set("display_errors", 0);
function errorHandler($errno,$errstr,$errfile,$errline){
    $message = "Error: [$errno] $errstr - $errfile:$errline ";
    error_log($message . PHP_EOL , 3, "error_log.txt");
}

set_error_handler("errorHandler");

// CONNECTION

class protection{
    private $server = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "coolers_delight";
    private $data;
    private $conn;

    protected function conn(){
        $this->conn = new mysqli($this->server, $this->user, $this->pass, $this->database);

        if ($this->conn->connect_errno > 0) {
            trigger_error("Connection error");
        }else{
            return $this->conn;
        }

    }

    protected function cleaner(){
        $this->data = trim($this->data);
        $this->data = htmlspecialchars($this->data);
        $this->data = stripslashes($this->data);
        return $this->data;
    }

}   


