<?php 
    $page_title = "Settings Page";
    include "inc/header.php";
    include "inc/functions.php";
    include "inc/navbar.php"; 
    $settings = "active";
?>

<?php 

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['save-general'])) {
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
            $tagline = filter_input(INPUT_POST, 'tagline', FILTER_SANITIZE_STRING);
            
            $logo = $_FILES['logo'];
            
            $logo_name = $logo['name'];
            $logo_size = $logo['size'];
            $logo_type = $logo['type'];
            $logo_tmp = $logo['tmp_name'];

            // Start Error Section 
            $error_msg = "";
            if(strlen($name) < 3 || strlen($name) > 20) {
                $error_msg = "Site Name must be between 3 and 20 caracters";
            }elseif(strlen($tagline) < 10 || strlen($tagline) > 100) {
                $error_msg = "Tagline must be between 10 and 100 caracters";
            }else {
                if(!empty($logo_name)) {
                    $img_extenstion = strtolower(explode('.', $logo_name)[1]);
                    $allowed_extensions = array('jpg', 'png', 'jpeg');
                    if(! in_array($img_extenstion, $allowed_extensions))
                    {
                        $error_msg = "Allowed Extensions are: jpg, png, jpeg";
                    }elseif($logo_size > 2000000) 
                    {
                        $error_msg = "Logo Size Must be less than 1M";
                    }
                }
            } // End Error Section

            if(empty($error_msg)) {
                $updated = "";

                if(empty($logo_name)) {
                    $updated = update_settings($name, $tagline);
                }else {
                    $updated = update_settings($name, $tagline, $logo_name);
                }

                if($updated) {
                    if(! session_id()){
                        session_start();
                    }
                    if(! empty($logo_name)) {
                        $new_path = "uploads/admins/".$logo_name;
                        move_uploaded_file( $logo_tmp, $new_path);
                    }
                    $_SESSION['success'] = "General Settings has been Updated Successfully";
                    redirect("settings.php");
                }else {
                    $_SESSION['error'] = "Unable to Update General Settings";
                    redirect("settings.php");
                }
            }           
        } else {
            
            if (isset($_POST['save-posts'])) {
                $home_posts_number = filter_input(INPUT_POST, 'home_posts_number', FILTER_SANITIZE_NUMBER_INT);
                $posts_order = filter_input(INPUT_POST, 'posts_order', FILTER_SANITIZE_STRING);
                $recent_posts_number = filter_input(INPUT_POST, 'recent_posts_number', FILTER_SANITIZE_NUMBER_INT);
                $related_posts_number = filter_input(INPUT_POST, 'related_posts_number', FILTER_SANITIZE_NUMBER_INT);

                $updated = update_post_settings($home_posts_number, $posts_order, $recent_posts_number, $related_posts_number);

                if($updated) {
                    if(! session_id()){
                        session_start();
                    }
                    $_SESSION['success'] = "Posts Settings has been Updated Successfully";
                    redirect("settings.php");
                }else {
                   $_SESSION['error'] = "Unable to Update Posts Settings";
                    redirect("settings.php");
                }
            }          
        }
    }

foreach (get_settings() as $setting) {
    $name = $setting['name'];
    $tagline = $setting['tagline'];
    $logo = $setting['logo'];
    $home_posts_number = $setting['home_posts_number'];
    $posts_order = $setting['posts_order'];
    $recent_posts_number = $setting['recent_posts_number'];
    $related_posts_number = $setting['related_posts_number'];
}

?>
    <!-- Start Sidebar Section -->
    <div class="container-fluid">
        <div class="row">

        <?php include "inc/media_sidebar.php"; ?>
            
            <div class="col-sm-2">
                <?php include "inc/sidebar.php"; ?>
            </div>
            <div class="col-sm-10">
                <div class="settings">

                <?php
                    if(! session_id()) {
                        session_start();
                    }
                    if(isset($_SESSION['success']) && ! empty($_SESSION['success'])) {
                        echo "<div class='alert alert-success alert-dismissible fade show'>";
                        echo $_SESSION['success'];
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";
                        $_SESSION['success'] = "";

                    }
                    if(isset($_SESSION['error']) && ! empty($_SESSION['error'])) {
                        echo "<div class='alert alert-danger alert-dismissible fade show'>";
                        echo $_SESSION['error'];
                        echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>";
                        echo "<span aria-hidden='true'>&times;</span>";
                        echo "</button>";
                        echo "</div>";   
                        $_SESSION['error'] = "";                 
                    }                                                    
                ?>                 
                    <div class="general-settings">
                   
                        <h5>General Settings</h5>
                        <form action="settings.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="">Site Name :</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                
                                        <input value="<?php echo $name; ?>" type="text" name="name" class="form-control" placeholder="Site Name" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="">Site Tagline :</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                
                                        <input value="<?php echo $tagline; ?>" type="text" name="tagline" class="form-control" placeholder="Tagline" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="">Site Logo :</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group"> 
                                        <img class="logo" width="100" height="100" src="uploads/admins/<?php echo $logo; ?>" alt="Site Logo">                               
                                        <input type="file" name="logo" class="form-control">
                                        <input style="float:right;" type="submit" name="save-general" class="btn btn-info" value="Save Changes">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="posts-settings">                    
                        <h5>Posts Settings</h5>
                        <form action="settings.php" method="POST">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="">Home Posts Number :</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                
                                        <input value="<?php echo $home_posts_number; ?>" min="2" max="20" type="number" name="home_posts_number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="">Posts Order :</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                
                                        <select name="posts_order" class="form-control">
                                            <?php
                                                if ($posts_order === 'Newest') {
                                                    echo "<option value='Newest' selected>Newest</option>";
                                                    echo "<option value='Oldest'>Oldest</option>";
                                                } else {
                                                    echo "<option value='Newest'>Newest</option>";
                                                    echo "<option value='Oldest'selected>Oldest</option>";                                                    
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="">Recent Posts Number :</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                
                                        <input value="<?php echo $recent_posts_number; ?>" min="2" max="10" type="number" name="recent_posts_number" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="">Related Posts Number :</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                
                                        <input value="<?php echo $related_posts_number; ?>" min="1" max="3" type="number" name="related_posts_number" class="form-control">
                                        <input style="float:right;" type="submit" name="save-posts" class="btn btn-info" value="Save Changes">                                  
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sidebar Section -->

<?php include "inc/footer.php"; ?>
