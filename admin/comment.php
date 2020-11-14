<?php 
    $page_title = "Comment Page";    
    include "inc/header.php";
    include "inc/navbar.php"; 
    include "inc/functions.php"; 
    if(! session_id()){
        session_start();
    }    
    $id         = "";
    $username   = $_SESSION['admin_username'];
    $email      = $_SESSION['admin_email'];
    $comment_comment   = "";

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['addcomment'])) {
            $username      = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            $comment_comment   = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
            $post_id    = filter_input(INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT);

            date_default_timezone_set('Asia/Riyadh');
            $datetime   = date('d-m-y h:m', time());            

           // Start Error Section 
            $error_msg = "";
            if(strlen($comment_comment) < 20 || strlen($comment_comment) > 1000) {
                $error_msg = "Comment must be between 20 and 1000 caracters";
            } // End Error Section

            if(empty($error_msg)) {
                if(! session_id()){
                    session_start();
                }
                // Insert Data In Database
                if(insert_comment($datetime, $username, $email, $comment_comment, $post_id)) {
                    $_SESSION['success'] = "Comment has been Saved Successfully";
                    redirect("comments.php");
                }else {
                    $_SESSION['error'] = "Unable to Add Comment";
                    redirect("comment.php");
                }
            }   
        } else {
            
            if(isset($_POST['updatecomment'])) {
                $id = filter_input(INPUT_POST,'id' , FILTER_SANITIZE_NUMBER_INT);

                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $email    = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
                $comment_comment   = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
                $post_id    = filter_input(INPUT_POST, 'post_id', FILTER_SANITIZE_NUMBER_INT);

                // Start Error Section 
                $error_msg = "";
                if(strlen($comment_comment) < 20 || strlen($comment_comment) > 1000) {
                    $error_msg = "Comment must be between 20 and 1000 caracters";
                } // End Error Section

                if(empty($error_msg)) {
                    $updated = update_comment($comment_comment, $post_id, $id);

                    if($updated) {
                        if(! session_id()){
                            session_start();
                        }
                            $_SESSION['success'] = "Comment has been Updated Successfully";
                            redirect("comments.php");
                    }else {
                            $_SESSION['error'] = "Unable to Update Comment";
                            redirect("comment.php");
                    }
                }
                }
        }

    } elseif(isset($_GET['id'])) {
        $id     = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
        $comment       = get_comments($id);
        $comment_comment      = $comment['comment'];
        $post_id      = $comment['post_id'];
    }   
?>
    <!-- Start Sidebar Section -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-2">
                <?php include "inc/sidebar.php"; ?>
            </div>
    <!-- End Sidebar Section -->
    
    <!-- Start post Section -->                
            <div class="col-sm-10">
                <div class="comment">
                    <?php if(isset($_GET['id'])) { ?>
                        <h4>Edit Comment</h4>
                    <?php } else {  ?>
                        <h4>Add New Comment</h4>
                    <?php } ?>
                    <form action="comment.php" method="POST">
                        <div class="form-group">
						<input type="hidden" name="id" value="<?php echo $id; ?>">
                            <label for="username">User Name</label>
                            <input readonly type="text" value="<?php echo $username; ?>" class="form-control" name="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input readonly type="email" value="<?php echo $email; ?>" class="form-control" name="email">
                        </div>

                        <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea rows="6" class="form-control" name="comment" required placeholder="comment" autocomplete="off" maxlength = "1000"><?php echo $comment_comment; ?></textarea>
                            <p class="error comment-error">Comment must be between 20 and 1000 caracters</p>
                        </div> 

                        <div class="form-group">
                            <select class="form-control" name="post_id">
                            <?php
                               foreach (get_posts() as $post) {
                                    echo "<option value='{$post['id']}'";
                                    if(isset($_GET['id'])) {
                                        if($post_id === $post['id']) {
                                            echo "selected >";
                                        } else {
                                            echo ">";
                                        }
                                    } else {
                                        echo ">";
                                    }                                
                                    echo $post['title'];
                                    echo "</option>";  
                                }
                            ?>
                            </select>
                        </div>  

                        <?php if(isset($_GET['id'])) { ?>
                            <input type="submit" value="Update Comment" name="updatecomment" class="btn btn-primary" style="float:right;">
                        <?php } else { ?>
                            <input type="submit" value="Add Comment" name="addcomment" class="btn btn-primary" style="float:right;">                 
                        <?php } ?>                        
                           
                    </form>
                </div>
            </div>
    <!-- End post Section -->                
        </div>
    </div>


<?php include "inc/footer.php"; ?>
