<?php 
// print_r($pasar);print_r($komoditi);
if (isset($_GET['tanggal'])) {
	# code...
	$tanggal = $_GET['tanggal']; 
}else{
	$tanggal = date("Y-m-d");
}
if (isset($query)) {
     # code...
     // print_r($query);
}
// print_r();
foreach ($komoditi as $key => $value) {
	# code...
	$newkomoditi[$value->id_komoditi] = $value->nama_komoditi; 
}
?>
<div class="right_col" role="main">
  <div class="">
    <div class="row">
    	<div class="x_panel">
          <div class="x_title">
          	<h2>Edit Ketersediaan</h2>
            <button class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-webconfig">Setting</button>
          	<div class="clearfix"></div>
          </div>
          <div class="x_content">
          	<?php 
				// print_r($pasar);print_r($komoditi);
          	// print_r($komoditi);print_r($ketersediaan);
          	 ?>
          	 <div class="row">
              <div class="col-lg-4">
                 <label>Minggu</label>
                 <div class="form-group">
                   <select class="form-control" name="minggu" id="minggu" required="">
                     <option disabled="" >Pilih Minggu ...</option>
                     <?php for ($i=0; $i < 5; $i++) {?> 
                     <option value="<?php echo $i+1 ?>" <?php echo (isset($_GET['minggu']) && $_GET['minggu'] == $i+1 )?"selected":""; ?> >Minggu ke - <?php echo $i+1 ?></option>
                     <?php } ?>
                   </select>
                 </div>
              </div>
              <div class="col-lg-4">

                 <label>Bulan</label>
                 <div class="form-group">
                   <select class="form-control" name="bulan"  id="bulan" required="">
                     <option disabled="" value="" >Pilih Bulan ...</option>
                     <?php for ($i=0; $i < 12; $i++) {?> 
                     <option value="<?php echo $i+1 ?>" <?php echo (isset($_GET['bulan']) && $_GET['bulan'] == $i+1 )?"selected":""; ?>>Bulan ke - <?php echo $i+1 ?></option>
                     <?php } ?>
                   </select>
                 </div>
              </div>
              <div class="col-lg-4">
                 <label>Tahun</label>
                 <div class="form-group">
                   <select class="form-control" name="tahun"  id="tahun" required="">
                     <option disabled="" value="" >Pilih Tahun ...</option>
                     <?php for ($i=0; $i < 5; $i++) {?> 
                     <option value="<?php echo $i+2020 ?>" <?php echo (isset($_GET['tahun']) && $_GET['tahun'] == $i+2020 )?"selected":""; ?>><?php echo $i+2020 ?></option>
                     <?php } ?>
                   </select>
                 </div>
              </div>
            <div class="col-lg-12">
          	 <div class="form-group">
          	 	<label>Pasar</label>
          	 	<select class="form-control api" id="select-pasar" required="">
          	 		<option value="" >Pilih Pasar ...</option>
          	 		<?php foreach ($pasar as $key => $value): ?>
          	 			<option value="<?php echo $value->id_pasar ?>" <?php if (isset($_GET['pasar'])&&$_GET['pasar'] == $value->id_pasar ): ?>
          	 				selected
          	 			<?php endif ?>><?php echo $value->nama_pasar ?></option>
          	 		<?php endforeach ?>
          	 	</select>
          	 </div>
            </div>
          	 <div class="form-group">
          	 	<button class="btn btn-default pull-right" id="pilih-edit-ketersediaan">Pilih</button>
          	 	<button class="btn btn-success pull-right" id="export-ketersediaan">Export</button>
              <button class="btn btn-info  pull-right" data-toggle="modal" data-target="#modal-tambah">Input</button>
          	 </div>
          	 </div>
          	 <hr>
          	 <div class="row">
          	 	<div class="col-lg-12">
          	 		<table id="dt-responsive" class="table table-striped table-bordered" width="100%">
          	 			<thead>
          	 				<th>No</th>
          	 				<th>Komoditi</th>
          	 				<th>Jumlah Ketersediaan</th>
          	 				<th>Nama Pedagang</th>
          	 				<th>Asal Ketersediaan</th>
                    <th>Action</th>
          	 			</thead>
          	 			<tbody>
						<?php if ($ketersediaan!=null): ?>
          	 				<?php $no=0; foreach ($ketersediaan as $key => $value): $no++; ?>
          	 					<tr >
          	 						<td><?php echo $no ?></td>
          	 						<td><?php echo $newkomoditi[$value->id_komoditi]?></td>
          	 						<td><?php echo $value->jumlah_ketersediaan ?></td>
          	 						<td><?php echo $value->nama_pedagang ?></td>
          	 						<td><?php echo $value->asal_ketersediaan ?></td>
                        <td> <a  role="button" data-toggle="modal" data-target="#modal-<?php echo $value->id_ketersediaan ?>"> Edit </a> | <a href="#" class="hapus-ketersediaan" id="<?php echo($value->id_ketersediaan) ?>">Hapus</a> </td>
          	 					</tr>
                      <div class="modal" id="modal-<?php echo $value->id_ketersediaan ?>" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                              <h5 class="modal-title">Edit Data <?php echo $value->nama_pedagang ?></h5>
                            </div>
                            <div class="modal-body">
                              <?php echo form_open(base_url('index.php/router/handlereditketersediaan'),array('name'=>'edit_ketersediaan', 'method'=>'POST')); ?>
                              <input type="hidden" name="id" value="<?php echo $value->id_ketersediaan ?>">
                              <input type="hidden" name="minggu" value="<?php echo $_GET['minggu'] ?>">
                              <input type="hidden" name="bulan" value="<?php echo $_GET['bulan'] ?>">
                              <input type="hidden" name="tahun" value="<?php echo $_GET['tahun'] ?>">
                              <input type="hidden" name="pasar" value="<?php echo $_GET['pasar'] ?>">
                              <div class="row"> 
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Nama Pedagang</label>
                                    <input type="text" class="form-control" name="nama_pedagang" value="<?php echo $value->nama_pedagang ?>">
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Jumlah Ketersediaan</label>
                                    <input type="number" class="form-control" name="jumlah_ketersediaan" value="<?php echo $value->jumlah_ketersediaan ?>">
                                  </div>
                                </div>

                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Save changes</button>
                              <?php echo form_close(); ?>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>
                      </div>
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
</div>
<div class="modal" id="modal-tambah" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah data Ketersediaan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php echo form_open(base_url('index.php/router/handlerinputketersediaanpetugas'),array('name'=>'edit_ketersediaan', 'method'=>'POST')); ?>
          <div class="row">
            <div class="col-4">
              <label>Minggu</label>
              <select class="form-control" name="minggu">
                <option>Pilih Minggu </option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <div class="col-4">
              <label>Bulan</label>
              <select class="form-control" name="bulan">
                <option>Pilih Bulan </option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
                <option>11<option>
                <option>12</option>
              </select>
            </div><div class="col-4">
              <label>Tahun</label>
              <select class="form-control" name="tahun">
                <option>Pilih Tahun </option>
                <option>2020</option>
                <option>2021</option>
                <option>2022</option>
                <option>2023</option>
                <option>2024</option>
              </select>
            </div>
          </div>
          <div class="form-group"> 
            <label>Komoditi</label>
            <select class="form-control" name="id_komoditi">
              <option>Pilih Komoditi ... </option>
              <?php foreach ($komoditi as $key => $value): ?>
                <option value="<?php echo $value->id_komoditi ?>"><?php echo $value->nama_komoditi ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group"> 
            <label>Pasar</label>
            <select class="form-control" name="pasar">
              <option>Pilih pasar ... </option>
              <?php foreach ($pasar as $key => $value): ?>
                <option value="<?php echo $value->id_pasar ?>"><?php echo $value->nama_pasar ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <div class="form-group"> 
            <label>Jumlah Ketersediaan</label>
            <input type="text" name="jumlah_ketersediaan" class="form-control">
          </div>
          <div class="form-group"> 
            <label>Nama Pedagang</label>
            <input type="text" name="nama_pedagang" class="form-control">
          </div>
          <div class="form-group"> 
            <label>Asal Ketersediaan</label>
            <input type="text" name="asal_ketersediaan" class="form-control">
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Kirim</button>
        <?php echo form_close() ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>