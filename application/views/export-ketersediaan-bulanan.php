<?php 
// print_r($perminggu);
$arrNamaBulan = array("0"=>"Tahun","1"=>"Januari", "2"=>"Februari", "3"=>"Maret", "4"=>"April", "5"=>"Mei", "6"=>"Juni", "7"=>"Juli", "8"=>"Agustus", "9"=>"September", "10"=>"Oktober", "11"=>"November", "12"=>"Desember");
header("Content-type: application/vnd-ms-excel");

header("Content-Disposition: attachment; filename=data ketersediaan bulan ".$arrNamaBulan[$bulan]." $tahun.xls");

header("Pragma: no-cache");

header("Expires: 0");
setlocale (LC_TIME, 'id_ID');


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
<p  style="font-family:'Arial Narrow', Arial, sans-serif;font-size: 25px" align="center">Data Ketersediaan Bahan Pangan Bulan <?php echo $arrNamaBulan[$bulan] ?> Tahun <?php echo $tahun ?></p>
<table id="export-ketersediaan-table" class="table table-striped table-bordered" width="100%" style="padding-right: 25px" >
	<thead>
		<tr style="height:50px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px;">
			
			<th >No</th>
			<th >Komoditi</th>
			<th>Minggu 1</th>
			<th>Minggu 2</th>
			<th>Minggu 3</th>
			<th>Minggu 4</th>
			<th>Minggu 5</th>
			<th>Total</th>
		</tr>
	</thead>
<tbody>
<?php if (isset($perminggu) && $perminggu!=null): ?>
	<tr style="border-style: hidden;height:10px"></tr>
	<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">1</td>
		<td><?php $key = "Beras" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo number_format($perminggu[$key][1][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][2][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][3][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][4][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][5][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perbulan[$key][0]->total,2,",",".") ?></td>
	</tr>

	<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">2</td>
		<td><?php $key = "Daging Sapi" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right">-</td>
		<td style="text-align: right">-</td>
		<td style="text-align: right">-</td>
		<td style="text-align: right">-</td>
		<td style="text-align: right">-</td>
		<td style="text-align: right">-</td>
	</tr>

	<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">3</td>
		<td><?php $key = "Daging Ayam Ras" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][1][0]->total*1.43 ),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][2][0]->total*1.43 ),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][3][0]->total*1.43 ),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][4][0]->total*1.43 ),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][5][0]->total*1.43 ),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perbulan[$key][0]->total*1.43 ),2,",",".")) ?></td>
	</tr>

	<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">4</td>
		<td><?php $key = "Daging Ayam Kampung" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][1][0]->total*1.463 ),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][2][0]->total*1.463 ),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][3][0]->total*1.463 ),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][4][0]->total*1.463 ),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][5][0]->total*1.463 ),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perbulan[$key][0]->total*1.463 ),2,",",".")) ?></td>
	</tr>
	<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">5</td>
		<td><?php $key = "Daging Itik" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][1][0]->total*1.05),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][2][0]->total*1.05),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][3][0]->total*1.05),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][4][0]->total*1.05),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perminggu[$key][5][0]->total*1.05),2,",",".")) ?></td>
		<td style="text-align: right"><?php echo (number_format(($perbulan[$key][0]->total*1.05),2,",",".")) ?></td>
	</tr>
	<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">6</td>
		<td><?php $key = "Telur Ayam Ras" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo number_format($perminggu[$key][1][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][2][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][3][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][4][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][5][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perbulan[$key][0]->total,2,",",".") ?></td>
	</tr>
	<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">7</td>
		<td><?php $key = "Gula Pasir" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo number_format($perminggu[$key][1][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][2][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][3][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][4][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][5][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perbulan[$key][0]->total,2,",",".") ?></td>
	</tr>
	<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">8</td>
		<td><?php $key = "Bawang Merah" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo number_format($perminggu[$key][1][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][2][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][3][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][4][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][5][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perbulan[$key][0]->total,2,",",".") ?></td>
	</tr>

		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">9</td>
		<td><?php $key = "Bawang Putih" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo number_format($perminggu[$key][1][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][2][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][3][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][4][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][5][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perbulan[$key][0]->total,2,",",".") ?></td>
	</tr>

		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">10</td>
		<td><?php $key = "Cabai Merah" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo number_format($perminggu[$key][1][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][2][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][3][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][4][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][5][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perbulan[$key][0]->total,2,",",".") ?></td>
	</tr>

		<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">11</td>
		<td><?php $key = "Cabai Rawit" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo number_format($perminggu[$key][1][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][2][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][3][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][4][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][5][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perbulan[$key][0]->total,2,",",".") ?></td>
	</tr>

	<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">12</td>
		<td><?php $key = "Ikan" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo number_format($perminggu[$key][1][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][2][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][3][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][4][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][5][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perbulan[$key][0]->total,2,",",".") ?></td>
	</tr>

	<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">13</td>
		<td><?php $key = "Minyak Goreng" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo number_format($perminggu[$key][1][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][2][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][3][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][4][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][5][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perbulan[$key][0]->total,2,",",".") ?></td>
	</tr>

	<tr style="height:30px;font-family:'Arial Narrow', Arial, sans-serif;font-size: 16px">
		<td style="text-align: center">14</td>
		<td><?php $key = "Tepung Terigu" ; echo $key ?></td>
		<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
		<td style="text-align: right"><?php echo number_format($perminggu[$key][1][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][2][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][3][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][4][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perminggu[$key][5][0]->total,2,",",".") ?></td>
		<td style="text-align: right"><?php echo number_format($perbulan[$key][0]->total,2,",",".") ?></td>
	</tr>
<?php  endif ?>
</tbody>
</table> 

</body>
</html>
