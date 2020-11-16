<?php 
    $page_title = "Settings Page";
    include "inc/header.php";
    include "inc/navbar.php"; 
    include "inc/functions.php";
?>
    <!-- Start Sidebar Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <?php include "inc/sidebar.php"; ?>
            </div>
            <div class="col-sm-10">
                <div class="settings">
                    <div class="general-settings">
                        <h5>General Settings</h5>
                        <form action="settings.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="">Site Name :</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                
                                        <input type="text" name="name" class="form-control" placeholder="Site Name" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="">Site Tagline :</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                
                                        <input type="text" name="tagline" class="form-control" placeholder="Tagline" required autocomplete="off">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="">Site Logo :</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                
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
                                        <input min="2" max="20" type="number" name="hpn" class="form-control">
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
                                            <option value="newest">Newest</option>
                                            <option value="oldest">Oldest</option>
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
                                        <input min="2" max="10" type="number" name="rpn" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2">
                                    <label for="">Related Posts Number :</label>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">                                
                                        <input min="1" max="3" type="number" name="relatedpn" class="form-control">
                                        <input style="float:right;" type="submit" name="save-general" class="btn btn-info" value="Save Changes">                                  
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
