<?php include("includes/header.php"); ?>
<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>
<?php 
  $user = new User();
  if(isset($_POST['create'])){
    if($user){
      $user->username = $_POST['username'];
      $user->user_firstname = $_POST['user_firstname'];
      $user->user_lastname = $_POST['user_lastname'];
      $user->user_password = $_POST['user_password'];
      
      $user->set_file($_FILES['uploaded_file']);
      $user->upload_photo();
      $user->save();
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
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="col-md-6 col-md-offset-3">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="user_firstname">First Name</label>
                <input type="text" name="user_firstname" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="user_lastname">Last Name</label>
                <input type="text" name="user_lastname" class="form-control"/>
              </div>
              <div class="form-group">
                <label for="user_password">Password</label>
                <input type="password" name="user_password" class="form-control"/>
              </div>
              <input type="file" name="uploaded_file" />
              <div class="form-group">
                <input type="submit" name="create" value="Add User" class="btn btn-primary pull-right"/>
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