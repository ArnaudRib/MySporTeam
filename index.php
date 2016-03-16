<?php

session_start();

require("config/Route.php");
var_dump($_GET['p']);
$route=new Route;
$route->getPage();


/*require_once 'controller/UserController.php';
$user=new UserController();
$user->connexion(); //si veux aller sur la page de connexion.
*/
