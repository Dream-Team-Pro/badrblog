<?php 
    $page_title = "Admin Login | Badrblog";
    include "inc/header.php";
    include "inc/functions.php"; 
?>

<div class="login">
    <div class="login-form">
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


<!-- #1B1D32  ,  #1E2137   ,    #24273E   ,  i:  #6C7573  ,  btn:  #FC445F  -->