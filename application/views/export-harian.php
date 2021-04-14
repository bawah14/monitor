<?php
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=data harga.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>COBA</h1>
<table id="dt-responsive" class="table table-striped table-bordered dataTable " style="width:100%" >
	<thead>
		<?php $no=1; ?>
		<th>No</th>
		<th >Uraian</i></th>
		<th>Satuan</th>
		<?php foreach ($allpasar->result() as $value): ?>
			<th><?php echo $value->nama_pasar ?></th>
		<?php endforeach ?>
	</thead>
	<tbody>
		<?php foreach ($allkomoditi->result() as $value): ?>
		<tr>
			<td><?php echo $no;$no++; ?></td>
			<td><?php echo $value->nama_komoditi ?></td>
			<td><?php echo $value->keterangan_komoditi ?></td>
			<?php foreach ($allpasar->result() as $val): ?>
				<td>
					<?php echo $harga[$val->id_pasar][$value->id_komoditi] == 0 ? '-':$harga[$val->id_pasar][$value->id_komoditi]; ?>
				</td>
			<?php endforeach ?>
		</tr>
		<?php endforeach ?>
	</tbody>
</table>
</body>
</html>
