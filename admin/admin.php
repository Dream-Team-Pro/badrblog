<?php 
    include "inc/header.php";
    include "inc/navbar.php"; 
    include "inc/functions.php"; 
    $id       = "";
    $username = "";
    $email    = "";

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['addadmin'])) {
            $username   = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $email      = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $roletype   = filter_input(INPUT_POST, 'role_type', FILTER_SANITIZE_STRING);
            $created_by = "";  // Temporary until creating admin

            date_default_timezone_set('Asia/Riyadh');
            $datetime   = date('d-m-y h:m', time());

            $password = password_hash('11111111', PASSWORD_DEFAULT);

            $image      = $_FILES['image'];
            $img_name   = $image['name'];         
            $img_type   = $image['type'];         
            $img_tmp    = $image['tmp_name'];         
            $img_size   = $image['size'];    

            // Start Error Section 
            $error_msg = "";
            if(strlen($username) < 5 || strlen($username) > 30) {
                $error_msg = "Username must be between 5 and 30 caracters";
            }elseif(strlen($email) < 10 || strlen($email) > 100) {
                $error_msg = "Email must be between 10 and 100 caracters";
            }else {
                if(!empty($img_name)) {
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
                if(! session_id()){
                    session_start();
                }
                // Insert Data In Database
                if(insert_admin($datetime, $username, $email, $password, $roletype, $created_by, $img_name)) {                                        
                    if(! empty($image_name)) {
                    $new_path = "uploads/admins/" . $img_name;
                    move_uploaded_file($img_tmp, $new_path);
                    }
                    $_SESSION['success'] = "Admin has been Saved Successfully";
                    redirect("admin.php");
                }else {
                    $_SESSION['error'] = "Unable to Add Admin";
                    redirect("admin.php");
                }
            }   
        } else {
            
            if(isset($_POST['updateadmin'])) {
                $id = filter_input(INPUT_POST,'id' , FILTER_SANITIZE_NUMBER_INT);

                $title = filter_input(INPUT_POST,'title' , FILTER_SANITIZE_STRING);
                $content = filter_input(INPUT_POST,'content' , FILTER_SANITIZE_STRING);
                $category = filter_input(INPUT_POST,'category' , FILTER_SANITIZE_STRING);
                $excerpt = filter_input(INPUT_POST,'excerpt' , FILTER_SANITIZE_STRING);
                $tags = filter_input(INPUT_POST,'tags' , FILTER_SANITIZE_STRING);
                $image = $_FILES['image'];
    
                $img_name = $image['name'];
                $img_tmp = $image['tmp_name'];
                $img_size = $image['size'];
    
    
                $error_msg = "";
                if(strlen($title) < 30 || strlen($title) > 200) {
                    $error_msg = "Title must be between 30 and 200";
                }else if(strlen($content) < 500 || strlen($content) > 10000) {
                    $error_msg = "Content must be between 500 and 10000";
                }else if(! empty($excerpt)){
                    if(strlen($excerpt) < 50 || strlen($excerpt) > 500) {
                        $error_msg = "Excerpt must be between 50 and 500";
                    }
                }else {
    
                    if(! empty($img_name)) { 
                        $img_extension = strtolower(explode('.', $img_name)[1]); // gfdgdfg.jpg
    
                        $allowed_extensions = array('jpg' , 'png' , 'jpeg');
    
                        if(! in_array($img_extension, $allowed_extensions)) {
                            $error_msg = "Allowed Extensions are jpg, png and jpeg ";
                        }else if( $img_size > 1000000) {
                            $error_msg = "Image size must be less than 1M";
                        }
                    }
                }
    
                if(empty($error_msg)) {
                    $updated = "";
    
                    if(empty($image)) {
                        $updated = update_post($title, $content, $excerpt,$category, $tags, $id);
                    }else {
                        $updated = update_post($title, $content, $excerpt,$img_name, $category, $tags, $id);
                    }
                    if($updated) {
    
                        if(! session_id()){
                            session_start();
                        }
                        if(! empty($img_name)) {
                            $new_path = "uploads/posts/".$img_name;
                            move_uploaded_file( $img_tmp, $new_path);
                        }
                        $_SESSION['success'] = "Post has been Updated Successfully";
                        redirect("posts.php");
                    }else {
                        $_SESSION['error'] = "Unable to Update Post";
                        redirect("posts.php");
                    }
                }
                }
        }

    } elseif(isset($_GET['id'])) {
        $id     = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $post       = get_posts($id);
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
    
    <!-- Start admin Section -->                
            <div class="col-sm-10">
                <div class="admin">
                    <?php if(isset($_GET['id'])) { ?>
                        <h4>Edit Admin</h4>
                    <?php } else {  ?>
                        <h4>Add New Admin</h4>
                    <?php } ?>
                    <form action="admin.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
                            <label for="username">Username</label>
                            <input type="text" value="<?php echo $username; ?>" class="form-control" name="username" placeholder="Username" required autocomplete="off" id="username" maxlength = "30">
                            <p class="error username-error">Username must be between 5 and 30 caracters</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="<?php echo $email; ?>" class="form-control" name="email" placeholder="Email" required autocomplete="off" id="email" maxlength = "100">
                            <p class="error email-error">Email must be between 10 and 100 caracters</p>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="role_type">
                                <option value="admin">Admin</option>
                                <option value="subscriber">Subscriber</option>
                            </select>
                        </div>             
                        <div class="form-group">
                            <?php if(! empty($post['image'])) { ?>
                                <label for="Image">Admin Image: </label>
                                <img width= "100" src="uploads/admins/<?php echo $post['image']; ?>">
                            <?php } ?>
                                <input type="file" class="form-control" name="image" placeholder="Image"  id="image">
                        </div>   
                        <?php if(isset($_GET['id'])) { ?>
                            <input type="submit" value="Update Admin" name="updateadmin" class="btn btn-primary" style="float:right;">
                        <?php } else { ?>
                            <input type="submit" value="Add Admin" name="addadmin" class="btn btn-primary" style="float:right;">                 
                        <?php } ?>                        
                           
                    </form>
                </div>
            </div>
    <!-- End admin Section -->                
        </div>
    </div>


<?php include "inc/footer.php"; ?>
