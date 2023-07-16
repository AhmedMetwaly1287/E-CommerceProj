<?php
require_once '../../Controllers/DBController.php';
require_once '../../Controllers/AuthController.php';
require_once '../../Controllers/UPInterface.php';
require_once '../../Variables/user.php';

$Auth = new AuthController;
$user = new User;
Class UserController implements UP{
    
private $DB;
private $Auth;
private $user;


public function __construct() {
    $this->DB = DBController::getInstance();
  }

  public function addUser(User $user){
    if($this->DB->OpenCon()){
      $stmt = "insert into user values('','$user->email','$user->password','$user->fname','$user->lname','',now(),'1')";
      $this->DB->insert($stmt);
      return true;
    }
    else{return false;}
   
  } 

  public function addPic(User $user){
    if($this->DB->OpenCon()){
      $stmt = "update user set image ='{$user->image}' where id='{$user->id}'";
      $this->DB->Update($stmt);
      return true;
    }
    else{return false;}
   
  } 


  public function editUserFName(User $user){
    if($this->DB->OpenCon()){
      $stmt ="update user set fname = '{$user->fname}' where id = '{$user->id}'";
      $this->DB->Update($stmt);

      return true;
    }
    else{return false;}
   

  }

  public function editUserLName(User $user){
    if($this->DB->OpenCon()){
      $stmt ="update user set lname = '{$user->lname}' where id = '{$user->id}'";
      $this->DB->Update($stmt);

      return true;
    }
    else{return false;}
   

  }

  public function editUserEmail(User $user){
    if($this->DB->OpenCon()){
      $stmt ="update user set email = '{$user->email}' where id = '{$user->id}'";
      $this->DB->Update($stmt);

      return true;
    }
    else{return false;}
   

  }
  public function editUserPassword(User $user){

    if($this->DB->OpenCon()){
      $options = ['cost' => 12];
        $hashedpassword= password_hash($user->password, PASSWORD_BCRYPT,$options);
      $stmt ="update user set password = '{$hashedpassword}' where id = '{$user->id}'";
      $user->password = $hashedpassword;
      $this->DB->Update($stmt);

      return true;
    }
    else{return false;}
   

  }

  public function editUserRole(User $user){
    if($this->DB->OpenCon()){
      $stmt ="update user set roleid = '{$user->roleid}' where id = '{$user->id}'";
      $this->DB->Update($stmt);

      return true;
    }
    else{return false;}
   

  }


public function getAll(){
    if($this->DB->OpenCon()){
      $stmt = "select id,fname,lname,email,image,roleid from user";
      return $this->DB->Select($stmt);

    }
    else{
      return false;
    }
   
  }
  public function getByID(User $user){
    if($this->DB->OpenCon()){
      $stmt = "select * from user where id ='{$user->id}'";
      return $this->DB->Select($stmt);

    }
    else{
      return false;
    }
   

  }

  public function getByEmail(User $user){
    if($this->DB->OpenCon()){
      $stmt = "select id,fname,lname,email,roleid,image from user where email ='{$user->email}'";
      return $this->DB->Select($stmt);

    }
    else{
      return false;
    }
   

  }

  public function Delete(User $user){
    if($this->DB->OpenCon()){
      $stmt = "Delete from user where id='{$user->id}' or email ='{$user->email}'";
      return $this->DB->Drop($stmt);
    }
    else{
      return false;
    }
   

  }

  public function NoOfUsers(){
    if($this->DB->OpenCon()){
      $stmt = "select * from user";
      return $this->DB->Select($stmt);

    }
    else{
      return false;
    }
   
  }
}

?>