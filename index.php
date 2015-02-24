<?php

include "view/head.phtml";

session_start();


// MAIN
// ASIDE

if(array_key_exists("userName", $_SESSION))
{
    include "view/logged.phtml";
}
else
{
    include "view/welcome.phtml";
}


// ARTICLE

include "view/publication.phtml";



include "view/foot.phtml";


