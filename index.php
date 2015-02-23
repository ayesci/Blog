<?php

include "view/head.phtml";

session_start();
$db=new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "troiswa");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if(array_key_exists("userName", $_SESSION))
{
    include "view/logged.phtml";
}
else
{
    include "view/welcome.phtml";
}




include "view/foot.phtml";


