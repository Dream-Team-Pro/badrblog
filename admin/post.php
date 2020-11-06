<?php 
    include "inc/header.php";
    include "inc/navbar.php"; 
    include "inc/functions.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if(isset($_POST['addpost'])) {
            $title      = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $content    = filter_input(INPUT_POST, 'content', FILTER_SANITIZE_STRING);
            $category   = filter_input(INPUT_POST, 'category', FILTER_SANITIZE_STRING);
            $excerpt    = filter_input(INPUT_POST, 'excerpt', FILTER_SANITIZE_STRING);
            $tags       = filter_input(INPUT_POST, 'tags', FILTER_SANITIZE_STRING);
            $author     = "";  // Temporary until creating admin
            
            date_default_timezone_set('Asia/Riyadh');
            $datetime   = date('M-D-Y h:m', time());

            $image      = $_FILES['image'];
            $img_name   = $image['name'];         
            $img_type   = $image['type'];         
            $img_tmp    = $image['tmp_name'];         
            $img_size   = $image['size'];    
            
            // Start Error Section 
            $error_msg = "";
            if(strlen($title) < 10 || strlen($title) > 200) 
            {
                $error_msg = "Title must be between 10 and 200 cahracters";
            }elseif(strlen($content) < 500 || strlen($content) > 10000) 
            {
                $error_msg = "Content must be between 500 and 10000 cahracters";
            }elseif(strlen($excerpt) < 50 || strlen($excerpt) > 200)
            {
                $error_msg = "Excerpt must be between 50 and 500 cahracters";
            }elseif(strlen($tags) < 3 || strlen($tags) > 10)
            {
                $error_msg = "Tags must be between 3 and 100 cahracters"; 
            }else
            {
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
            
            if(empty($error_msg)) 
            {
                // Insert Data In Database
                if(insert_post($datetime, $title, $content, $author, $excerpt, $img_name, $category, $tags))
                {
                    echo "Inserted Post Data Successful";
                }
            }
        }
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
                            <input type="text" class="form-control" name="title" placeholder="Title" required autocomplete="off" id="title">
                            <p class="error title-error">Title must be between 10 and 200 cahracters</p>
                        </div>
                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea rows="6" class="form-control" name="content" placeholder="content" autocomplete="off" id="content"></textarea>
                            <p class="error content-error">Content must be between 500 and 10000 cahracters</p>
                        </div> 

                        <div class="form-group">
                            <select class="form-control" name="category">
                            <?php
                                foreach (get_categories() as $category) {
                                    echo "<option>";
                                    echo $category['name'];
                                    echo "</option>";
                                }
                            ?>
                            </select>
                        </div>  
                        <div class="form-group">
                            <label for="excerpt">Excerpt</label>
                            <input type="text" class="form-control" name="excerpt" placeholder="excerpt (optional)" autocomplete="off" id="excerpt">
                            <p class="error excerpt-error">Excerpt must be between 50 and 500 cahracters</p>
                        </div>  
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <input type="text" class="form-control" name="tags" placeholder="tags" autocomplete="off" id="tags">
                            <p class="error tags-error">Tags must be between 3 and 100 cahracters</p>
                        </div>                                                                                                              
                        <div class="form-group">
                            <label for="Image">Image</label>
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
