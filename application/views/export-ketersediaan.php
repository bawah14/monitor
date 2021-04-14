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
		<!-- Beras -->
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">1</td>
		<td>Beras</td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan["Beras"][$v->nama_pasar])?number_format($newketersediaan["Beras"][$v->nama_pasar],0,",","."):"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>

		<!-- "Minyak Goreng" -->
		<?php $komoditi = "Minyak Goreng";?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">2</td>
		<td><?php echo $komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan[$komoditi][$v->nama_pasar])?number_format($newketersediaan[$komoditi][$v->nama_pasar],0,",","."):"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>

		<!-- "Gula Pasir" -->
		<?php $komoditi = "Gula Pasir";?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">3</td>
		<td><?php echo $komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan[$komoditi][$v->nama_pasar])?number_format($newketersediaan[$komoditi][$v->nama_pasar],0,",","."):"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>


		<!-- "Tepung Terigu" -->
		<?php $komoditi = "Tepung Terigu";?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">4</td>
		<td><?php echo $komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan[$komoditi][$v->nama_pasar])?number_format($newketersediaan[$komoditi][$v->nama_pasar],0,",","."):"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>


		<!-- "Telur Ayam Ras" -->
		<?php $komoditi = "Telur Ayam Ras";?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">5</td>
		<td><?php echo $komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan[$komoditi][$v->nama_pasar])?number_format($newketersediaan[$komoditi][$v->nama_pasar],0,",","."):"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>
		
		<!-- "Daging Sapi" -->
		<?php $komoditi = "Daging Sapi";?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">6</td>
		<td><?php echo $komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan[$komoditi][$v->nama_pasar])?number_format($newketersediaan[$komoditi][$v->nama_pasar],0,",","."):"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>
		
		<!-- "Daging Ayam" -->
		<?php $komoditi = "Daging Ayam";?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">7</td>
		<td><?php echo $komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<?php 
				$ras = isset($newketersediaan["Daging Ayam Ras"][$v->nama_pasar]) ? ($newketersediaan["Daging Ayam Ras"][$v->nama_pasar] * 1.43) : 0 ;
				$kampung = isset($newketersediaan["Daging Ayam Kampung"][$v->nama_pasar]) ? ($newketersediaan["Daging Ayam Kampung"][$v->nama_pasar] * 1.463) : 0 ;
				if ($ras == 0 && $kampung == 0) {
					# code...
					$total = "-";
				}else{
					$total = $ras + $kampung;
				}
			 ?>
			<td style=" text-align: right" ><?php echo $total!="-"? number_format($total,0,",",".") :$total; ?></span></td>  
		<?php endforeach ?>
		</tr>
		
		<!-- "Daging Itik" -->
		<?php $komoditi = "Daging Itik";?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">8</td>
		<td><?php echo $komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan[$komoditi][$v->nama_pasar]) ? ($newketersediaan[$komoditi][$v->nama_pasar] * 1.05) :"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>
		
		<!-- "Ikan" -->
		<?php $komoditi = "Ikan";?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">9</td>
		<td><?php echo $komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan[$komoditi][$v->nama_pasar])?number_format($newketersediaan[$komoditi][$v->nama_pasar],0,",","."):"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>
		
		<!-- "Bawang Merah -->
		<?php $komoditi = "Bawang Merah";?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">10</td>
		<td><?php echo $komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan[$komoditi][$v->nama_pasar])?number_format($newketersediaan[$komoditi][$v->nama_pasar],0,",","."):"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>
		
		<!-- "Bawang Merah -->
		<?php $komoditi = "Bawang Putih";?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">11</td>
		<td><?php echo $komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan[$komoditi][$v->nama_pasar])?number_format($newketersediaan[$komoditi][$v->nama_pasar],0,",","."):"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>
		
		<!-- "Cabai Merah -->
		<?php $komoditi = "Cabai Merah";?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">12</td>
		<td><?php echo $komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan[$komoditi][$v->nama_pasar])?number_format($newketersediaan[$komoditi][$v->nama_pasar],0,",","."):"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>
		
		<!-- "Cabai Rawit -->
		<?php $komoditi = "Cabai Rawit";?>
		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style=" text-align: center">13</td>
		<td><?php echo $komoditi ?></td>
		<td style=" text-align: center" >Kg</td> 
		<?php foreach ($pasar as $k => $v): ?>
			<td style=" text-align: right" ><?php echo isset($newketersediaan[$komoditi][$v->nama_pasar])?number_format($newketersediaan[$komoditi][$v->nama_pasar],0,",","."):"-"; ?></span></td>  
		<?php endforeach ?>
		</tr>
	</tbody>
</table> 
</body>
</html>
