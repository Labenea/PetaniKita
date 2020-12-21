<?php 
    include('includes/autoloader.inc.php');
    require_once('./Helper/sessions_helper.php');
    require_once('./Config/Config.php');
    require_once('Routes.php');

    $app = new Route();

    $app->resolve();
?>