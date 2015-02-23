<?php

include "view/head.phtml";
include "view/login.phtml";
require_once("Helper/Database.class.php");
require_once("Model/User.class.php");

session_start();
$db=new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "troiswa");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (array_key_exists("password", $_POST) && array_key_exists("username", $_POST))
{
    header("Location: index.php");
    exit();
}
else
{
    $userManager = new Model_User(); // Model/User.class.php
    if($userManager->verifLogin($_POST['userName'], $_POST['password']) !=false)
    {
        $_SESSION['userName'] = $_POST['userName'];

        header("Location: index.php");
    }

}




include "view/foot.phtml";