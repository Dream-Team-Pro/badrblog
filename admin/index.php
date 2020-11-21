<?php 
    $page_title = "Dashboard";
    include "inc/header.php";
    include "inc/functions.php"; 
    include "inc/navbar.php"; 
    $dashboard = "active";
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
                        </span></br><span>Comments</span>
                        </div>
                        <div class="col-sm counts bg bg-success">
                        <span>3</span></br><span>Users</span>
                        </div>
                    </div>
                    <div class="row">
                       <div class="col-sm-6">
                            <div class="card border-primary mb-6 hottest-posts">
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
                            <div class="card border-primary mb-6 recent">
                                <div class="card-header text-success">Recent Posts</div>
                                <div class="card-body text-primary">
                                    <!-- <h5 class="card-title">Primary card title</h5> -->
                                    <p class="card-text">
                                        <?php foreach (get_recent('posts', 3) as $post) { ?>
                                            <a href="post.php?id=<?php echo $post['id']; ?>">
                                                <h6><?php echo $post['title']; ?></h6>
                                            </a><hr>
                                        <?php } ?>
                                    </p>
                                </div>
                            </div>  
                       </div>                      
                    </div>
                    <div class="row">
                       <div class="col-sm-6">
                            <div class="card border-primary mb-6 links">
                                <div class="card-header text-danger">Dashboard Links</div>
                                <div class="card-body text-primary">
                                    <p class="card-text">
                                        <a href="post.php"><i class="fa fa-pencil"></i>Add New Post</a>
                                        <a href="Categories.php"><i class="fa fa-list"></i>Add New Category</a>
                                        <a href="comment.php"><i class="fa fa-comment"></i>Add New Comment</a>
                                        <a href="admin.php"><i class="fa fa-user-secret"></i>Add New Admin</a>
                                    </p>
                                </div>
                            </div>  
                        </div>                                         
                        <div class="col-sm-6">
                            <div class="card border-primary mb-6 recent">
                                <div class="card-header text-success">Recent Categories</div>
                                <div class="card-body text-primary">
                                    <!-- <h5 class="card-title">Primary card title</h5> -->
                                    <p class="card-text">
                                        <?php foreach (get_recent('categories', 3) as $category) { ?>
                                            <a href="categories.php?id=<?php echo $category['id']; ?>">
                                                <h6><?php echo $category['name']; ?></h6>
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
