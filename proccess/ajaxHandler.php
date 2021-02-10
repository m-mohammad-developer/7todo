<?php
// defined('BASE_PATH') OR die("<div style='color:red;'>Permisson Denied!</div>");

include_once "../bootstrap/init.php";

if(!isAjaxRequest()) {
    diePage("Invalid Request!");
}

// var_dump($_SERVER['HTTP_X_REQUESTED_WITH']);

if(!isset($_POST['action']) || empty($_POST['action'])) {
    diePage("Invalid Action!");
}

switch ($_POST['action']) {
    case "addFolder":
        if (!isset($_POST['folderName']) || strlen($_POST['folderName']) < 3) {
            echo "نام فولدر باید بزرگتر از 3 حرف باشد";
            die();
        }
        echo addFolder($_POST['folderName']);
        break;
    // case "addTask":
    //     var_dump($_POST['action']);
    //     break;

    default:
        diePage("Invalid Action!");
}
