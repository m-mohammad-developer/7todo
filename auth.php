<?php

include "bootstrap/init.php";

$home = site_url();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_GET['action'];
    if ($action == "register") {
        $result = register($_POST);
        if (!$result)
            message("Error: an Error Accurd in Login");
        else
            message("Registeration Successfully <br>
                <a href='{$home}/auth.php'>Please Login</a>
            ", 'success');
    }
    else if ($action == "login") {
        $result = login($_POST['email'], $_POST['password']);
        if (!$result)
            message("Error: Email Or Password is incorrect");
        else
            redirect(site_url());
    }
}






include "tpl/tpl-auth.php";














