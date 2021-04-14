<?php

$arrNamaBulan = array("0"=>"Tahun","1"=>"Januari", "2"=>"Februari", "3"=>"Maret", "4"=>"April", "5"=>"Mei", "6"=>"Juni", "7"=>"Juli", "8"=>"Agustus", "9"=>"September", "10"=>"Oktober", "11"=>"November", "12"=>"Desember");
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=data ketersediaan ".$arrNamaBulan[$bulan]." $tahun.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
setlocale (LC_TIME, 'id_ID');
foreach ($komoditi as $key => $value) {
	# code...
	$newkomoditi[$value->id_komoditi] = $value->nama_komoditi; 
}
foreach ($ketersediaan as $key => $value) {
  # code...
  foreach ($value as $k => $v) {
    # code...
    $newketersediaan[$v->nama_komoditi][$v->nama_pasar] = $v->jumlah;  
  }
}


// print_r($ketersediaan);
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
	table, th, td {
	  border: 1px solid black;
	}

	th, td {
	  padding: 10px;
	}
</style>
</head>
<body>
<h1 align="center">Data Ketersediaan Bahan Pangan Bulan <?php echo $arrNamaBulan[$bulan]." ".$tahun ?> </h1><br>
<table id="export-ketersediaan-table" class="table table-striped table-bordered" width="100%">
	<thead>
		<th>No</th>
		<th>Komoditi</th>
		<th>Satuan</th>
		<?php foreach ($pasar as $key => $value): ?>
		<th  ><?php echo $value->nama_pasar ?></th>
		<?php endforeach ?>
	</thead>
	<tbody>
		<?php $no=0; foreach ($komoditi as $key => $value): $no++; ?>
		<tr style="height:30px;font-family:'Arial';font-size: 17px">
		<td style=" text-align: center"><?php echo $no ?></td>
		<td><?php echo $value->nama_komoditi ?></td>
		<td>Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
		<td style=" text-align: right" ><?php echo isset($newketersediaan[$value->nama_komoditi][$v->nama_pasar])?$newketersediaan[$value->nama_komoditi][$v->nama_pasar]:0; ?></span></td>  
		<?php endforeach ?>
		</tr>
		<?php endforeach ?>
	</tbody>
</table> 
</body>
</html>
