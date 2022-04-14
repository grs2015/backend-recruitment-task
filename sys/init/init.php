<?php

declare(strict_types=1);

define("JSONFile", "./dataset/users.json");

$basic = function($class) {
    $filename = "./sys/class/" . $class . ".php";
    if (file_exists($filename)) {
        include_once $filename;
    }
};

spl_autoload_register($basic);

?>