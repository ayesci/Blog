<?php

session_start();
require_once("Helper/Database.class.php");
require_once("Model/User.class.php");


$postManager = new Model_User(); // Model/User.class.php
$post_result = $postManager->get_post($_POST['title'], $_POST['autor'], $_POST['tags'], $_POST['date'], $_POST['comm']);

if ($post_result == true)
{
    header("Location: index.php");
    exit();
}
else
{
    $errorMsg = "Article non publié.";
}










include "view/head.phtml";
include "view/post.phtml";
include "view/foot.phtml";

