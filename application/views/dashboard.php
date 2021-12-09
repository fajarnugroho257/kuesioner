  <div class="page-header">
    <h1 id="navbar">Grafik Pertanyaan</h1>
  </div>

  <?php 
  for ($i=0; $i <$jumper; $i++) { ?>
    <div class="panel ml panel-info col-lg-4">
      <div class="panel-heading">
        <h3 class="panel-title">Pertanyaan <?=$i+1?></h3>
      </div>
      <div class="panel-body">
        <p><?= $pertanyaan[$i]['pertanyaan']?></p>
        <div>
          <canvas height="250" id="myChartsatu<?=$i?>"></canvas>
        </div>
      </div>
    </div>
  <?php } ?>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="<?php echo base_url() ;?>/assetsh/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo base_url() ;?>/assetsh/bootstrap/usebootstrap.js"></script>
<script>
  for(let i = 0; i < <?=$jumper?>; i++){
    array = [
    <?php 
    for ($i=0; $i <$jumper ; $i++) { 
      echo "[".$hasil[$i][0].','.$hasil[$i][1].','.$hasil[$i][2].','.$hasil[$i][3].','.$hasil[$i][4]."],";
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
      document.getElementById('myChartsatu'+i),
      config
      );
  }

</script>    

