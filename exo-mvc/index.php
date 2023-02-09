<?php

require 'services/Router.php';

$route = new Router();

if(isset($_GET['route']))
{
    $route->checkRoute($_GET['route']);
}
