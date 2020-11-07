<?php
/* Categories Functions */


function get_categories() 
{
    $sql = "SELECT * FROM categories ORDER BY name ASC";
    include "connect.php";
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
    $sql = "INSERT INTO posts (datetime, title, content, author, excerpt, image, category, tags) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    include "connect.php";
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

function get_posts($id = "") 
{
    include "connect.php";
    $sql = "";
    if(! empty($id)) {
        $sql = "SELECT * FROM posts WHERE id = ?";
    } else {
        $sql = "SELECT * FROM posts ORDER BY datetime DESC";  
    }
    
    try {
        if(! empty($id)) {
            $result = $con->prepare($sql);
            $result->bindValue(1, $id, PDO::PARAM_INT);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        } else {
            $result = $con->query($sql);
            return $result;   
        }        
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return array();
    }
}

function delete($table, $id)
{
    $sql = "DELETE FROM $table WHERE id = ? ";
    include "connect.php";  
    try {
        $result = $con->prepare($sql);
        $result->bindValue(1, $id, PDO::PARAM_INT);
        return $result->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function redirect ($location)
{
    header("Location: $location");
    exit;
}
?>