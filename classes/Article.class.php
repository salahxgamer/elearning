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
        $query = "SELECT * FROM article INNER JOIN category ON id_categorie=category_id INNER JOIN author ON id_author=author_id AND id_author WHERE article_id=$id;";
        return $this->query($query)->fetch_array();
    }

    // Get all articles
    public function get_all()
    {
        $query = "SELECT * FROM article INNER JOIN category ON id_categorie=category_id ORDER BY `article_created_time`";
        return $this->query($query)->fetch_all(MYSQLI_ASSOC);
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

    // Get latest articles
    public function get_by_category($_category_id)
    {
        $query = "SELECT * FROM article INNER JOIN category ON id_categorie=category_id  WHERE category_id=$_category_id ORDER BY `article_created_time` DESC";
        return $this->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    // Get all categories
    public function get_categories()
    {
        $query = "SELECT * FROM category";
        return $this->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    // Get all comments of an article
    public function get_comments($_id)
    {
        $query = "SELECT * FROM comment INNER JOIN users ON id_user=id WHERE id_article=$_id;";
        return $this->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    // Get all comments of an article
    public function add_comment($data)
    {
        $query = "INSERT INTO `comment` (`comment_content`, `id_user`, `comment_likes`, `id_article`) "
        . "VALUES ('" . $data['comment_content'] . "', " . $data['id_user'] . ", '0', " . $data['id_article'] . ");";
        return $this->query($query);
    }

    // Intermediate query function to prepare and execute sql query
    function query($_sql)
    {
        $_sql = $this->db->prepare($_sql);
        $_sql->execute();
        return $_sql->get_result();
    }
}
