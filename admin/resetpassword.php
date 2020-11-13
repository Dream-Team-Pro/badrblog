<?php 
    $page_title = "Reset Password | Badrblog";
    include "inc/header.php";
    include "inc/functions.php"; 
?>

<?php 

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['submitcode'])) {
            if(! session_id()) {
                session_start();
                $email = $_SESSTION['email'];                
            }
            $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRIN);

            $user_code = is_admin($email)['reset_password_code'];

            if($code === $user_code) {
                $_SESSTION['success'] = "Code submitted Successfully, Please Change Your Password";
                redirect("profile.php#change_password");
            } else {
                if(! session_id()) {
                    session_start();
                }                
                $FILTER_SANITIZE_STRIN['error'] = "Wrong Code, Please try again";
                redirect("login.php");
            }
        }
    }


?>


<div class="container">
    <div class="reset-password-form">
        <form action="resetpassword.php" method="POST" >
            <input type="text" name="code" required placeholder="Reset Password Code" autocomplete="off" class="form-control">
            <input type="submit" value="Reset Password" name="submitcode" required class="form-control btn btn-default">
        </form>
    </div>
</div>