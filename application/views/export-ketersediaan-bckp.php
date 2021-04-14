<?php

$arrNamaBulan = array("0"=>"Tahun","1"=>"Januari", "2"=>"Februari", "3"=>"Maret", "4"=>"April", "5"=>"Mei", "6"=>"Juni", "7"=>"Juli", "8"=>"Agustus", "9"=>"September", "10"=>"Oktober", "11"=>"November", "12"=>"Desember");
 // header("Content-type: application/vnd-ms-excel");
 
 // header("Content-Disposition: attachment; filename=data ketersediaan ".$arrNamaBulan[$bulan]." $tahun.xls");
 
 // header("Pragma: no-cache");
 
 // header("Expires: 0");
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
<p  style="font-family:'Arial Narrow', Arial, sans-serif;font-size: 25px" align="center">Data Ketersediaan Bahan Pangan Bulan <?php echo $arrNamaBulan[$bulan]." ".$tahun ?> </p>
<table id="export-ketersediaan-table" class="table table-striped table-bordered" width="100%" style="padding-left: 25px">
	<thead  >
		<tr style="height:50px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px;">
			<th>No</th>
			<th>Komoditi</th>
			<th>Satuan</th>
			<?php foreach ($pasar as $key => $value): ?>
			<th style="	width:90px;word-wrap: break-word;" ><?php echo $value->nama_pasar ?></th>
			<?php endforeach ?>
		</tr>
	</thead>
	<tbody>
		<tr style="border-style: hidden;height:10px"></tr>
		<?php $no=0; foreach ($komoditi as $key => $value): $no++; ?>
		<?php if ($value->nama_komoditi != "Daging Ayam Kampung" ): ?>
			
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center"><?php echo $no ?></td>
		<td><?php echo $value->nama_komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<?php $cek =  $value->nama_komoditi; ?>
			<?php if ($cek == "Daging Ayam Ras"): ?>
				<?php if (isset($newketersediaan["Daging Ayam Ras"][$v->nama_pasar])): ?>
					<?php 
					$value = 0;
					$value = $newketersediaan[$value->nama_komoditi][$v->nama_pasar] * 1.43;
					if (isset($newketersediaan["Daging Ayam Kampung"][$v->nama_pasar])) {
						# code...
						$value += ($newketersediaan["Daging Ayam Kampung"][$v->nama_pasar]*1.463); 
					}
					?>
					<td style=" text-align: right" ><?php echo $value ?></span></td>
					<?php else: ?>
					<td style=" text-align: right" >-</span></td>  				
				<?php endif ?>
			<?php else: ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan[$value->nama_komoditi][$v->nama_pasar])?$newketersediaan[$value->nama_komoditi][$v->nama_pasar]:"-"; ?></span></td>  
			<?php endif ?>
		<?php endforeach ?>
		</tr>
		<?php endif ?>
		<?php endforeach ?>
	</tbody>
</table> 
</body>
</html>
