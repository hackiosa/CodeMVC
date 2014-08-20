<?php

require_once('./core/Application.class.php');

$app = new Application();

if (isset($_GET['url']) && !empty($_GET['url']))
{
    $data = explode('/', $_GET['url']);
    if (count($data) >= 2)
    {
        $app->run($data[0], $data[1]);
    } else if (count($data) == 1) {
        $app->run($data[0], 'index');
    }
} else {
    $app->run_default();
}

?>