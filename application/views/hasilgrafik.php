<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistem Informasi Kuisioner Survey</title>
  <link href="assetsh/gambar/Bg3.png" rel="shortcut icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url() ;?>/assetsh/theme/bootstrap.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url() ;?>/assetsh/theme/usebootstrap.css">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap/html5shiv.js"></script>
      <script src="bootstrap/respond.min.js"></script>
    <![endif]-->
    <script src="<?php echo base_url() ;?>/assetsh/js/Chart.min.js"></script>
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url() ;?>/Hasil/P1" class="navbar-brand">Sistem Informasi Kuisioner Survey</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
        </div>
      </div>
    </div>
    <div class="page-header">
      <h1 id="navbar">Hasil Kuisioner</h1>
    </div>
    <div class="panel panel-info col-lg-3">
      <div class="panel-heading">
        <h3 class="panel-title">Panel info</h3>
      </div>
      <div class="panel-body">
        <div class="list-group">

          <?php for ($i=0; $i <$jumper ; $i++) { ?>
           <a href="<?php echo base_url() ;?>Datatabel/hasilgrafik/<?= $pertanyaan[$i]['id_pertanyaan']?>" class="list-group-item">
            <?= "Pertanyaan ".$i+1 ?>
          </a>
        <?php } ?>
        <a href="<?php echo base_url() ;?>admin" class="list-group-item">
          Kembali
        </a>
      </div>
    </div>
  </div>
  <div class="container col-lg-9">
   <!-- <p> Dari <span class="label label-success"><?php echo $total_r ;?></span> Responden Untuk pertanyaan Ini Menjawab Sangat Baik = <span class="label label-info"><?php echo $p1_j1 ;?></span>, Baik = <span class="label label-info"><?php echo $p1_j2 ;?></span>, Cukup = <span class="label label-info"><?php echo $p1_j3 ;?></span>, Dan Buruk = <span class="label label-info"><?php echo $p1_j4 ;?></span> Orang</p> -->
   <div class="page-header">
    <h1 id="navbar">Grafik</h1>
  </div>   

  <canvas id="myChart" width="400" height="100"></canvas>

</div>
<?php 
echo "<pre>";
print_r($kkk);
?>
<script>
  var ctx = document.getElementById('myChart').getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas'],
      datasets: [{
        label: '',
        data: [<?php for ($i=0; $i <5 ; $i++) { 
          if ($i <= 3) {
           echo "'".$kkk[$i]['hasil']."'".',';
         } else {
           echo $kkk[$i]['hasil'];
         }
       } ?>],
       backgroundColor: [
       'rgba(255, 99, 132, 0.2)',
       'rgba(54, 162, 235, 0.2)',
       'rgba(255, 206, 86, 0.2)',
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
       'rgba(255, 159, 64, 1)'
       ],
       borderWidth: 4  
     }]
   },
   options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});
</script>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url() ;?>/assetsh/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url() ;?>/assetsh/bootstrap/usebootstrap.js"></script>
</body>
</html>
