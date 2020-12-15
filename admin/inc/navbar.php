<?php
include "inc/init.php";
foreach (get_settings() as $setting) {
    $logo = $setting['logo']; 
    $tagline = $setting['tagline'];
}

if(! session_id()) {
    session_start();
}
if(! isset($_SESSION['admin_email'])) {
    redirect("login.php");
} else {
    $email = $_SESSION['admin_email'];    
    $admin = is_admin($email);
}

?>


<!-- Start Navbar Section -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
    <!-- Start Navbar Brand Section -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-brand" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent-brand">
            <ul class="navbar-nav mr-auto">
            <li class="navbar-brand nav-item dropdown">
                <a class=" nav-link dropdown-toggle" href="#" id="navbarDropdown-brand" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="logo" src="uploads/admins/<?php echo $logo; ?>" alt="Logo">
                </a>
                <span class="tagline" ><?php echo $tagline; ?></span>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown-brand">
                <a class="dropdown-item" href="../index.php" target="_blank">View Site</a>
                </div>
            </li>
            </ul>
        </div>
    <!-- End Start Navbar Brand Section -->        

    <!-- Start Navbar Dropdown Section -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $admin['username']; ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="profile.php">Profile</a>
                <a class="dropdown-item" href="#">Another action</a>
                </div>
            </li>
            </ul>
        </div>
    <!-- End Start Navbar Dropdown Section -->        
    </div>
</nav>
<!-- End Start Navbar Brand Section -->