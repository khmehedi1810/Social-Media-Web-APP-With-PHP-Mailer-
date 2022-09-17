<?php include "inc/header.php"; ?>


<div class="container">
    <?php 

  if ( isset($_GET['update']) ){
    $id = $_GET['update'];
    //echo $id;

    $query = "SELECT * FROM blog WHERE post_id = '$id'";
    $select_all_users = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($select_all_users)){
                      $post_id          = $row['post_id'];
                      $post_title       = $row['post_title'];
                      $long_title       = $row['long_title'];
                      $post_desc        = $row['post_desc'];
                      $post_thumb       = $row['post_thumb'];
                      $location         = $row['location'];
                      $post_date        = $row['post_date'];
                      $post_category    = $row['post_category'];
                      $post_status      = $row['post_status'];

                      ?>

            <div class="row">
            <div class="col-md-12">
            <!-- View All Blog Post inside the Table -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Update your Writting</h6>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="Title">Title</label>
                    <input type="text" name="post_title" value="<?php echo $post_title?>" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control" name="long_title"><?php echo $long_title;?></textarea>
                  </div>

                  <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control" name="post_desc"><?php echo $post_desc;?></textarea>
                  </div>

                  <div class="form-group">
                    <img src="img/posts/<?php echo $post_thumb; ?>" width="200">
                    <input type="file" name="image" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="Description">Location</label>
                    <select name="location" class="form-control">

                      <optgroup label="Dhaka">
                        <optgroup label="Gazipur">
                          <option value="Gazipur">Gazipur Sadar</option>
                          <option value="Kaliakair">Kaliakair</option>
                          <option value="Kaliganj">Kaliganj</option>
                        </optgroup>
                        <optgroup label="Manikganj">
                          <option value="Manikganj">Manikganj Sadar</option>
                          <option value="Singair">Singair</option>
                          <option value="Daulatpur">Daulatpur</option>
                        </optgroup>
                        <optgroup label="Narayanganj">
                          <option value="Narayanganj">Narayanganj Sadar</option>
                          <option value="Sonargaon">Sonargaon</option>
                          <option value="Rupganj">Rupganj</option>
                        </optgroup>
                        <optgroup label="Tangail">
                          <option value="Tangail">Tangail Sadar</option>
                          <option value="Delduar">Delduar</option>
                          <option value="Mirzapur">Mirzapur</option>
                        </optgroup>
                      </optgroup>

                      <optgroup label="Chittagong">
                        <optgroup label="Comilla">
                          <option value="Comilla">Comilla Sadar</option>
                          <option value="Daudkandi">Daudkandi</option>
                        </optgroup>
                        <optgroup label="Chandpur">
                          <option value="Chandpur">Chandpur Sadar</option>
                          <option value="Kachua">Kachua</option>
                          <option value="Hajiganj">Hajiganj</option>
                        </optgroup>
                        <optgroup label="Rangamati">
                          <option value="Rangamati">Rangamati Sadar</option>
                          <option value="Kaptai">Kaptai</option>
                          <option value="Kaukhali">Kaukhali</option>
                        </optgroup>
                      </optgroup>

                      <optgroup label="Rajshahi">
                        <optgroup label="Natore">
                          <option value="Natore">Natore</option>
                          <option value="Lalpur">Lalpur</option>
                          <option value="Baraigram">Baraigram</option>
                        </optgroup>
                        <optgroup label="Pabna">
                          <option value="Bera">Bera</option>
                          <option value="Chatmohar">Chatmohar</option>
                          <option value="Ishwardi">Ishwardi</option>
                        </optgroup>
                        <optgroup label="Sirajganj">
                          <option value="Ullahpara">Ullahpara</option>
                          <option value="Shahjadpur">Shahjadpur</option>
                          <option value="Tarash">Tarash</option>
                          <option value="Belkuchi">Belkuchi</option>
                          <option value="Chauhali">Chauhali</option>
                        </optgroup>
                      </optgroup>

                    </select>
                  </div>

                  <div class="form-group">
                    <label for="Category">Post Category</label>
                    <select class="form-control" name="pcat">
                  <?php
                    $query = "SELECT * FROM categories";
                    $all_cat = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($all_cat)){
                      $cat_id     = $row['cat_id'];
                      $cat_name   = $row['cat_name'];
                      ?>
                          <option><?php echo $cat_name; ?></option>
                      <?php  }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="submit" name="updatepost" value="Update Post" class="btn btn-primary btn-sm">
                  </div>
                </form>

            </div>
          </div>
            </div>
          </div>
           <?php
                     
        }
      }
?>



<?php

    if (isset($_POST['updatepost'])){

  $the_post_id  =  $post_id ;

  $title        = $_POST['post_title'];
  $long_title   = mysqli_real_escape_string($connection, $_POST['long_title']);
  $desc         = mysqli_real_escape_string($connection, $_POST['post_desc']);

  $image        = $_FILES['image']['name'];
  $image_tmp    = $_FILES['image']['tmp_name'];

  $location     = $_POST['location'];
  $post_date    = date('d-m-y');
  $category     = $_POST['pcat'];

  move_uploaded_file($image_tmp, "img/posts/$image");


  if ( !empty($image) ){
    $query = "UPDATE blog SET post_title='$title', long_title='$long_title', post_desc='$desc', post_thumb='$image', location='$location', post_date=now(), post_category='$category' WHERE post_id= '$the_post_id'";

    $updatepost = mysqli_query($connection, $query);

    if ( !$updatepost ){
      die ("Query Failed. " . mysqli_error($connection));
    }
    else{
      header("Location: view-all-post.php");
    }
  }
  else{
    $query = "UPDATE blog SET post_title='$title', long_title='$long_title', post_desc='$desc', location='$location', post_date=now(), post_category='$category' WHERE post_id= '$the_post_id'";

      $updatepost = mysqli_query($connection, $query);

      if ( !$updatepost ){
        die ("Query Failed. " . mysqli_error($connection));
      }
      else{
        header("Location: view-all-post.php");
      }
  }


  

}

?>
</div>

<?php include "inc/footer.php"; ?>

