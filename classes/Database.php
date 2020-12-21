<?php 
class Database {

    private $host = 'localhost';
    private $dbname = 'petanikita'; 
    private $username = 'root';
    private $password = '';
    private $error;
    private $pdo;
    private $stmnt;

    public function __construct(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        try{
            $this->pdo = new PDO($dsn,$this->username,$this->password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
            
        }catch (PDOException $e){
            $this->error = $e->getMessage();
            return $this->error;
        }
    }

    public function query($sql){
        $this->stmnt = $this->pdo->prepare($sql);
    }

    public function bind($parameter, $value, $type = null){
        switch (is_null($type)){
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->stmnt->bindValue($parameter,$value,$type);
    }

    public function execute(){
    return  $this->stmnt->execute();        
    }
    
    public function resultSet(){

        $this->execute();
        return $this->stmnt->fetchAll(PDO::FETCH_OBJ);
    }

    public function single(){
        $this->execute();
        return $this->stmnt->fetch(PDO::FETCH_OBJ);
    }

    public function singleArr(){
        
        $this->execute();
        return $this->stmnt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() {
        return $this->stmnt->rowCount();
    }
}