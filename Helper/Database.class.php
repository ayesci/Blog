<?php

session_start();
$db = new Helper_Database("mysql:host=127.0.0.1;dbname=blog", "root", "troiswa");


Class Helper_Database
{
    // propriétés
    private $db;

    // methodes
    public function __construct($queryString, $userName, $password)
    {
        $this->db = new PDO($queryString, $userName, $password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("SET NAMES UTF8");
    }

    public function fetchAll($query, $data = array())
    {
        $query = $this->db->prepare($query);
        $query->execute($data);
        $res = $query->fetchAll();
        return $res;
    }

    public function fetchOne($query, $data = array())
    {
        $query = $this->db->prepare($query);
        $query->execute($data);
        $res = $query->fetch();
        return $res;
    }
}


$userManager = $db->fetchAll("SELECT *
                              FROM Database
                              WHERE user = :id", array("id" => 1));

