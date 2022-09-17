<?php include "inc/header.php" ?>

<?php 
if (isset($_GET['view_post'])) {
	$view_post = $_GET['view_post'];

    $query = "SELECT * FROM blog WHERE post_id = '$view_post'";
    $select_post = mysqli_query($connection, $query);
    while ( $row = mysqli_fetch_assoc($select_post) )
    {
      $post_id          = $row['post_id'];
      $post_title       = $row['post_title'];
      $long_title       = $row['long_title'];
      $post_desc        = $row['post_desc'];
      $post_thumb       = $row['post_thumb'];
      $post_date        = $row['post_date'];
      $location         = $row['location'];
      $post_author      = $row['post_author'];
      $post_authorID    = $row['aut_id'];
      $post_category    = $row['post_category'];
      $post_status      = $row['post_status'];
    }

}


?>

<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-md-6 col-8 align-self-center">
                <h3 class="page-title mb-0 p-0">Post Details</h3>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Post</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Review Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-md-6 col-4 align-self-center">
            </div>
        </div>
    </div>
    <?php 
        if (empty($view_post)) {
            echo '<div class="alert alert-warning mb-5" style="width: 600px;margin: 0 auto; margin-top: 60px;border-radius: 10px;">No! Post Selected</div>';
        }
        else{
    ?>



    <div class="container-fluid">
<?php 
    if (empty($post_id)) {
        echo '<div class="alert alert-warning mb-5" style="width: 600px;margin: 0 auto; margin-top: 60px;border-radius: 10px;">This post is Missing!</div>';
    }
    else{

?>
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
<?php
    $query = "SELECT * FROM users WHERE id = '$post_authorID'";
    $select_user = mysqli_query($connection, $query);
    while ( $row = mysqli_fetch_assoc($select_user) )
    {
        $u_id         = $row['id'];
        $u_fullname   = $row['fullname'];
        $u_email      = $row['email'];
        $u_pp         = $row['avater'];
    }

?>

        <div class="row">
            <?php
                if ($post_status == 'Published') { ?>
                    <div class="alert alert-success" role="alert">
                      This post is PUBLISHED.
                    </div>
            <?php  }else{ ?>
                    <div class="alert alert-danger" role="alert">
                      This post is Pending.
                    </div>
           <?php } ?>
            
        </div>
        <div class="row">
            <div class="col-lg-4 col-xlg-3">
                <div class="card p-3">
                    <img class="card-img-top" src="assets/images/background/profile-bg.jpg"
                        alt="Card image cap">
                    <div class="card-body little-profile text-center">
                        <div class="pro-img">
                            <img src="../user/img/users/<?php 
                              if( !$u_pp ){
                                echo 'title_logo.png';
                              }
                              else{
                                echo $u_pp;
                              }
                             ?>"  alt="User">
                           
                        </div>
                        <h3 class="mb-0"><?php echo $u_fullname;?></h3>
                        <p><a href="mailto:"><?php echo $u_email; ?></a></p>
                        <div class="btn-group">
                            <a href="viewuser.php?view_user=<?php echo $u_id; ?>" class="btn btn-warning">View Profile</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body bg-info">
                        <h4 class="text-white card-title">Update Post Status</h4>
                    </div>
                    <div class="card-body">
                        <div class="message-box contact-box">
                            <div class="message-widget contact-widget">
                                <?php 
                                    if ($post_status == 'Published') { ?>
                                        <form method="POST" class="form-horizontal form-material mx-2">
                                            
                                             <div class="form-group">
                                                <div class="col-sm-12 text-center">
                                                    <input type="submit" name="unPublish" value="Un-Publish" class="btn btn-danger text-white">
                                                </div>
                                            </div>
                                        </form>
                                    <?php }
                                    else{ ?>

                                           
                                        <div class="col-sm-12 text-center">
                                            <a  class="btn btn-success btn-sm pt-2 pb-0" href="mailsend.php?postID=<?php echo $post_id; ?>"><h5>Publish</h5></a>
                                        </div>

                                   <?php }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body bg-danger text-center">
                        <h4 class="text-white card-title">DELETE POST</h4>
                        <a href="" class="text-warning" data-toggle="modal" data-target="#delPostThis">Delete this post</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-xlg-9">
                <div class="card p-3">
                    <img src="../user/img/posts/<?php echo $post_thumb; ?>">
                    <br>
                    <p><i class="mdi me-2 mdi-table"></i><b>Publish Date:</b> <?php echo $post_date; ?> &nbsp; &nbsp; &nbsp; &nbsp; <i class="mdi me-2 mdi-google-maps"></i><b>Location:</b> <?php echo $location; ?></p>
                    <p><i class="mdi me-2 mdi-book-open-variant"></i><b>Category:</b> <?php echo $post_category; ?></p>
                    <p><b><?php echo $long_title; ?></b></p><br>
                    <p><?php echo $post_desc; ?></p>
                </div>
                <?php 
                    $ownpage ='view_post='.$post_id;
                ?>
                <div class="card p-3">
                    <!-- <h5><i class="mdi mdi-18px me-2 mdi-close-circle-outline"></i>Report: <?php echo $post_date; ?></h5> -->
                    <h5><i class="mdi mdi-18px me-2 mdi-comment"></i>Comments: </h5>
                        <ul class="comt-sec">
                        <?php
                        
                        $selconqiery = "SELECT * FROM comments WHERE blog_id = '$post_id' ORDER BY com_id DESC";
                        $select_post_com = mysqli_query($connection, $selconqiery);

                        while ($row = mysqli_fetch_assoc($select_post_com)) { 
                            $com_id     = $row['com_id'];
                            $aut_nam    = $row['aut_nam'];
                            $comnt      = $row['comnt'];
                            $com_date   = $row['com_date'];

                          ?>
                         

                          <li class="nav-item">
                          
                            <p class="d-flex justify-content-between">
                                <span class="text-left"><i class="mdi me-2 mdi-account"></i><b><?php echo $aut_nam; ?></b>  <?php echo $com_date; ?></span>
                                <span class="text-right pr-4"><a data-toggle="modal" data-target="#delCOmThis" href="" onclick="delCOm(<?php echo $com_id; ?>)" class="text-white"><i class="mdi mdi-18px me-2 mdi-delete"></i></a></span>
                                
                            </p>
                            <p><span><?php echo $comnt; ?></span></p>
                          </li>


                        <?php }

                        ?>
                        </ul>
                </div>
            </div>
        </div>
        <?php } ?>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right sidebar -->
        <!-- ============================================================== -->
        <!-- .right-sidebar -->
        <!-- ============================================================== -->
        <!-- End Right sidebar -->
        <!-- ============================================================== -->
    </div>
<?php } ?>
<!-- Delete Post-->
  <div class="modal fade" id="delPostThis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you SURE?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">If this post goes out of relavent topic or fake you must DELETE this. </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form method="POST">
                <input type="submit" class="btn btn-danger" name="delPost" value="DELETE">
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Delete Post-->
  <div class="modal fade" id="delCOmThis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <script type="text/javascript">
                  function delCOm(x){
                      document.getElementById("comcusid").value = x;
                  }
              </script>
              
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Are you SURE?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">If this COMMENT goes out of relavent topic or fake you must DELETE this. </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <form method="POST">
                <!-- <input type="text" name="comcusID" class="" readonly="" value=""> -->
                <textarea name="comIDDD" readonly="" id="comcusid" class="sr-only"></textarea>
                <input type="submit" class="btn btn-danger" name="delCOMnt" value="DELETE">
            </form>
        </div>
      </div>
    </div>
  </div>

<?php 


// unPublish Post
    if (isset($_POST['unPublish'])) {

        $query = "UPDATE blog SET post_status ='Pending' WHERE post_id = '$post_id'";

        $update_Post_sta = mysqli_query($connection, $query);

        if ( !$update_Post_sta ){
          die ("Query Failed. " . mysqli_error($connection));
        }
        else{
          header("Location: pendingpost.php");
        }
    }

    // Publish Post
    // if (isset($_POST['publish'])) {

    //     $query = "UPDATE blog SET post_status ='Published' WHERE post_id = '$post_id'";

    //     $update_ac_status = mysqli_query($connection, $query);

    //     if ( !$update_ac_status ){
    //       die ("Query Failed. " . mysqli_error($connection));
    //     }
    //     else{
    //       header("Location: mailsend.php");
    //     }

    // }
    //delete users
    if (isset($_POST['delPost'])) {


        $delpst    = "DELETE FROM blog WHERE post_id='$post_id'";
        $delCom    = "DELETE FROM comments WHERE blog_id='$post_id'";
        $delRep    = "DELETE FROM report WHERE blog_id='$post_id'";

        $delete_post    = mysqli_query($connection, $delpst);
        $delete_postCom = mysqli_query($connection, $delCom);
        $delete_postRep = mysqli_query($connection, $delRep);

        if ( !$delete_post || !$delete_postCom || !$delete_postRep ){
            die("Query Failed ". mysqli_error($connection));
        }
        else{
            header("Location: publishpost.php");
        }
    }

    //DElete Comment
    if ( isset($_POST['delCOMnt']) ){
        $deleteCom =  $_POST['delCOMnt'];
        $comIDDD   =  $_POST['comIDDD'];
        $query = "DELETE FROM comments WHERE com_id = '$comIDDD'";

        $delete_com = mysqli_query($connection, $query);

        if ( !$delete_com ){
            die("Query Failed " . mysqli_error($connection));
        }
        else{
            header("Refresh:0");
        }
    }


?>

<!-- <script type="text/javascript">
    var postid = "<?php echo $post_id; ?>";
   
    $('.publishnow').click(function(){
        var postid = "<?php echo $post_id; ?>";
        console.log(postid);
        $.ajax({
            url:'mailsend.php?postid='+postid,
            success:function()
            {
                

            }
        })
    })
</script> -->

<?php include "inc/footer.php" ?>
