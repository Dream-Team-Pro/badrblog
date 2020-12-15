<?php 
    $page_title = "Admin Page";
    include "inc/header.php";
    include "inc/functions.php"; 
    include "inc/navbar.php"; 
    $id        = "";
    $username  = "";
    $email     = "";
    $roletype  = "";
    $newadmincode = "";

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['addadmin'])) {
            $username   = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $email      = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $roletype   = filter_input(INPUT_POST, 'role_type', FILTER_SANITIZE_STRING);
            $created_by = "";  // Temporary until creating admin

            $newadmincode = rand(10000, 99999);

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
                if(insert_admin($datetime, $username, $email, $password, $roletype, $created_by, $img_name, $newadmincode)) {    
                    if(! empty($img_name)) {
                    $new_path = "uploads/admins/" . $img_name;
                    move_uploaded_file($img_tmp, $new_path);
                    }
                    $_SESSION['success'] = "Admin has been Saved Successfully";
                    redirect("admins.php");
                } else {
                    $_SESSION['error'] = "Unable to Add Admin";
                    redirect("admin.php");
                }
            }   
        } else {
            
            if(isset($_POST['updateadmin'])) {
                $id = filter_input(INPUT_POST,'id' , FILTER_SANITIZE_NUMBER_INT);

                $username   = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $email      = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                $roletype   = filter_input(INPUT_POST, 'role_type', FILTER_SANITIZE_STRING);
                $created_by = "";  // Temporary until creating admin

                $image = $_FILES['image'];
                $img_name = $image['name'];
                $img_tmp = $image['tmp_name'];
                $img_size = $image['size'];

    
                $error_msg = "";
                if(strlen($username) < 5 || strlen($username) > 30) {
                    $error_msg = "Username must be between 5 and 30";
                }else if(strlen($email) < 10 || strlen($email) > 100) {
                    $error_msg = "Email must be between 10 and 100";
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
                        $updated = update_admin($username, $email, $roletype, $created_by, $id);
                    
                    }else {
                        $updated = update_admin($username, $email, $roletype, $created_by, $img_name, $id);
                    }
                    if($updated) {
    
                        if(! session_id()){
                            session_start();
                        }
                        if(! empty($img_name)) {
                            $new_path = "uploads/admins/".$img_name;
                            move_uploaded_file( $img_tmp, $new_path);
                        }
                        $_SESSION['success'] = "Admin has been Updated Successfully";
                        redirect("admins.php");
                    }else {
                        $_SESSION['error'] = "Unable to Update Admin";
                        redirect("admins.php");
                    }
                }
                }
        }

    } elseif(isset($_GET['id'])) {
        $id     = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $admin       = get_admins($id);
        $username      = $admin['username'];
        $email    = $admin['email'];
        $roletype_name     = $admin['role_type'];
       // $img_name   = $admin['img_name'];
    }   
?>
    <!-- Start Sidebar Section -->
    <div class="container-fluid">
        <div class="row">

        <?php include "inc/media_sidebar.php"; ?>

            <div class="col-sm-2">
                <?php include "inc/sidebar.php"; ?>
            </div>
    <!-- End Sidebar Section -->
    
    <!-- Start admin Section -->                
            <div class="col-sm-10">
                <div class="admin">
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
                                <option vaulue="admin">Admin</option>
                                <option vaulue="subscribe">Subscribe</option>
                            </select>
                        </div>  

                        <div class="form-group">
                            <?php if(! empty($admin['image'])) { ?>
                                <label for="Image">Admin Image: </label>
                                <img width= "100" src="uploads/admins/<?php echo $admin['image']; ?>">
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
