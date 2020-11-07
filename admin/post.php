<?php 
    include "inc/header.php";
    include "inc/navbar.php"; 
    include "inc/functions.php"; 
    $title      = "";
    $content    = "";
    $author     = "";
    $excerpt    = "";
    $img_name   = "";
    $category   = "";
    $tags       = "";

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['addpost'])) {
            $title      = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $content    = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
            $category   = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
            $excerpt    = filter_input(INPUT_POST, 'excerpt', FILTER_SANITIZE_STRING);
            $tags       = filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
            $author     = "";  // Temporary until creating admin
            
            date_default_timezone_set('Asia/Riyadh');
            $datetime   = date('d-m-y h:m', time());

            $image      = $_FILES['image'];
            $img_name   = $image['name'];         
            $img_type   = $image['type'];         
            $img_tmp    = $image['tmp_name'];         
            $img_size   = $image['size'];    

            // Start Error Section 
            $error_msg = "";
            if(strlen($title) < 10 || strlen($title) > 200) {
                $error_msg = "Title must be between 10 and 200 caracters";
            }elseif(strlen($content) < 500 || strlen($content) > 10000) {
                $error_msg = "Content must be between 500 and 10000 caracters";
            }elseif(strlen($excerpt) < 50 || strlen($excerpt) > 500) {
                $error_msg = "Excerpt must be between 50 and 500 caracters";
            }elseif(strlen($tags) < 3 || strlen($tags) > 10)
            {
                $error_msg = "Tags must be between 3 and 10 caracters"; 
            }else {
                if(!empty($img_name))
                {
                    $img_extenstion = strtolower(explode('.', $img_name)[1]);
                    $allowed_extensions = array('jpg', 'png', 'jpeg');
                    if(! in_array($img_extenstion, $allowed_extensions))
                    {
                        $error_msg = "Allowed Extensions are: jpg, png, jpeg";
                    }elseif($img_size > 1000000) 
                    {
                        $error_msg = "Image Size Must be less than 1M";
                    }
                }
            } // End Error Section
            if(empty($error_msg)) {
                // Insert Data In Database
                if(insert_post($datetime, $title, $content, $author, $excerpt, $img_name, $category, $tags))
                {      
                    $new_path = "uploads/posts/" . $img_name;
                    move_uploaded_file($img_tmp, $new_path);
                }
                echo "save success";
            }
        }
    } elseif(isset($_GET['id'])) {
        $id     = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $post   = get_posts($id);
        $title      = $post['title'];
        $content    = $post['content'];
        $author     = $post['author'];
        $excerpt    = $post['excerpt'];
       // $img_name   = $post['img_name'];
        $category_name   = $post['category'];
        $tags       = $post['tags'];

        

    }   
?>
    <!-- Start Sidebar Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <?php include "inc/sidebar.php"; ?>
            </div>
    <!-- End Sidebar Section -->
    
    <!-- Start post Section -->                
            <div class="col-sm-10">
                <div class="post">
                    <h3>Add New Post</h3>
                    <form action="post.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" value="<?php echo $title; ?>" class="form-control" name="title" placeholder="Title" required autocomplete="off" id="title" maxlength = "200">
                            <p class="error title-error">Title must be between 10 and 200 caracters</p>
                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea rows="6" class="form-control" name="content" placeholder="content" autocomplete="off" id="content" maxlength = "10000"><?php echo $content; ?></textarea>
                            <p class="error content-error">Content must be between 500 and 10000 caracters</p>
                        </div> 

                        <div class="form-group">
                            <select class="form-control" name="category">
                            <?php
                                foreach (get_categories() as $category) {
                                    echo '<option value="$category"';
                                    if($category_name === $category['name']) {
                                        echo "selected >";
                                    } else {
                                        echo ">";
                                    }
                                    echo $category['name'];
                                    echo "</option>";
                                }
                            ?>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <input type="text"  value="<?php echo $excerpt; ?>" class="form-control" name="excerpt" placeholder="excerpt (optional)" autocomplete="off" id="excerpt" maxlength = "500">
                            <p class="error excerpt-error">Excerpt must be between 50 and 500 caracters</p>
                        </div>  
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text"  value="<?php echo $tags; ?>" class="form-control" name="tags" placeholder="tags" autocomplete="off" id="tags" maxlength = "10">
                            <p class="error tags-error">Tags must be between 3 and 10 caracters</p>
                        </div>                                                                                                              
                        <div class="form-group">
                            <?php if(! empty($post['image'])) { ?>
                                <label for="Image">Post Image: </label>
                                <img width= "100" src="uploads/posts/<?php echo $post['image']; ?>">
                            <?php } ?>
                                <input type="file" class="form-control" name="image" placeholder="Image"  id="image">
                        </div>   
                        
                        <button type="submit" value="addpost" name="addpost" class="btn btn-primary" style="float:right;">Add Post</button>                            
                    </form>
                </div>
            </div>
    <!-- End post Section -->                
        </div>
    </div>


<?php include "inc/footer.php"; ?>
