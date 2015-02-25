<?php
session_start();
require_once("Helper/Database.class.php");
require_once("Model/Post.class.php");
include "view/head.phtml";

// ENTETE
include "view/entete.phtml";

// PRINCIPALE

// ARTICLE

// publication de tous les articles de la base de données
$postManager = new Model_Post();
$post_publication = $postManager->get_post();

// Ajout d'un article dans la base de données
$postManager = new Model_Post();
$new_post = $postManager->get_post();

// Structure phtml des articles
include "view/publication.phtml";


// ASIDE

if(array_key_exists("userName", $_SESSION))
{
    include "view/logged.phtml";
}
else
{
    include "view/welcome.phtml";
}

include "view/tags.phtml";




include "view/foot.phtml";


