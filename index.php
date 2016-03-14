<?php
session_start();

require_once 'controller/UserController.php';
$user=new UserController();
var_dump($_GET);
$user->connexion(); //si veux aller sur la page de connexion.
