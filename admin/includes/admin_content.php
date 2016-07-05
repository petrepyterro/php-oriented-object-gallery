<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Admin
        <small>Subheading</small>
      </h1>
      <?php 
        $user = new User();
        $found_user = User::find_user_by_id(1);
        $user->id = $found_user['user_id'];
        $user->username = $found_user['username'];
        $user->password = $found_user['user_password'];
        $user->firstname = $found_user['user_firstname'];
        $user->lastname = $found_user['user_lastname'];
        print_r($user);
      ?>
      <ol class="breadcrumb">
        <li>
          <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
        </li>
        <li class="active">
          <i class="fa fa-file"></i> Blank Page
        </li>
      </ol>
    </div>
  </div>
  <!-- /.row -->

</div>