  <div class="page-header">
    <h1 id="navbar">Grafik Hasil Kuesioner Per Kategori</h1>
  </div>

  <?php 
  for ($i=0; $i <count($gori); $i++) { ?>
    <div class="panel ml panel-info col-lg-4">
      <div class="panel-heading">
        <h3 class="panel-title"><?=$kategori[$i]['nama_kategori']?></h3>
      </div>
      <div class="panel-body">
        <div>
          <canvas height="250" id="myChartdua<?=$i?>"></canvas>
        </div>
      </div>
      <div class="panel-heading">
        <h3 class="panel-title">Hasil Distribusi Persentase<br><?=$kategori[$i]['nama_kategori']?><br><?php $angka_format = number_format($presentase[$i],2); echo $angka_format; ?>% (<?= $minat[$i] ?>)</h3>
      </div>
    </div>
  <?php } ?>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url() ;?>/assetsh/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url() ;?>/assetsh/bootstrap/usebootstrap.js"></script>
<script>
  for(let i = 0; i < 5; i++){
    array = [
    <?php 
    for ($i=0; $i <5 ; $i++) { 
      echo "[".$gori[0][$i].','.$gori[1][$i].','.$gori[2][$i].','.$gori[3][$i].','.$gori[4][$i]."],";
    }
    ?>
    ]
    const label = [['Sangat Puas', 'Puas', 'Cukup Puas', 'Tidak Puas', 'Sangat Tidak Puas']];
    const data = {
      labels: label[0],
      datasets: [{
        backgroundColor: [
        'rgb(181, 118, 2)',
        'rgb(227, 220, 9)',
        'rgb(9, 227, 45)',
        'rgb(9, 223, 227)',
        'rgb(227, 9, 183)',
        ],
        borderColor: 'rgb(230, 230, 230)',
        data: array[+i],
      }]
    };

    var chartOptions = {
      responsive: true,
      legend: {
        position: "top"
      }
    }

    const config = {
      type: 'pie',
      data: data,
      options: chartOptions
    };
    var myChart = new Chart(
      document.getElementById('myChartdua'+i),
      config
      );
  }

</script>    

