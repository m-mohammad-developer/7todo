<?php

include "constants.php";
include "config.php";
include BASE_PATH . "vendor/autoload.php";
include BASE_PATH . "libs/helpers.php";

try {
    $pdo = new PDO("mysql:host=$database_config->host;dbname=$database_config->db;", $database_config->user, $database_config->pass);

} catch (PDOException $e) {
    diePage("Connection Failed: " . $e->getMessage());
}

include BASE_PATH . "libs/lib-tasks.php";
include BASE_PATH . "libs/lib-auth.php";




