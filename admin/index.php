<?php 
    $page_title = "Dashboard";
    include "inc/header.php";
    include "inc/functions.php"; 
    include "inc/navbar.php"; 
?>
    <!-- Start Sidebar Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <?php include "inc/sidebar.php"; ?>
            </div>
    <!-- End Sidebar Section -->

            <div class="col-sm-10">
                <h5>Dashboard</h5>
                <div class="dashboard">
                    <div class="row">
                        <div class="col-sm counts bg bg-danger">
                        <span><?php echo get_number('posts'); ?>
                        </span></br><span>Posts</span>
                        </div>
                        <div class="col-sm counts bg bg-info">
                        <span><?php echo get_number('categories'); ?>
                        </span></br><span>Categories</span>
                        </div>
                        <div class="col-sm counts bg bg-primary">
                        <span><?php echo get_number('comments'); ?>
                        </span></br><span>comments</span>
                        </div>
                        <div class="col-sm counts bg bg-success">
                        <span>3</span></br><span>Users</span>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-sm-6">
                            <div class="card border-primary mb-6">
                                <div class="card-header text-danger">Hottest Posts</div>
                                <div class="card-body text-primary">
                                    <!-- <h5 class="card-title">Primary card title</h5> -->
                                    <p class="card-text">
                                        <?php foreach (get_hottest_posts(3) as $post) { ?>
                                            <a href="post.php?id=<?php echo $post['id']; ?>">
                                                <h6><?php echo $post['title']; ?></h6>
                                            </a><hr>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>  
                       </div>                      
                       <div class="col-sm-6">
                            <div class="card border-primary mb-6">
                                <div class="card-header text-success">Recent Posts</div>
                                <div class="card-body text-primary">
                                    <!-- <h5 class="card-title">Primary card title</h5> -->
                                    <p class="card-text">
                                        <?php foreach (get_recent_posts(3) as $post) { ?>
                                            <a href="post.php?id=<?php echo $post['id']; ?>">
                                                <h6><?php echo $post['title']; ?></h6>
                                            </a><hr>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>  
                       </div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "inc/footer.php"; ?>
