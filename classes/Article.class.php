<?php

class Article
{
    private $db;

    public function __construct($_db)
    {
        $this->db = $_db;
    }

    // Get a single article
    public function get_article($id)
    {
        $query = "SELECT * FROM article";
        return $this->query($query)->fetch_object();
    }

    // Get latest articles
    public function get_latest($count = 1)
    {
        $query = "SELECT * FROM article INNER JOIN category ON id_categorie=category_id ORDER BY `article_created_time` DESC  LIMIT $count";
        return $this->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    // Get most read articles
    public function get_most_read($count = 1)
    {
        $query = "SELECT * FROM article";
        return $this->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    // Get all categories
    public function get_categories()
    {
        $query = "SELECT * FROM article";
        return $this->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    // Intermediate query function to prepare and execute sql query
    function query($_sql)
    {
        $_sql = $this->db->prepare($_sql);
        $_sql->execute();
        return $_sql->get_result();
    }
}
