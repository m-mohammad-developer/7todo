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

    case "addTask":
        $folderId = $_POST['folderId'];
        $taskTitle = $_POST['taskTitle'];
        if ( !isset($folderId) || empty($folderId) ) {
            echo "فولدر را انتخاب کنید";
            die();
        }
        if ( !isset($taskTitle) || strlen($taskTitle) < 3 ) {
            echo "عنوان تسک باید بزرگتر از 2 حرف باشد";
            die();
        }
        echo addTask($taskTitle, $folderId);
        break;
        // UPDATE tasks status
    case "doneSwitch":
            $taskId = $_POST['taskId'];
            if (!isset($taskId) || !is_numeric($taskId)) {
                echo  "آیدی تسک معتبر نیست";
                die();
            }
            echo toggleStatus($taskId);
            break;

    default:
        diePage("Invalid Action!");
}
