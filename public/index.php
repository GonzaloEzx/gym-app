<?php
require_once '../app/bootstrap.php';
require_once '../app/init.php';  // Asumiendo que tienes un archivo init.php para configurar tu app

$app = new App;  // App es una clase que configura y maneja toda la lógica de routing
$init = new Core;