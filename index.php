<?php
// include must necessary files for application
require_once 'config.php';
require_once 'model/database.php';
require_once 'model/task.php';
require_once 'model/user.php';
require_once 'controller/TaskController.php';
require_once 'controller/UserController.php';

// make an object of home-controller class and handle various function requests
$controller = new userController();
$controller->functionRequest();
$controller = new taskController();
$controller->functionRequest();
