<?php

session_start();
$db=new PDO("mysql:host=127.0.0.1;dbname=blog", "root", "troiswa");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $db->prepare("SELECT userName
                       FROM users
                       WHERE userName= :userName
                        ");
$query->execute(array("userName") => $_POST['userName']);

$_SESSION['userName'] = $_POST['userName'];
$_SESSION["id"] = $db->lastInsertId();

