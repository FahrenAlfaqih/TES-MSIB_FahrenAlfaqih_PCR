<?php
// Autoload Models and Controller
require 'Model/UserModel.php';
require 'Model/ReferralModel.php';
require 'Controller/UserController.php';

// Database connection
$pdo = new PDO('mysql:host=localhost;dbname=tesmsib_fahren', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Instantiate models and controller
$userModel = new UserModel($pdo);
$referralModel = new ReferralModel($pdo);
$userController = new UserController($userModel, $referralModel);


// Fetch all users for admin view
$users = $userController->showAllUsers();

// Include views
include 'View/AdminView.php'; 
