<?php
defined('BASE_PATH') OR die("<div style='color:red;'>Permisson Denied!</div>");

/*** Auth Functions ***/

// GET LOGGED IN USER ID
function getCurrentUserId() {
    return getLoginUser()->id ?? 0;
}


function getUserByEmail($email) {
    global $pdo;

    $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email' => $email]);
    $record = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $record[0] ?? null;
}

function login($email, $password) {
    $user = getUserByEmail($email);
    
    if (is_null($user)) {
        return false;
    }
    // check password of user
    if (password_verify($password, $user->password)) {
        // login successful
        $user->image = "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $user->email ) ) );
        //
        $_SESSION['login'] = $user;
        return true;
    }

    return false;
}

function logout() {
    unset($_SESSION['login']);   
}

function register($userData) {
    global $pdo;
    // valodation (name , email and password) checking

    // 
    $sql = "INSERT INTO users (name, email, password) value (:name, :email, :password)";
    $stmt = $pdo->prepare($sql);

    $pass = password_hash($userData['password'], PASSWORD_BCRYPT);

    $stmt->bindValue(':name', $userData['name']);
    $stmt->bindValue(':email', $userData['email']);
    $stmt->bindValue(':password', $pass);
    $stmt->execute();

    return $stmt->rowCount() ? true : false;
}

function isLoggedIn() {
    return isset($_SESSION['login']) ? true : false;
}

function getLoginUser() {
    return $_SESSION['login'] ?? null;
}