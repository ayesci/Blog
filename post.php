<?php

session_start();
require_once("Helper/Database.class.php");
require_once("Model/Post.class.php");


if (array_key_exists('title', $_POST))
{
    $postManager = new Model_Post();
    $new_post = $postManager->add_post(
        $_POST['title'],
        $_SESSION['id'],
        $_POST['tags'],
        $_POST['content']
    );
    if ($new_post == true)
    {
        header("Location: index.php");
        exit();
    }
    else
    {
        $errorMsg = "Article non publié.";
    }
}

include "view/head.phtml";
include "view/entete.phtml";
include "view/post.phtml";
include "view/foot.phtml";

