<?php

Class Model_Post
{

    // propriétés
    private $db;

    // methodes
    public function __construct()
    {
        $this->db = new Helper_Database();
    }

    public function add_post($title, $author, $date, $tags, $comm)
    {
        $query = "INSERT INTO blog.post (title, author, date, tags, comm)
                  VALUES (:title, :author, :date, :tags, :comm)";
        $data = array(
            "title" => $title,
            "author" => $author,
            "date" => $date,
            "tags" => $tags,
            "comm" => $comm,
        );
        $new_post = $this->db->insert($query, $data);
        return $new_post;
    }

    public function get_post()
    {
        $query = "SELECT * FROM blog.post";
        $data = array(
            "title" => $title,
            "author" => $author,
            "date" => $date,
            "tags" => $tags,
            "comm" => $comm,
        );
        $post_publication = $this->db->fetchAll($query, $data);
        return $post_publication;
    }


}
