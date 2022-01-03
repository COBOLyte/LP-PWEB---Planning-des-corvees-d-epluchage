<?php
class Connection {
    private $login;
    private $pwd;
    private $db;
    
    public function __construct() {
        //$this->login = "";
        //$this->pwd = "";
        
        try { $this->db = new MongoDB\Client("mongodb://localhost:27017"); }
        catch (MongoDB\Driver\Exception\InvalidArgumentException $e) {
            echo $e->getMessage();
        }
    }
    
    public function getDb() { return $this->db; }
}
?>
