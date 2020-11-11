<?php

/* Categories Functions */
function get_categories($id = "") {
    include "connect.php";
    $sql = "";
    if(! empty($id)) {
        $sql = "SELECT * FROM categories WHERE id = ? ";
    } else {
        $sql = "SELECT * FROM categories ORDER BY datetime DESC";  
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

function insert_category($datetime, $name, $creater_name) {
    $fields = array($datetime, $name, $creater_name);
    $sql = "INSERT INTO categories (datetime, name, creater_name) VALUES (?, ?, ?)";    
    include "connect.php";
    try {
        $result = $con->prepare($sql);
        for ($i=1; $i <= 3; $i++) { 
            $result->bindValue($i, $fields[$i - 1], PDO::PARAM_STR);
        }
        return $result->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }    
}

function update_category($name, $id) {
    include "connect.php";  
        $sql = "";
        $sql = "UPDATE categories SET name = ? WHERE id = ?";
    try {
        $result = $con->prepare($sql);
        $result->bindValue(1, $name, PDO::PARAM_STR);            
        $result->bindValue(2, $id, PDO::PARAM_INT);                     
        return $result->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

/* Posts Functions */
function insert_post($datetime, $title, $content, $author, $excerpt, $image, $category, $tags) {
    $fields = array($datetime, $title, $content, $author, $excerpt, $image, $category, $tags);
    $sql = "INSERT INTO posts (datetime, title, content, author, excerpt, image, category, tags) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    include "connect.php";
    try {
        $result = $con->prepare($sql);
        for ($i=1; $i <= 8; $i++) { 
            $result->bindValue($i, $fields[$i - 1], PDO::PARAM_STR);
        }
        return $result->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function get_posts($id = "") {
    include "connect.php";
    $sql = "";
    if(! empty($id)) {
        $sql = "SELECT * FROM posts WHERE id = ? ";
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

function delete($table, $id) {
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

function update_post($title, $content, $excerpt, $image = "", $category, $tags, $id) {
    include "connect.php";  
    $fields = array($title, $content, $excerpt, $category, $tags);  
    $sql = "";
    if (empty($image)) {
        $sql = "UPDATE posts SET title = ?, content = ?, excerpt = ?, category = ?, tags = ? WHERE id = ?";
    } else {
        $sql = "UPDATE posts SET title = ?, content = ?, excerpt = ?, category = ?, tags = ?, image = ? WHERE id = ?";
    }
    try {
        $result = $con->prepare($sql);
        for ($i=1; $i <= 5; $i++) { 
            $result->bindValue($i, $fields[$i - 1], PDO::PARAM_STR);            
        }
        if(! empty($image)) {        
            $result->bindValue(6, $image, PDO::PARAM_STR);
            $result->bindValue(7, $id, PDO::PARAM_INT);            
        } else {
            $result->bindValue(6, $id, PDO::PARAM_INT);    
        }
        return $result->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

/* Admin Functions */
function insert_admin($datetime, $username, $email, $password, $roletype, $created_by, $img_name) {
    $fields = array($datetime, $username, $email, $password, $roletype, $created_by, $img_name);
    include "connect.php";  
    $sql = "INSERT INTO admins (datetime, username, email, password, role_type, created_by, image) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    try {
        $result = $con->prepare($sql);
        for ($i=1; $i <= 7; $i++) { 
            $result->bindValue($i, $fields[$i - 1], PDO::PARAM_STR);
        }
        return $result->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

function update_admin($username, $email, $roletype, $created_by = "", $image = "", $id) {
    include "connect.php";  
    $fields = array($username, $email, $roletype, $created_by);  
    $sql = "";
    if (empty($image)) {
        $sql = "UPDATE admins SET username = ?, email = ?, role_type = ?, created_by = ? WHERE id = ?";
    } else {
        $sql = "UPDATE admins SET username = ?, email = ?, role_type = ?, created_by = ?, image = ? WHERE id = ?";
    }
    try {
        $result = $con->prepare($sql);
        for ($i=1; $i <= 4; $i++) { 
            $result->bindValue($i, $fields[$i - 1], PDO::PARAM_STR);            
        }
        if(! empty($image)) {        
            $result->bindValue(5, $image, PDO::PARAM_STR);
            $result->bindValue(6, $id, PDO::PARAM_INT);            
        } else {
            $result->bindValue(5, $id, PDO::PARAM_INT);    
        }
        return $result->execute();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false;
    }
}

function get_admins($id = "") {
    include "connect.php";
    $sql = "";
    if(! empty($id)) {
        $sql = "SELECT * FROM admins WHERE id = ? ";
    } else {
        $sql = "SELECT * FROM admins ORDER BY datetime DESC";  
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



/* Redirect Location */ 
function redirect ($location) {
    header("Location: $location");
    exit;
}

?>