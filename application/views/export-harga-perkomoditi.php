<?php 
$arrNamaBulan = array("0"=>"Tahun","1"=>"Januari", "2"=>"Februari", "3"=>"Maret", "4"=>"April", "5"=>"Mei", "6"=>"Juni", "7"=>"Juli", "8"=>"Agustus", "9"=>"September", "10"=>"Oktober", "11"=>"November", "12"=>"Desember");
header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=data harga komoditi ".$komoditi[0]->nama_komoditi." ".$arrNamaBulan[$bulan]." $tahun.xls");

header("Pragma: no-cache");

header("Expires: 0");
setlocale (LC_TIME, 'id_ID');

foreach ($harga as $key => $value) {
	# code...
	foreach ($value as $k => $v) {
		# code...
		$newharga[$key][$v->tanggal] = $v->harga; 
	}
}
// print_r($komoditi);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
	table, th, td {
	  border: 1px solid;
	  border-color: #101010 !important;
	}

	th, td {
	  padding: 10px;
	}
</style>
</head>
<body>
<br>
<p  style="font-family:'Arial Narrow', Arial, sans-serif;font-size: 25px" align="center">Data Harga <?php echo $komoditi[0]->nama_komoditi ?> Bulan <?php echo $arrNamaBulan[$bulan]." ".$tahun ?> </p>
<table id="export-ketersediaan-table" class="table table-striped table-bordered" width="100%" style="padding-left: 25px">
	<thead  >
		<tr style="height:50px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px;">
			<th style="	width:60px;word-wrap: break-word;" >Tanggal</th>
			<?php foreach ($pasar as $key => $value): ?>
			<th style="	width:90px;word-wrap: break-word;" ><?php echo $value->nama_pasar ?></th>
			<?php endforeach ?>
		</tr>
	</thead>
	<tbody>
		<tr style="border-style: hidden;height:10px"></tr>
		<!-- Beras -->
		<?php for ($i=1; $i <= 31; $i++) { ?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center"><?php echo $i ?></td>
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newharga[$v->nama_pasar][$i])?number_format($newharga[$v->nama_pasar][$i],0,",","."):"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>
		<?php } ?>
	</tbody>
</table> 
</body>
</html>
