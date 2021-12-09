<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Sistem Informasi Kuisioner Survey</title>
  <link href="assetsh/gambar/Gb1.png" rel="shortcut icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assetsh/theme/bootstrap.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assetsh/theme/usebootstrap.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/DataTables/datatables.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/awesome/css/font-awesome.css' ?>">
  <script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery.js' ?>"> </script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/js/bootstrap.js' ?>"> </script>
  <script type="text/javascript" src="<?php echo base_url() . 'assets/DataTables/datatables.js' ?>"> </script>
  <script src="<?php echo base_url(); ?>/assetsh/js/Chart.min.js"></script>
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
  </nav>
  </div>
  <div class="container">
    <div class="container col-lg-12">
      <?php $this->load->view("grafikKategori"); ?>
    </div>
    <br>
    <div class="container col-lg-12">
      <?php $this->load->view("dashboard"); ?>
    </div>
    
    <div class="container col-lg-12">
      <div class="page-header">
        <h1 id="navbar">Grafik Per Prodi</h1>
      </div>
      <canvas id="myChart1" width="400" height="150" ></canvas>
      <div class="page-header">
        <h1 id="navbar">Grafik Per Fakultas</h1>
      </div>
      <canvas id="myChart2" width="400" height="150"></canvas>
    </div>
  </div>
  <script>
    var ctx1 = document.getElementById('myChart1').getContext('2d');
    var ctx2 = document.getElementById('myChart2').getContext('2d');
    var myChart1 = new Chart(ctx1, {
      type: 'pie',
      data: {
        labels: [

          <?php
          for ($i = 0; $i < 21; $i++) {
            echo "'" . $prodi[$i]['nama_prodi'] . "'" . ',';
          }
          ?>

        ],
        datasets: [{
          label: '',
          data: [<?php for ($i = 0; $i < 21; $i++) {
                    if ($i <= 19) {
                      echo "'" . $hslProdi[$i] . "'" . ',';
                    } else {
                      echo $hslProdi[$i];
                    }
                  } ?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 4
        }]
      },
    });
    var myChart2 = new Chart(ctx2, {
      type: 'pie',
      data: {
        labels: [

          <?php
          for ($i = 0; $i < 7; $i++) {
            echo "'" . $fakultas[$i]['nama_fakultas'] . "'" . ',';
          }
          ?>

        ],
        datasets: [{
          label: '',
          data: [<?php for ($i = 0; $i < 7; $i++) {
                    if ($i <= 19) {
                      echo "'" . $hslFakultas[$i] . "'" . ',';
                    } else {
                      echo $hslFakultas[$i];
                    }
                  } ?>],
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(255, 159, 64, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)'
          ],
          borderWidth: 4
        }]
      }
    });
  </script>

  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="<?php echo base_url(); ?>/assetsh/bootstrap/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>/assetsh/bootstrap/usebootstrap.js"></script>


</html>