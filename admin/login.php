<?php 
    $page_title = "Admin Login | Badrblog";
    include "inc/header.php";
    include "inc/functions.php"; 
?>

<?php                                              
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['login'])) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);             
            $password = $_POST['password'];                          
            
            $admin_found = is_admin($email);
            if(! empty($admin_found)) {
                // check password
                if(password_verify($password, $admin_found['password'])) {
                    // true admin
                    if(! session_id()) {
                        session_start();
                    }
                    $_SESSION['admin_username'] = $admin_found['username'];
                    $_SESSION['admin_email'] = $admin_found['email'];
                    $_SESSION['admin_id'] = $admin_found['id'];

                    update_reset_password_code($_SESSION['admin_email']);
                    
                   redirect('index.php');
                } else {
                    // true admin but wrong password 
                    if(! session_id()) {
                        session_start();
                    }
                    $_SESSION['error'] = "Wrong Password, If You can not remember Your password, click <a href='#' class='forgot-password' data-toggle='modal' data-target='#forgotpassword'>Forgot my password</a>";
                }// exit if password verify found
            } else {
                // show error wrong email
                if(! session_id()) {
                    session_start();
                }
                $_SESSION['error'] = "Wrong Email, You can not access";
                redirect('login.php');
            } // exit if admin found
        } // Exit if login post
        else {
            if(isset($_POST['resetpassword'])) {
                $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
                $admin = is_admin($email);

                if(! empty($admin)) {
                    $reset_password_code = $admin['reset_password_code'];
                    // mail function 
                    if(! session_id()) {
                        session_start();
                    }
                    $_SESSION['email'] = $emil;
                    redirect('resetpassword.php');

                } // Exit if admin reset foud
            } // Exit if Reset password button
        }
    } // Exit if request method === post

?>


<div class="login">
    <div class="login-form">
                <?php
                    if(! session_id()) {
                        session_start();
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
        <h5>hello Admin</h5>
        <form action="login.php" method="POST">
            <div class="form-group">
                <input type="email" name="email" id="email" placeholder="Email" required autocomplete="off" class="form-control">
                <i class="fa fa-envelope"></i>

            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Password" required autocomplete="off" class="form-control">
                <i class="fa fa-unlock-alt" aria-hidden="true"></i>
            </div>
            <input type="submit" name="login" value="login" class="btn btn-default form-control">
        </form>
    </div>
</div>

<div class="modal fade" id="forgotpassword" tabindex="-1" aria-labelledby="forgotpassword" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="forgotpassword">Reset Your Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="resetpassword.php" method="POST">
          <div class="form-group">
            <label for="email" class="col-form-label">Email :</label>
            <input type="email" class="form-control" placeholder="Write Your Email">
            <input type="submit" name="resetpassword" value="Send Email" class="btn btn-default form-control">
          </div>
      </div>
    </div>
  </div>
</div>

<?php include "inc/footer.php"; ?>