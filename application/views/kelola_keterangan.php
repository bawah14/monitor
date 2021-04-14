<?php 
if (!isset($date)) {
	# code...
	$date = date('Y-m-d');
}
 ?>
<div class="right_col" role="main">
  <div class="">
    <div class="row">
    	<div class="x_panel">
          <div class="x_title">
          	<h2>Tambah Keterangan</h2><br><div class="clear-fix"></div>
          </div>
          <div class="x_content">
          	<?php echo form_open(base_url('index.php/router/handlerinputketerangan'),array('name'=>'inputketerangan', 'method'=>'POST')) ?>
          	<div class="row">
          		<div class="col-lg-2">
		          	<div class="form-group">
		          		<label>Tanggal</label>
		          		<input type="date" class="form-control" name="tanggal" value="<?php echo $date ?>" >
		          	</div>
          		</div> 
          		<div class="col-lg-1">
          			<div class="form-group">
          				<br>
	          			<button class="btn btn-success" type="button">pilih</button>
          			</div>
          		</div>
          	</div>
          	<div class="row">
          		<div class="col-lg-6">
		          	<div class="form-group">
		          		<label>Pasar</label>
		          		<select class="form-control" required="" name="pasar">
		          			<option disabled="" selected="" value="" >Pilih Pasar ...</option>
		          			<?php foreach ($pasar as $key => $value): ?>
		          			<option value="<?php echo $value->id_pasar ?>"><?php echo $value->nama_pasar ?></option>	
		          			<?php endforeach ?>
		          		</select>
		          	</div>
          		</div>
          		<div class="col-lg-6">
		          	<div class="form-group">
		          		<label>Kategori</label>
		          		<select class="form-control" name="kategori" required="">
		          			<option disabled="" selected="" value="">Pilih Kategori ...</option>
		          			<option>Harga</option>
		          			<option>Ketersediaan</option>
		          		</select>
		          	</div>
          		</div>
          		<div class="col-lg-12">
		          	<div class="form-group" name="komoditi" required="">
		          		<label>Keterangan</label>
		          		<textarea required="" name="keterangan" class="form-control"></textarea>
		          	</div>
          		</div>
          		<div class="col-lg-12"> 
          			<button type="submit" class="btn btn-info pull-right">Input</button>
          		</div>  
          	</div>
          	<?php echo form_close() ?>
          </div>
        </div>
        <div class="x_panel">
          <div class="x_title">
          	<h2>Kelola Keterangan</h2><br><div class="clear-fix"></div>
          </div>
          <div class="x_content">
          	<div class="row">
          		<div class="col-lg-12">
          			<?php var_dump($keterangan) ?>
          			<table class="table datatable table-bordered table-stripped">
          				<thead>
          					<th>No</th>
          					<th>Tanggal Keterangan</th>
          					<th>Pasar</th>
          					<th >Keterangan</th>
          					<th>Action</th>
          				</thead>
          				<tbody>
          					<?php if ($keterangan!=null): ?>
          						<?php $no=0; foreach ($keterangan as $key => $value): $no++ ?>
	          					<tr>
	          						<td><?php echo $no ?></td>
	          						<td><?php echo $value->tanggal_keterangan ?></td>
	          						<td><?php echo $value->id_pasar ?></td>
	          						<td><?php echo $value->isi_keterangan ?></td>
	          						<td>hapus</td>
	          					</tr>
          						<?php endforeach ?>
          					<?php endif ?>
          				</tbody>
          			</table>
          		</div>
          	</div>
          </div>
        </div>
    </div>
</div>
