<div class="container-fluid">

  <!-- Page Heading -->
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">
        Admin
        <small>Subheading</small>
      </h1>
      <?php 
        /*
        $photos = Photo::find_all();
        foreach($photos as $photo){
          echo $photo->photo_title;
        }
         * 
         */
        
        /*
        $photo = new Photo();
        $photo->photo_title = "Belgium";
        $photo->photo_size = 20;
        
        $photo->save();
         * 
         */
      
        /*
        $photo = Photo::find_by_id(2);
        $photo->photo_filename = "large_image.jpg";
        
        $photo->save();
        * 
        */
      
        /*
        $photo = Photo::find_by_id(2);
        $photo->delete();
         * 
         */
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