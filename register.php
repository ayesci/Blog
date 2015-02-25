<?php

session_start();
require_once("Helper/Database.class.php");
require_once("Model/User.class.php");

if (array_key_exists("password", $_POST) && array_key_exists("userName", $_POST))
{
    $userManager = new Model_User(); // Model/User.class.php
    $user_result = $userManager->userName_exist($_POST['userName']);

    if ($user_result == true)
    {
        $errorMsg = "Nom déjà enregistré.";
    }
    elseif($user_result == false)
    {
        $new_user = $userManager->addUser($_POST['userName'], $_POST['password']);
        header("Location: index.php");
        exit();
    }
}

include "view/head.phtml";
include "view/entete.phtml";
include "view/register.phtml";





