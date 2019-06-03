<?php 
class DBClass {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "aprendev";
    public $connection;

    public function getConnection(){
        $this->connection = null;
        try{
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->connection->exec("set names utf8");
        }catch(PDOException $exception){
            echo "Error: " . $exception->getMessage();
        }
        return $this->connection;
    }
}
?>