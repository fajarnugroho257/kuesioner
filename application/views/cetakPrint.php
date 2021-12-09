<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table class="table table-striped" border="1" width="100%">
		<tr>
			<td>No</td>
			<td>NPM</td>
			<td>Nama Mahasiswa</td>
			<td>Prodi</td>
			<?php for ($i=1; $i <$per+1 ; $i++) { ?>
				<td>Jwb <?= $i; ?></td>
			<?php } ?>
		</tr>
		<?php 
		if ($n !=null) { ?>
			<?php $no=1; for ($i=0; $i <count($n) ; $i++) { ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $n[$i][0]['npm']; ?></td>
					<td><?= $n[$i][0]['nama']; ?></td>
					<td><?= $n[$i][0]['nama_prodi']; ?></td>
					<?php for ($c=0; $c <$per ; $c++) { ?>
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
					<?php } ?>
				</tr>
			<?php } ?>
		<?php } ?>
	</table>
</body>
</html>

<script>
	window.print();
</script>