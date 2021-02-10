<?php

include "bootstrap/init.php";


if (isset($_GET['delete_folder']) && is_numeric($_GET['delete_folder'])) {
    $deleted_conut = deleteFolder($_GET['delete_folder']);
    // echo $deleted_conut . " Successfully Deleted";
}


if (isset($_GET['delete_task']) && is_numeric($_GET['delete_task'])) {
    $deleted_conut = deleteTask($_GET['delete_task']);
    // echo $deleted_conut . " Task Successfully Deleted";
}


$folders = getFolders();
$tasks = getTasks();

// dd($tasks);


include "tpl/tpl-index.php";














