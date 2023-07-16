<?php
require_once '../../Controllers/DBController.php';
require_once '../../Controllers/UserController.php';
require_once '../../Variables/user.php';

$DB = DBController::getInstance();
$user = new user;
$controller = new UserController;
$user->id = $_GET['id'];

if ($DB->OpenCon()) {
  $controller->Delete($user);
  header("location:index.php");
}
?>

