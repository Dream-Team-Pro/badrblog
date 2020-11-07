<?php
/* Categories Functions */
function get_categories() 
{
    include "connect.php";
    $sql = "SELECT * FROM categories ORDER BY name ASC";

    try {
        $result = $con->query($sql);
        return $result;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return array();
    }
}

/* Post Functions */
function insert_post($datetime, $title, $content, $author, $excerpt, $image, $category, $tags)
{
    $fields = array($datetime, $title, $content, $author, $excerpt, $image, $category, $tags);
    include "connect.php";
    $sql = "INSERT INTO posts (datetime, title, content, author, excerpt, image, category, tags) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    try {
        $result = $con->prepare($sql);

        for ($i=1; $i < 9; $i++) { 
            $result->bindValue($i, $fields[$i - 1], PDO::PARAM_STR);
        }
        return $result->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function get_posts() 
{
    include "connect.php";
    $sql = "SELECT * FROM posts ORDER BY datetime DESC";

    try {
        $result = $con->query($sql);
        return $result;
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return array();
    }
}

?>