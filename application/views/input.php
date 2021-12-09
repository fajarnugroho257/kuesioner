<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Sistem Informasi Kuisioner Survey</title>
  <link href="assetsh/gambar/Gb1.png" rel="shortcut icon" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="<?php echo base_url() ;?>/assetsh/theme/bootstrap.css" media="screen">
  <link rel="stylesheet" href="<?php echo base_url() ;?>/assetsh/theme/usebootstrap.css">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="bootstrap/html5shiv.js"></script>
      <script src="bootstrap/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="<?php echo base_url() ;?>/" class="navbar-brand">Sistem Informasi Survey Kepuasan Mahasiswa</a>
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

    <div class="container">

      <div class="col-lg-12">
        <div class="page-header">
          <h1 id="forms"><center>Formulir Kuisioner Survey<center></h1>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-8">
            <form class="form-horizontal" action="<?php echo base_url()?>input/form_validation" method="post">
              <div class="form-group">
                <label for="inputNPM" class="col-lg-2">NPM</label>
                <div class="col-lg-12">
                  <input type="text" class="form-control" name="npm">
                  <?= form_error('npm', '<small class="text-danger">', '</small>'); ?>
                  <div class="form-group">
                    <label for="inputNama" class="col-lg-2">Nama</label>
                    <div class="col-lg-12">
                      <input type="text" class="form-control" name="nama"> 
                      <?= form_error('nama', '<small class="text-danger">', '</small>'); ?> 
                      <div class="form-group">
                        <label for="inputNoHP" class="col-lg-2">No HP</label>
                        <div class="col-lg-12">
                          <input type="number" class="form-control" name="hp">
                          <?= form_error('hp', '<small class="text-danger">', '</small>'); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <h3><?= $kategori[0]['nama_kategori']?></h3>
                  <?php $no=1;
                  foreach($kategori1 as $row)
                  {
                   ?>

                    <fieldset>
                     <input type="text" hidden="" name="id_pertanyaan<?= $row['id_pertanyaan']; ?>" value="<?= $row['id_pertanyaan']; ?>">       
                     <div id="p<?= $row['id_pertanyaan']; ?>" class="form-group">
                      <div class="col-lg-10">
                        <p><b><?= $row['pertanyaan']; ?></b></p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb5']; ?>">
                            <?= $row['jwb5']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>"  value="<?= $row['jwb4']; ?>">
                            <?= $row['jwb4']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb3']; ?>">
                            <?= $row['jwb3']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb2']; ?>">
                            <?= $row['jwb2']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>"  value="<?= $row['jwb1']; ?>">
                            <?= $row['jwb1']; ?>
                          </label>
                        </div>
                        <?= form_error('jawaban'.$row['id_pertanyaan'], '<small class="text-danger">', '</small>'); ?>                      
                      </div>              
                    </div>
                  </fieldset> 
                <?php } ?>

                <h3><?= $kategori[1]['nama_kategori']?></h3>
                  <?php $no=1;
                  foreach($kategori2 as $row)
                  {
                   ?>

                    <fieldset>
                     <input type="text" hidden="" name="id_pertanyaan<?= $row['id_pertanyaan']; ?>" value="<?= $row['id_pertanyaan']; ?>">       
                     <div id="p<?= $row['id_pertanyaan']; ?>" class="form-group">
                      <div class="col-lg-10">
                        <p><b><?= $row['pertanyaan']; ?></b></p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb5']; ?>">
                            <?= $row['jwb5']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>"  value="<?= $row['jwb4']; ?>">
                            <?= $row['jwb4']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb3']; ?>">
                            <?= $row['jwb3']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb2']; ?>">
                            <?= $row['jwb2']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>"  value="<?= $row['jwb1']; ?>">
                            <?= $row['jwb1']; ?>
                          </label>
                        </div>
                        <?= form_error('jawaban'.$row['id_pertanyaan'], '<small class="text-danger">', '</small>'); ?>                      
                      </div>              
                    </div>
                  </fieldset> 
                <?php } ?>

                <h3><?= $kategori[2]['nama_kategori']?></h3>
                  <?php $no=1;
                  foreach($kategori3 as $row)
                  {
                   ?>

                    <fieldset>
                     <input type="text" hidden="" name="id_pertanyaan<?= $row['id_pertanyaan']; ?>" value="<?= $row['id_pertanyaan']; ?>">       
                     <div id="p<?= $row['id_pertanyaan']; ?>" class="form-group">
                      <div class="col-lg-10">
                        <p><b><?= $row['pertanyaan']; ?></b></p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb5']; ?>">
                            <?= $row['jwb5']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>"  value="<?= $row['jwb4']; ?>">
                            <?= $row['jwb4']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb3']; ?>">
                            <?= $row['jwb3']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb2']; ?>">
                            <?= $row['jwb2']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>"  value="<?= $row['jwb1']; ?>">
                            <?= $row['jwb1']; ?>
                          </label>
                        </div>
                        <?= form_error('jawaban'.$row['id_pertanyaan'], '<small class="text-danger">', '</small>'); ?>                      
                      </div>              
                    </div>
                  </fieldset> 
                <?php } ?>

                <h3><?= $kategori[3]['nama_kategori']?></h3>
                  <?php $no=1;
                  foreach($kategori4 as $row)
                  {
                   ?>

                    <fieldset>
                     <input type="text" hidden="" name="id_pertanyaan<?= $row['id_pertanyaan']; ?>" value="<?= $row['id_pertanyaan']; ?>">       
                     <div id="p<?= $row['id_pertanyaan']; ?>" class="form-group">
                      <div class="col-lg-10">
                        <p><b><?= $row['pertanyaan']; ?></b></p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb5']; ?>">
                            <?= $row['jwb5']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>"  value="<?= $row['jwb4']; ?>">
                            <?= $row['jwb4']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb3']; ?>">
                            <?= $row['jwb3']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb2']; ?>">
                            <?= $row['jwb2']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>"  value="<?= $row['jwb1']; ?>">
                            <?= $row['jwb1']; ?>
                          </label>
                        </div>
                        <?= form_error('jawaban'.$row['id_pertanyaan'], '<small class="text-danger">', '</small>'); ?>                      
                      </div>              
                    </div>
                  </fieldset> 
                <?php } ?>

                <h3><?= $kategori[4]['nama_kategori']?></h3>
                  <?php $no=1;
                  foreach($kategori5 as $row)
                  {
                   ?>

                    <fieldset>
                     <input type="text" hidden="" name="id_pertanyaan<?= $row['id_pertanyaan']; ?>" value="<?= $row['id_pertanyaan']; ?>">       
                     <div id="p<?= $row['id_pertanyaan']; ?>" class="form-group">
                      <div class="col-lg-10">
                        <p><b><?= $row['pertanyaan']; ?></b></p>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb5']; ?>">
                            <?= $row['jwb5']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>"  value="<?= $row['jwb4']; ?>">
                            <?= $row['jwb4']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb3']; ?>">
                            <?= $row['jwb3']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>" value="<?= $row['jwb2']; ?>">
                            <?= $row['jwb2']; ?>
                          </label>
                        </div>
                        <div class="radio">
                          <label>
                            <input type="radio" name="jawaban<?= $row['id_pertanyaan']; ?>"  value="<?= $row['jwb1']; ?>">
                            <?= $row['jwb1']; ?>
                          </label>
                        </div>
                        <?= form_error('jawaban'.$row['id_pertanyaan'], '<small class="text-danger">', '</small>'); ?>                      
                      </div>              
                    </div>
                  </fieldset> 
                <?php } ?>            
                      <div class="form-group">
                        <div class="col-lg-12">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </div>
                    </form>   

                  </div>
                </div>
                <p><a href="<?php echo base_url() ;?>" class="btn btn-info" onclick="return confirm('Apakah Anda Yakin Ingin Kembali..?')">Kembali</a></p>
              </div>
              <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
              <script src="<?php echo base_url() ;?>/assetsh/bootstrap/bootstrap.min.js"></script>
              <script src="<?php echo base_url() ;?>/assetsh/bootstrap/usebootstrap.js"></script>
            </body>
            </html>