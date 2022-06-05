<?php

class Testimonial
{
    private $db;

    public function __construct($_db)
    {
        $this->db = $_db;
    }

    // Get a single testimonial
    public function get_testimonial($id)
    {
        $query = "SELECT * FROM testimonial LIMIT 1";
        return $this->query($query)->fetch_object();
    }

    // Add a single testimonial
    public function add_testimonial($data)
    {
        $query = "INSERT INTO `testimonial` (`testimonial_id`, `testimonial_content`, `testimonial_rating`, `testimonial_user`, `is_approved`, `created_at`)"
            . "VALUES (NULL, '" . $data['testimonial_content'] . "', '" . $data['testimonial_rating'] . "', '" . $data['testimonial_user'] . "', '1', current_timestamp());";
        return $this->query($query);
    }

    // Remove a single testimonial
    public function delete_testimonial($id)
    {
        $query = "DELETE FROM `testimonial` WHERE `testimonial`.`testimonial_id` = '$id'";
        return $this->query($query);
    }

    // Get all testimonials
    public function get_all()
    {
        $query = "SELECT testimonial.* , username as testimonial_user_username, nom as testimonial_user_nom, prenom as testimonial_user_prenom, profileImage as testimonial_user_profileImage "
            . "FROM testimonial INNER JOIN users ON testimonial_user = users.id ORDER BY `created_at` DESC, `testimonial_id` DESC; ";
        return $this->query($query)->fetch_all(MYSQLI_ASSOC);
    }


    // Extracts the image blob base64 data and returns a strin src for <img>
    public function get_img_src($_testimonial)
    {
        return "data:image/png;base64," . $_testimonial['testimonial_user_profileImage'];
    }

    // Intermediate query function to prepare and execute sql query
    function query($_sql)
    {
        $_sql = $this->db->prepare($_sql);
        $_sql->execute();
        return $_sql->get_result();
    }
}
