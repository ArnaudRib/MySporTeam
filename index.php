<?php

session_start();

require("config/Route.php");
$route=new Route;
$route->getPage();
