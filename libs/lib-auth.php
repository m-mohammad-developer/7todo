<?php
defined('BASE_PATH') OR die("<div style='color:red;'>Permisson Denied!</div>");

/*** Auth Functions ***/

function getCurrentUserId()
{
    // get logged in user id
    return 1;
}
function login($user, $password) {
    return 1;
}


function register($userData) {
    return 1;
}