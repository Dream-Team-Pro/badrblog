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
                    redirect('index.php');
                } else {
                    // true admin but wrong password 
                    if(! session_id()) {
                        session_start();
                    }
                    $_SESSION['error'] = "Wrong Password, If You can not remember Your password, click <a href='#' class='forgot-password'>Forgot my password</a>";
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


<?php include "inc/footer.php"; ?>