<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>
<?php 
  if(empty($_GET['id'])){
    redirect("users.php");
  } 
  $user = User::find_by_id($_GET['id']);
  $user_image = $user->user_image;
  if(isset($_POST['update'])){
    if($user){
      $user->username = $_POST['username'];
      $user->user_firstname = $_POST['user_firstname'];
      $user->user_lastname = $_POST['user_lastname'];
      $user->user_password = $_POST['user_password'];

      if($user->set_file($_FILES['uploaded_file'])){
        if(!empty($user_image)){
          unlink(SITE_ROOT . DS . 'admin' . DS . $user->upload_directory . DS . $user_image);
        }
        $user->save_user_and_image();
      } else {
        $user->save();
      };
      
    }
  }    
  
?>

  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    
    <!-- Top Menu Items -->
    <?php include("includes/top_nav.php") ?>
    
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <?php include("includes/side_nav.php") ?>
    <!-- /.navbar-collapse -->
  </nav>

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">  
        <div class="col-lg-12">
          <h1 class="page-header">
            Photos<small>Subheading</small>
          </h1>
          <div class="col-md-6">
            <img class="img-responsive" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="" />
          </div>
          <form action="" method="POST" enctype="multipart/form-data">            
            <div class="col-md-6">
              <div class="form-group">
                <input type="file" name="uploaded_file" />
              </div>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>"/>
              </div>
              <div class="form-group">
                <label for="user_firstname">First Name</label>
                <input type="text" name="user_firstname" class="form-control" value="<?php echo $user->user_firstname; ?>"/>
              </div>
              <div class="form-group">
                <label for="user_lastname">Last Name</label>
                <input type="text" name="user_lastname" class="form-control" value="<?php echo $user->user_lastname; ?>">
              </div>
              <div class="form-group">
                <label for="user_password">Password</label>
                <input type="password" name="user_password" value="<?php echo $user->user_password; ?>" class="form-control"/>
              </div>
              <div class="form-group">
                <a href="delete_user.php?id=<?php echo $user->id; ?>" class="btn btn-danger">Delete</a>
                <input type="submit" name="update" value="Update" class="btn btn-primary pull-right"/>
              </div>
            </div>  
            
          </form>  
        </div>
      </div>
      <!-- /.row -->
      
    <!-- /.container-fluid -->
  </div>
  <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>