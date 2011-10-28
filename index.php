<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

require_once 'Controllers/autoload.php';

$app = new app();
$app->bootstrap();
