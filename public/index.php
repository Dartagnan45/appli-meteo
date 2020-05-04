<?php
// router   
require '../vendor/autoload.php';
$uri = $_SERVER['REQUEST_URI'];
if ($uri === '/'){
    ob_start();
    $pageContent = require '../templates/home.php';
    $pageContent = ob_get_clean();
} elseif ($uri === '/meteo') {
    $pageContent = require '../templates/meteo.php';
    $pageContent = ob_get_clean();
} else {
    $pageContent = require '../templates/error.php';
    $pageContent = ob_get_clean();
}
require '../elements/layout.php';




