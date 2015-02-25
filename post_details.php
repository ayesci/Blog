<?php

session_start();
require_once("Helper/Database.class.php");
require_once("Model/Post.class.php");

$postManager = new Model_Post();
$post_publication = $postManager->get_single_post($_GET['id']);

include "view/head.phtml";
include "view/entete.phtml";
include "view/publication.phtml";
include "view/foot.phtml";

?>