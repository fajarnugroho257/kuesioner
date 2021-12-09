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
    <p><a href="<?php echo base_url() ;?>Datatabel/cetakExcel" class="btn btn-success btn-sm"><i class="fa fa-file-excel-o"></i> Export</a>
    <a href="<?php echo base_url() ;?>Datatabel/cetakPrint" class="btn btn-primary btn-sm"><i class="fa fa-print"></i> Cetak</a></p>
  <table class="table table-striped" border="1">
    <tr>
      <td>No</td>
      <td>NPM</td>
      <td>Nama Mahasiswa</td>
      <td>Fakultas</td>
      <td>Prodi</td>
      <td>Lihat Jawaban</td>
      <!-- <?php for ($i=1; $i <$per+1 ; $i++) { ?>
        <td>Pertanyaan <?= $i; ?></td>
      <?php } ?>
    </tr> -->
    <?php 
    if ($n !=null) { ?>
      <?php $no=1; for ($i=0; $i <count($n) ; $i++) { ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $n[$i][0]['npm']; ?></td>
          <td><?= $n[$i][0]['nama']; ?></td>
          <td><?= $n[$i][0]['nama_fakultas']; ?></td>
          <td><?= $n[$i][0]['nama_prodi']; ?></td>
          <td><a href="<?php echo base_url() ;?>Datatabel/detailHasil/<?= $n[$i][0]['npm'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-file-text-o"></i> Lihat Jawaban</a></td>
          <!-- <?php for ($c=0; $c <$per ; $c++) { ?>
            <td>
              <?php if (empty($n[$i][$c]['jawaban'])) {
                echo "tadi pertanyaan belum ada";
              } elseif (!empty($n[$i][$c]['jawaban'])) {
                if ($n[$i][$c]['jawaban'] == 'Sangat Puas') {
                   echo "5";
                 }elseif ($n[$i][$c]['jawaban'] == 'Puas') {
                   echo "4";
                 }elseif ($n[$i][$c]['jawaban'] == 'Cukup Puas') {
                   echo "3";
                 }elseif ($n[$i][$c]['jawaban'] == 'Tidak Puas') {
                  echo "2";
                 }elseif ($n[$i][$c]['jawaban'] == 'Sangat Tidak Puas') {
                  echo "1";
                 }
              } 
              ?>
          </td>
          <?php } ?> -->
        </tr>
      <?php } ?>
    <?php } ?>
  </table>
  <p><a href="<?php echo base_url() ;?>Datatabel/deleteAll" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data..?')"><i class="fa fa-trash"></i> Hapus Semua Hasil Jawaban Responden</a></p>      
</div>

<script src="<?php echo base_url() ;?>/assetshome/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url() ;?>/assetshome/bootstrap/usebootstrap.js"></script>
</body>
</html>
