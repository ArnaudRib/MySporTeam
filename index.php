<?php
session_start();

require_once 'controller/UserController.php';
$user=new UserController();
$user->connexion(); //si veux aller sur la page de connexion.
