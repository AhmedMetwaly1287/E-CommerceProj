<?php
require_once 'DBController.php';
require_once '../../Variables/User.php';
$user = new User;
class AuthController{
    private $DB;
    private $u;
    private $user;
    public function __construct() {
        $this->DB = DBController::getInstance();
      }
    public function checkAdmin(){
        if($_SESSION['roleID']==1){
            session_destroy();
            header("location:../Auth/login.php");
            return false;
          }
          else{
            return true;
          }
    }

    public function Encrypt(User $user){
        $options = ['cost' => 12];
        return password_hash($user->password, PASSWORD_BCRYPT,$options);
    }
    public function RetrievePassword(User $user){
        $stmt ="Select password from user where id='{$user->id}'";
        $hashed=$this->DB->Select($stmt);
        return $hashed;
    }


}
?>