<?php 
    $page_title = "Dashboard";
    include "inc/header.php";
    include "inc/functions.php"; 
    include "inc/navbar.php"; 
?>

<?php
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['updateinfo'])) {
            $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);           
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

            $image = $_FILES['image'];            
            $image_name = $image['name'];
            $image_size = $image['size'];
            $image_tmp_name = $image['tmp_name'];

            // Start Error Section 
            $error_msg = "";
            if(strlen($username) < 4 || strlen($username) > 30) {
                $error_msg = "Username must be between 4 and 30 caracters";
            // }
            // else {
            //     if(!empty($image_name)) {
            //         $img_extenstion = strtolower(explode('.', $image_name)[1]);
            //         $allowed_extensions = array('jpg', 'png', 'jpeg');
            //         if(! in_array($img_extenstion, $allowed_extensions))
            //         {
            //             $error_msg = "Allowed Extensions are: jpg, png, jpeg";
            //         }elseif($image_size > 1000000) 
            //         {
            //             $error_msg = "Image Size Must be less than 1M";
            //         }
            //     }
            } // End Error Section

            if(empty($error_msg)) {
                $updated = "";

                if(empty($image_name)) {
                    $updated = update_admin_profile($username, $email, $image_name, $_SESSION['admin_id']);
                }else {
                    $updated = update_admin_profile($username, $email, $image_name, $_SESSION['admin_id']);
                    var_dump($image_name);
                }
                if($updated) {
                        // sent email to new email with new password to check if he has this email
                    if(! session_id()){
                        session_start();
                    }
                    if(! empty($image_name)) {
                        $new_path = "uploads/admins/".$image_name;
                        move_uploaded_file( $image_tmp_name, $new_path);
                    }
                    $_SESSION['success'] = "Your Info has been Updated Successfully";
                    redirect("profile.php");                
                }else {
                    $_SESSION['error'] = "Unable to Update Your Info";
                    redirect("profile.php");                  
                }
            } 
        } else  {
            if(isset($_POST['updatepassword'])) {
                $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);           
                $password = $_POST['password'];
                $confirmpassword = $_POST['confirmpassword'];
    
                // Start Error Section 
                $error_msg = "";
                if(strlen($password) < 6 || strlen($password) > 20) {
                    $error_msg = "Passwword must be between 6 and 20 characters";
                    if(! session_id()){
                        session_start();
                    }
                    $_SESSION['error'] = $error_msg;
                    redirect("profile.php");                    
                } else if($password !== $confirmpassword) {
                        $error_msg = "Confirm Password Correctly"; 
                        if(! session_id()){
                            session_start();
                        }
                        $_SESSION['error'] = $error_msg;
                        redirect("profile.php");                                            
                } else {
                    if(! session_id()){
                        session_start();
                    }
                    if(empty($error_msg)) {
                        $updated = "";
                        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
                        $updated = update_admin_password($hashpassword, $_SESSION['admin_id']);
                        if($updated) {
                            if(! session_id()){
                                session_start();
                            }
                            $_SESSION['success'] = "Your Password has been Updated Successfully";
                            redirect("profile.php");
                        } else {
                            $_SESSION['error'] = "Unable to Update Your Password";
                            redirect("profile.php");
                        }
                    }                     

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

    <!-- Start Profile Section -->                
        <div class="col-sm">
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
            <div class="profile">
                <div class="row">
                    <div class="col-sm-3 text-center">
                        <img width="150" height="150" class="admin-image img-thumbnail" src="uploads/admins/<?php echo $admin['image']  ?>" alt="Admin Photo">
                        <span class="role_type text-primary"><?php echo $admin['role_type']; ?></span>
                        <h5 class="username"><?php echo $admin['username']; ?></h5>
                        <h6 class="email"><?php echo $admin['email']; ?></h6>
                    </div>
                    <div class="col-sm-8">
                        <div class="update-info">
                            <h5 style="margin-bottom: 10px;">Update admin</h5>
                            <input type="hidden" name="id" value="<?php echo $_SESSION['admin_id']; ?>">
                            <form action="profile.php" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="text" value="<?php echo $admin['username']; ?>" name="username" placeholder="User Name" required class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" value="<?php echo $admin['email']; ?>" name="email" placeholder="Email" required class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <input style="float:right;" type="submit" name="updateinfo" class="btn btn-info" value="Save Info">                                 
                            </form>
                        </div><br><br><hr>
                        <div class="update-password">
                            <h5 style="margin-bottom: 10px;">Update admin Password</h5>
                            <input type="hidden" name="id" value="<?php echo $_SESSION['admin_id']; ?>">                            
                            <form action="profile.php" method="post">
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Password" required class="form-control" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirmpassword" placeholder="Confirm Password" required class="form-control" autocomplete="off">
                                </div>
                                <input style="float:right;" type="submit" name="updatepassword" class="btn btn-info" value="Save Password">   
                            </form>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</div>
<?php include "inc/footer.php"; ?>


