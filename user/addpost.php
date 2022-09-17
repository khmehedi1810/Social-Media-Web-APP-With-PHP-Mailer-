<?php include "inc/header.php"; ?>

<?php

    if ( isset($_POST['addpost']) ){

      //$title        = $_POST['post_title'];
      $title        = mysqli_real_escape_string($connection, $_POST['post_title']);
      $longtitle    = mysqli_real_escape_string($connection, $_POST['long_title']);
      $desc         = mysqli_real_escape_string($connection, $_POST['desc']);

      $image        = $_FILES['image']['name'];
      $image_tmp    = $_FILES['image']['tmp_name'];

      $post_date    = date('d-m-y');
      $location     = $_POST['location'];
      $author       = $_POST['author'];
      $aut_id       = $_SESSION['userid'];
      $category     = $_POST['pcat'];


      move_uploaded_file($image_tmp, "img/posts/$image");

      $query = "INSERT INTO blog (post_title, long_title, post_desc, post_thumb, location, post_date, post_author, aut_id, post_category, post_status) VALUES ( '$title', '$longtitle', '$desc', '$image', '$location', now(), '$author', '$aut_id', '$category', 'Pending' )";

      $addpost = mysqli_query($connection, $query);
      

      if ( !$addpost ){
        die ("Query Failed. " . mysqli_error($connection));
      }
      else{
        header("Location: postalert.php");
      }

    }

?>




        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Add New Post</h1>

          <div class="row">
          	<div class="col-md-12">
          	<!-- View All Blog Post inside the Table -->
            <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Publish New Blog</h6>
            </div>
            <div class="card-body">

              <?php  

                $user = $_SESSION['username'];
                $query = "SELECT * FROM users WHERE username = '$user'";
                $showPost = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($showPost)) { 
                  $id          = $row['id'];
                  $active      = $row['active'];

                }

                if ($active == 'YES') { ?>

                <form action="" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
                  <div class="form-group">
                    <label for="Title">Main Title</label>
                    <input type="text" name="post_title" class="form-control">
                  </div>

                  <div class="form-group">
                    <label for="Description">Long Titile</label>
                    <textarea class="form-control" name="long_title"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="Description">Description</label>
                    <textarea class="form-control" name="desc"></textarea>
                  </div>

                  <div class="form-group">
                    <label for="Description">Photo</label>
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
                    <label for="Author">Post Author</label>
                    <select class="form-control" name="author">
                  <?php
                    $user = $_SESSION['username'];
                    $query = "SELECT * FROM users WHERE username ='$user' ";
                    $all_cat = mysqli_query($connection, $query);
                    while ($row = mysqli_fetch_assoc($all_cat)){
                      $user_id     = $row['id'];
                      $fullname   = $row['fullname'];
                      ?>
                          <option><?php echo $fullname; ?></option>
                      <?php  }
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="Author">Post Category</label>
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
                    <input type="submit" name="addpost" value="Add Post" class="btn btn-primary btn-sm">
                  </div>
                </form>
              <?php }else{ ?>

                <div>
                  <div class="alert alert-danger" role="alert">
                    This Profile is DEACTIVATE.
                  </div>
                  <p>DEACTIVATE profile can not create post. Complete your profile by valid information. Then your profile will be activate.</p>
                </div>

              <?php } ?>


            </div>
          </div>
          	</div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<?php include "inc/footer.php"; ?>

