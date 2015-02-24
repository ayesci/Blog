<?php


Class Helper_Database
{
    // propriétés
    private $db;

    // methodes
    public function __construct()
    {
        $queryString = "mysql:host=127.0.0.1;dbname=blog";
        $user = "root";
        $password = "troiswa";
        $this->db = new PDO($queryString, $user, $password);

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->exec("SET NAMES UTF8");
    }

    public function fetchAll($query, $data = array())
    {
        $query = $this->db->prepare($query);
        $query->execute($data);
        $res = $query->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function fetchOne($query, $data = array())
    {
        $query = $this->db->prepare($query);
        $query->execute($data);
        $res = $query->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function insert($query, $data)
    {
        $query = $this->db->prepare($query);
        $query->execute($data);
        return $this->db->lastInsertId();
    }
}

