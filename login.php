<?php

session_start();
require_once("Helper/Database.class.php");
require_once("Model/User.class.php");

if (array_key_exists("password", $_POST) && array_key_exists("userName", $_POST))
{
    $userManager = new Model_User(); // Model/User.class.php
    $user_result = $userManager->verif_login($_POST['userName'], $_POST['password']);

    if ($user_result == true) {
        header("Location: index.php");
        exit();
    }
    else
    {
        $errorMsg = "Nom ou mot de passe incorrect.";
    }
}
include "view/head.phtml";
include "view/entete.phtml";
include "view/login.phtml";
include "view/foot.phtml";