<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistem Informasi Kuisioner Survey</title>
  <link href="assetsh/gambar/Bg3.png" rel="shortcut icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url() ;?>/assetsh/theme/bootstrap.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url() ;?>/assetsh/theme/usebootstrap.css">
  <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url() .'assets/DataTables/datatables.css' ?>">
  <link rel= "stylesheet" type= "text/css" href= "<?php echo base_url() .'assets/css/awesome/css/font-awesome.css' ?>">
  <script type= "text/javascript" src= "<?php echo base_url() .'assets/js/jquery.js' ?>"> </script>
  <script type= "text/javascript" src= "<?php echo base_url() .'assets/js/bootstrap.js' ?>"> </script>
  <script type= "text/javascript" src= "<?php echo base_url() .'assets/DataTables/datatables.js' ?>"> </script>
</head>

  <div class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <a href="admin" class="navbar-brand" href= "<?php echo base_url() .'admin'; ?>">Sistem Informasi Kuisioner Survey</a>
        <button class="navbar-toggle" type="button" data-toggler="collapse" data-target="#navbar-main"
        aria-controls= "navbarText" aria-expanded= "false" arialabel= "Toggle navigation">
        <span class="icon-bar"></span>
      </button>

      <a href= "<?php echo base_url() .'admin'; ?>" class="navbar-brand" > <i class= "fa fa-home"> </i> Dashboard</a></li></a>
      <a href= "<?php echo base_url() ; ?>Datatabel/datamahasiswa" class="navbar-brand" > <i class= "fa fa-tasks"> </i> Data Mahasiswa</a></li></li></a>
      <a href= "<?php echo base_url() ; ?>Datatabel/datapertanyaan" class="navbar-brand" > <i class= "fa fa-inbox"> </i> Data Pertanyaan</a></li></a>
  
      <a href= "<?php echo base_url() ; ?>Datatabel/hasil" class="navbar-brand" > <i class= "fa fa-archive"> </i> Hasil</a></li></a>


      <ul class="nav navbar-nav navbar-right">
        <a href= "<?php echo base_url() .'Admin/logout' ?>" class="navbar-brand my-2 my-sm-0" > <i class= "fa fa-power-off"> </i> Keluar</a></li>></a>
      </ul> 
    </div>
  </div>
</div>
<?php  
// echo "<pre>";
// print_r($dataHasil);
// // die;
?>
<div class="container col-lg-50">
  <table class="table table-striped">
    <tr>
      <td colspan="3" align="center"><h3>Data Peserta</h3></td>
    </tr>
    <?php for ($i=0; $i <1 ; $i++) { ?>
    <tr>
      <td width="100">Nama</td>
      <td width="5">:</td>
      <td><?= $dataHasil[$i]['nama'] ?></td>
    </tr>
    <tr>
      <td>NPM</td>
      <td>:</td>
      <td><?= $dataHasil[$i]['npm'] ?></td>
    </tr>
    <tr>
      <td>Prodi</td>
      <td>:</td>
      <td><?= $dataHasil[$i]['nama_prodi'] ?></td>
    </tr>
    <tr>
      <td>Fakultas</td>
      <td>:</td>
      <td><?= $dataHasil[$i]['nama_fakultas'] ?></td>
    </tr>
    <?php } ?>
  </table>
  <table class="table table-striped">
    <tr>
      <td colspan="4" align="center"><h3>Hasil Kuesioner</h3></td>
    </tr>
    <?php
    if ($kat1 == null) {
      echo "";
    }else { ?>
    <tr>
      <td colspan="4"><h4><?= $kat1[0]['nama_kategori'] ?></h4></td>
    </tr>
    <?php for ($i=0; $i <count($kat1) ; $i++) { ?>
    <tr>
      <td width="40" align="center"><?= $i+1 ?></td>
      <td width="500"><?= $kat1[$i]['pertanyaan'] ?></td>
      <td width="5">:</td>
      <td><?= $kat1[$i]['jawaban'] ?></td>
    </tr>
    <?php }} ?>

    <?php
    if ($kat2 == null) {
      echo "";
    }else { ?>
    <tr>
      <td colspan="4"><h4><?= $kat2[0]['nama_kategori'] ?></h4></td>
    </tr>
    <?php for ($i=0; $i <count($kat2) ; $i++) { ?>
    <tr>
      <td width="40" align="center"><?= $i+1 ?></td>
      <td width="500"><?= $kat2[$i]['pertanyaan'] ?></td>
      <td width="5">:</td>
      <td><?= $kat2[$i]['jawaban'] ?></td>
    </tr>
    <?php }} ?>

    <?php
    if ($kat3 == null) {
      echo "";
    }else { ?>
    <tr>
      <td colspan="4"><h4><?= $kat3[0]['nama_kategori'] ?></h4></td>
    </tr>
    <?php for ($i=0; $i <count($kat3) ; $i++) { ?>
    <tr>
      <td width="40" align="center"><?= $i+1 ?></td>
      <td width="500"><?= $kat3[$i]['pertanyaan'] ?></td>
      <td width="5">:</td>
      <td><?= $kat3[$i]['jawaban'] ?></td>
    </tr>
    <?php }} ?>

    
    <?php
    if ($kat4 == null) {
      echo "";
    }else { ?>
    <tr>
      <td colspan="4"><h4><?= $kat4[0]['nama_kategori'] ?></h4></td>
    </tr>
    <?php for ($i=0; $i <count($kat4) ; $i++) { ?>
    <tr>
      <td width="40" align="center"><?= $i+1 ?></td>
      <td width="500"><?= $kat4[$i]['pertanyaan'] ?></td>
      <td width="5">:</td>
      <td><?= $kat4[$i]['jawaban'] ?></td>
    </tr>
    <?php }} ?>

    <?php
    if ($kat5 == null) {
      echo "";
    }else { ?>
    <tr>
      <td colspan="4"><h4><?= $kat5[0]['nama_kategori'] ?></h4></td>
    </tr>
    <?php for ($i=0; $i <count($kat5) ; $i++) { ?>
    <tr>
      <td width="40" align="center"><?= $i+1 ?></td>
      <td width="500"><?= $kat5[$i]['pertanyaan'] ?></td>
      <td width="5">:</td>
      <td><?= $kat5[$i]['jawaban'] ?></td>
    </tr>
    <?php }} ?>


  </table>
  <p><a href="<?php echo base_url() ;?>Datatabel/hasil" class="btn btn-success btn-sm"><i class="fa fa-back"></i> Kembali</a></p>      
</div>

<script src="<?php echo base_url() ;?>/assetshome/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url() ;?>/assetshome/bootstrap/usebootstrap.js"></script>
</body>
</html>
