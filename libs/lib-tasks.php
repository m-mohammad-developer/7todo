<?php
defined('BASE_PATH') OR die("<div style='color:red;'>Permisson Denied!</div>");

/*** Folder Fucntions ***/
function addFolder($folder_name) {
    global $pdo;
    $current_user_id = getCurrentUserId();

    $sql = "INSERT INTO folders (name, user_id) VALUES (:name, :user_id)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':name'   , $folder_name);
    $stmt->bindParam(':user_id', $current_user_id);
    $stmt->execute();

    return $stmt->rowCount();
}


function deleteFolder($folder_id) {
    global $pdo;
    // $current_user_id = getCurrentUserId();
    $sql = "delete from folders where id = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $folder_id);
    $stmt->execute();

    return $stmt->rowCount();
}


function getFolders() {
    global $pdo;
    $current_user_id = getCurrentUserId();

    $sql = "select * from folders where user_id = $current_user_id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $records =  $stmt->fetchAll(PDO::FETCH_OBJ);

    return $records;
}


/*** Task Fucntions ***/
function addTasks() {
    return [1, 2, 3];
}

function getTasks() {
    global $pdo;

    $folderCondition = '';
    $folder = $_GET['folder_id'] ?? null;
    if (isset($folder) && is_numeric($folder)) {
        $folderCondition = " and folder_id = $folder";
    }

    $current_user_id = getCurrentUserId();
    $sql = "select * from tasks where user_id = ? $folderCondition";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $current_user_id);
    
    $stmt->execute();
    $records =  $stmt->fetchAll(PDO::FETCH_OBJ);

    return $records;
}

function deleteTask($task_id) {
    global $pdo;

    
    // $current_user_id = getCurrentUserId();
    $sql = "delete from tasks where id = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $task_id);
    $stmt->execute();

    return $stmt->rowCount();
}

