<?php
header('Content-Type: application/json');

include "../model/config.php";
include "../model/database.php";
include "../model/user.php";

if (isset($_POST['login']) && !empty($_POST['login'])) {
    $login = htmlspecialchars($_POST['login']);
    if (isset($_POST['password']) && !empty($_POST['password'])) {
        $password = htmlspecialchars($_POST['password']);
        $passHash = password_hash($password, PASSWORD_BCRYPT);
    }
    if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
        $user = new User();
        $token = $user->generateCSRFToken();
        $user->email = $login;
        $user->pass = $passHash;
        $user->token = $token;
        if ($user->addUser()) {
            $getUser = $user->getUserMail();
            session_start();
            $_SESSION['email'] = $getUser->email;
            $_SESSION['token'] = $getUser->token;
            $_SESSION['id'] = $getUser->id;
            $_SESSION['role'] = $getUser->role;
            $response['url'] = 'index.php?id=' . $_SESSION['id'] . '&role=' . $_SESSION['role'] . '&token=' . $_SESSION['token'];
            $response['type'] = 'Success';
            echo json_encode($response);
        } else {
            $response['type'] = "ERROR";
            $response['data'] = 'Une erreur c\'est produite';
            echo json_encode($response);
        }
    } else {
        $response['type'] = "ERROR";
        $response['data'] = 'Une erreur c\'est produite';
        echo json_encode($response);
    }
}
