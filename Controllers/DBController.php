<?php
//Created using Singleton Method!
class DBController{
private static $instance = null;
private $dbHost="localhost";
private $dbUser="root";
private $dbPassword="";
private $dbName="ecommerce";
public $connection;


private function __construct() {
    // private constructor to prevent instantiation from outside
}

public static function getInstance() {
    if (self::$instance === null) {
        self::$instance = new DBController();
    }
    return self::$instance;
}
public function OpenCon(){
    $this->connection=new mysqli($this->dbHost,$this->dbUser,$this->dbPassword,$this->dbName);
    if($this->connection->connect_error){
        echo 'Error in Connection: '.$this->connection->connect_error;
        return false;
    }
    else{
        return true;
    }
}
public function CloseCon(){
    if($this->connection){
     //   echo 'Connection has been closed';
        $this->connection->close();
    }
    else{
        echo 'Connection not established';
    }
}
public function Insert($qry)
{
    $result=$this->connection->query($qry);
    if(!$result)
    {
        echo "Error : ".mysqli_error($this->connection);
        echo "Error (insert/DBContorller)";
        return false;
    }
    else
    {
         return $this->connection->insert_id; // for auto-incremented fields (PK)
    }

}
public function Select($qry)
{
    $result=$this->connection->query($qry); //result is the query statement sent by the user (usually the qry is the query statement string, result is for internal use)
    if(!$result)
    {
        echo "Error : ".mysqli_error($this->connection); 
        echo "Error (Select/DBContorller)";
        return false;
    }
    else
    {
         return $result->fetch_all(MYSQLI_ASSOC); //returns all rows associated with the statement sent
    }
}


public function Update($qry)
{
    $result=$this->connection->query($qry); //result is the query statement sent by the user (usually the qry is the query statement string, result is for internal use)
    if(!$result)
    {
        echo "Error : ".mysqli_error($this->connection); 
        echo "Error (Update/DBContorller)";
        return false;
    }
    else
    {
         return true; //returns all rows associated with the statement sent
    }
}
public function Drop($qry)
{
    $result=$this->connection->query($qry); //result is the query statement sent by the user (usually the qry is the query statement string, result is for internal use)
    if(!$result)
    {
        echo "Error : ".mysqli_error($this->connection); 
        echo "Error (Drop/DBContorller)";
        return false;
    }
    else
    {
         return true; //returns all rows associated with the statement sent
    }
}
}
?>