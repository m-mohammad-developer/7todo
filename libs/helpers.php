<?php
defined('BASE_PATH') OR die("<div style='color:red;'>Permisson Denied!</div>");

function getCurrentUrl() {
    return 1;
}

function diePage($msg) {
    echo "<div style='padding: 46px; width: 90%; margin: 40px auto; background: #c31c1c; color: white; border: 2px solid #de5454; border-radius: 6px; font-size: 20px; font-family: sans-serif;'>$msg</div>";
    die;
}

function isAjaxRequest() {
    if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ) {
        return true;
    }
    return false;
}

function dd($msg = '') {
    echo '<pre style="color: #ba0101; background: #fff; z-index: 999; position: relative; padding: 10px; margin: 10px; border-radius: 5px; border-left: 3px solid #ff571d;">';
    var_dump($msg);
    echo '</pre>';
    // die;
}