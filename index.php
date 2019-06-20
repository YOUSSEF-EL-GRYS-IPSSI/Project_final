<?php

define("WEBROOT", str_replace("index.php", "", $_SERVER["SCRIPT_NAME"]));
define("ROOT", str_replace("index.php", "", $_SERVER["SCRIPT_FILENAME"]));

require ('Core/AbstractController.php');
require_once "App/bootstrap.php";
require_once "Core/Application.php";

$appConfig['route'] = $_GET ['p'];
$appConfig['entityManager'] = $entityManager;

Application::run($appConfig);
