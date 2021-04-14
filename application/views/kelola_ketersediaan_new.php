<?php 

if (isset($_GET['tanggal'])) {
	# code...
	$tanggal = $_GET['tanggal']; 
}else{
	$tanggal = date("Y-m-d");
}
// print_r();
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
?>
<div class="right_col" role="main">
  <div class="">
    <div class="row">
    	<div class="x_panel">
          <div class="x_title">
          	<h2>Kelola Ketersediaan</h2>
            <button class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-webconfig">Setting</button>
            <button class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-bulanan-perpasar">Laporan per Pasar</button>
          	<div class="clearfix"></div>
          </div>
          <div class="x_content">
          	<?php 
				// print_r($pasar);print_r($komoditi);
          	// print_r($newketersediaan);
          	 ?>
          	 <div class="row">
              <div class="col-lg-4">
                 <label>Minggu</label>
                 <div class="form-group">
                   <select class="form-control" name="minggu" id="minggu">
                     <option disabled="" selected="">Pilih Minggu ...</option>
                     <?php for ($i=0; $i < 5; $i++) {?> 
                     <option value="<?php echo $i+1 ?>" <?php if (isset($_GET['minggu']) && ($_GET['minggu']==($i+1)) ): ?>
                       selected
                     <?php endif ?>>Minggu ke - <?php echo $i+1 ?></option>
                     <?php } ?>
                   </select>
                 </div>
              </div>
              <div class="col-lg-4">

                 <label>Bulan</label>
                 <div class="form-group">
                   <select class="form-control" name="bulan"  id="bulan">
                     <option disabled="" selected="">Pilih Bulan ...</option>
                     <?php for ($i=0; $i < 12; $i++) {?> 
                     <option value="<?php echo $i+1 ?>" <?php if (isset($_GET['bulan']) && ($_GET['bulan']==($i+1)) ): ?>
                       selected
                     <?php endif ?>>Bulan ke - <?php echo $i+1 ?></option>
                     <?php } ?>
                   </select>
                 </div>
              </div>
              <div class="col-lg-4">
                 <label>Tahun</label>
                 <div class="form-group">
                   <select class="form-control" name="tahun"  id="tahun">
                     <option disabled="" selected="">Pilih Tahun ...</option>
                     <?php for ($i=0; $i < 5; $i++) {?> 
                     <option value="<?php echo $i+2020 ?>" <?php if (isset($_GET['tahun']) && ($_GET['tahun']==($i+2020)) ): ?>
                       selected
                     <?php endif ?>><?php echo $i+2020 ?></option>
                     <?php } ?>
                   </select>
                 </div>
              </div>
          	 <div class="form-group">
          	 	<button class="btn btn-default pull-right" id="pilih">Pilih</button>
          	 	<button class="btn btn-success pull-right" id="download-ketersediaan">Export</button>
          	 </div>
          	 </div>
          	 <hr>
          	 <div class="row">
          	 	<div class="col-lg-12">
          	 		<table id="export-ketersediaan-table" class="table table-striped table-bordered" width="100%">
          	 			<thead>
          	 				<th>No</th>
          	 				<th>Komoditi</th>
                    <?php foreach ($pasar as $key => $value): ?>
                      <th  ><?php echo $value->nama_pasar ?></th>
                    <?php endforeach ?>
          	 			</thead>
          	 			<tbody>
						        <?php $no=0; foreach ($komoditi as $key => $value): $no++; ?>
                      <tr >
                          <td><?php echo $no ?></td>
                          <td><?php echo $value->nama_komoditi ?></td>
                          <?php foreach ($pasar as $k => $v): ?>
                          <td ><?php echo number_format($newketersediaan[$value->nama_komoditi][$v->nama_pasar]) ?></span></td>  
                          <?php endforeach ?>
                      </tr>
                    <?php endforeach ?>
          	 			</tbody>
          	 		</table> 
          	 	</div>
          	 </div>
          </div>
    	</div>
    </div>
  </div>
</div>
<div class="modal" id="modal-webconfig" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title"><b>Setting Ketersediaan</b></h5>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-lg-4">
             <label>Minggu</label>
             <div class="form-group">
               <select class="form-control" name="minggu" id="minggu-webconfig">
                 <option disabled="" selected="">Pilih Minggu ...</option>
                 <?php for ($i=0; $i < 5; $i++) {?> 
                 <option <?php if ($webconfig[0]->minggu_ketersediaan_webconfig == $i+1): ?>
                   selected
                 <?php endif ?> value="<?php echo $i+1 ?>">Minggu ke - <?php echo $i+1 ?></option>
                 <?php } ?>
               </select>
             </div>
          </div>
          <div class="col-lg-4">

             <label>Bulan</label>
             <div class="form-group">
               <select class="form-control" name="bulan"  id="bulan-webconfig">
                 <option disabled="" selected="">Pilih Bulan ...</option>
                 <?php for ($i=0; $i < 12; $i++) {?> 
                 <option <?php if ($webconfig[0]->bulan_ketersediaan_webconfig == $i+1): ?>
                   selected
                 <?php endif ?> value="<?php echo $i+1 ?>">Bulan ke - <?php echo $i+1 ?></option>
                 <?php } ?>
               </select>
             </div>
          </div>
          <div class="col-lg-4">
             <label>Tahun</label>
             <div class="form-group">
               <select class="form-control" name="tahun"  id="tahun-webconfig">
                 <option disabled="" selected="">Pilih Tahun ...</option>
                 <?php for ($i=0; $i < 5; $i++) {?> 
                 <option <?php if ($webconfig[0]->tahun_ketersediaan_webconfig == $i+2020): ?>
                   selected
                 <?php endif ?> value="<?php echo $i+2020 ?>"><?php echo $i+2020 ?></option>
                 <?php } ?>
               </select>
             </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="simpan-webconfig">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php foreach ($perpasar as $key => $value): ?>  
<div class="modal" tabindex="-1" role="dialog" id="<?php echo str_replace(" ", "",$key) ?>">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Data <?php echo $key ?></h5>
      </div>
      <div class="modal-body">
        <table class="table table-bordered table-striped datatable">
          <thead>
            <th>No</th>
            <th>Nama Pedagang</th>
            <th>Komoditi</th>
            <th>Jumlah</th>
            <th>Action</th>
          </thead>
          <tbody>
            <?php $no=1; foreach ($value as $k => $v): $no++; ?>
              <tr>
                <td><?php echo $no ?></td>
                <td><?php echo $v->nama_pedagang ?></td>
                <td><?php echo $newkomoditi[$v->id_komoditi] ?></td>
                <td><?php echo $v->jumlah_ketersediaan ?></td>
                <td>#</td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>

