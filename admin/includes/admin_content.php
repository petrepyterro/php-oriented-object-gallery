<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Admin
        <small>Subheading</small>
      </h1>
      <?php 
        $user = User::find_user_by_id(8);
        $user->username = "totalitarianism";
        $user->user_password = "secret";
        $user->user_firstname = "Total";
        $user->user_lastname = "Mital";
        
        $user->update();
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