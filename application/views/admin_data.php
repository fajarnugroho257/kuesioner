<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sistem Informasi Kuisioner Survey</title>
        <link href="assetsh/gambar/Gb1.png" rel="shortcut icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="<?php echo base_url() ;?>/assetsh/theme/bootstrap.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url() ;?>/assetsh/theme/usebootstrap.css">
        <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url() .'assets/DataTables/datatables.css' ?>">
        <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url() .'assets/css/awesome/css/font-awesome.css' ?>">
        <script type= "text/javascript" src= "<?php echo base_url() .'assets/js/jquery.js' ?>"> </script>
        <script type= "text/javascript" src= "<?php echo base_url() .'assets/js/bootstrap.js' ?>"> </script>
        <script type= "text/javascript" src= "<?php echo base_url() .'assets/DataTables/datatables.js' ?>"> </script>
    <?php 
    foreach($css_files as $file): ?>
      <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
    <?php endforeach; ?>
    </head>

 <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">

      <a href="admin" class="navbar-brand" href="<?php echo base_url() . 'admin'; ?>">Sistem Informasi Kuisioner Survey</a>
      <button class="navbar-toggle" type="button" data-toggler="collapse" data-target="#navbar-main" aria-controls="navbarText" aria-expanded="false" arialabel="Toggle navigation">
        <span class="icon-bar"></span>
      </button>

      <a href="<?php echo base_url() . 'admin'; ?>" class="navbar-brand"> <i class="fa fa-home"> </i> Dashboard</a></li></a>
      <a href="<?php echo base_url(); ?>Datatabel/datamahasiswa" class="navbar-brand"> <i class="fa fa-tasks"> </i> Data Mahasiswa</a></li>
      </li></a>
      <a href="<?php echo base_url(); ?>Datatabel/datapertanyaan" class="navbar-brand"> <i class="fa fa-inbox"> </i> Data Pertanyaan</a></li></a>
      <a href="<?php echo base_url(); ?>Datatabel/hasil" class="navbar-brand"> <i class="fa fa-archive"> </i> Hasil</a></li></a>


      <ul class="nav navbar-nav navbar-right">
        <a href="<?php echo base_url() . 'Admin/logout' ?>" class="navbar-brand my-2 my-sm-0"> <i class="fa fa-power-off"> </i> Keluar</a></li>></a>
      </ul>
    </div>
  </div>
   
    

    <div class="container col-lg-50">
        <div class="page-header">
            <h2 id="navbar">Data </h2>
          </div>
      
      <?php echo $output; ?>
	  
    </div>
  
    <?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
<script src="<?php echo base_url() ;?>/assetshome/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url() ;?>/assetshome/bootstrap/usebootstrap.js"></script>
 
</html>
