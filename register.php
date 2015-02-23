<?php

session_start();
$db=new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "troiswa");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query= $db->prepare("INSERT INTO users(userName, password)
                      VALUES(:userName, :password)");
$query->execute(array(
    "userName" => $_POST["userName"],
    "password"=>$_POST['password'],
    PASSWORD_DEFAULT)
);

$_SESSION['userName'] = $_POST['username'];

header("Location: index.php");
exit();