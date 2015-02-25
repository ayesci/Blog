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

    public function get_post()
    {
        $query = "SELECT *
                  FROM blog.post
                  JOIN blog.users ON users.id = post.id";
        $post_publication = $this->db->fetchAll($query);
        return $post_publication;
    }

    public function add_post($title, $author, $tags, $content)
    {
        $query = "INSERT INTO blog.post (title, author, tags, content)
                  VALUES (:title, :author, :tags, :content)";
        $data = array(
            "title" => $title,
            "author" => $author,
            "tags" => $tags,
            "content" => $content,
        );
        $new_post = $this->db->insert($query, $data);
        return $new_post;
    }

    public function get_single_post($id_post)
    {
        $query = "SELECT *
                  FROM blog.post
                  JOIN blog.users ON users.id = post.id
                  WHERE post.id = :id
                  ";
        $data = array('id' => $id_post);
        $post_publication = $this->db->fetchAll($query, $data);
        return $post_publication;
    }


}
