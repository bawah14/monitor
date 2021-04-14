<?php 
// var_dump($harga);
foreach ($harga as $key => $value) {
	# code...
	$avg[$value[0]->nama_komoditi] = 0;
	$count = 0;
	// print_r($value);
	// echo "<hr>";

	foreach ($value as $k => $v) {
		# code...
		$newdata[$v->nama_komoditi][$v->nama_pasar] = $v->harga_harga;
		$avg[$v->nama_komoditi] += $v->harga_harga;
		$count ++ ;
	}
	$avg[$value[0]->nama_komoditi] = $avg[$value[0]->nama_komoditi]/$count;
}
foreach ($harga as $key => $value) {
	# code...
	$dev[$value[0]->nama_komoditi] = 0;
	$temp = 0;
	$count=0;
	foreach ($value as $k => $v) {
		# code...
		$temp += abs($avg[$v->nama_komoditi] - $v->harga_harga);
		$count ++ ;
	}

	$dev[$value[0]->nama_komoditi] = $temp/$count;
}
 ?>
<div class="right_col" role="main">
  <div class="">
  	<div class="x_content">
  		<div class="row">
  			<div class="col-lg-12">
		  		<div class="x_panel">
  					<div class="x_tittle">
						<div class="row">
							<div class="col-lg-8">
								<h2>Daftar Harga Tanggal <?php echo isset($date)?$date:date('Y-m-d'); ?></h2>
								<!-- <a href="<?php echo base_url('index.php/router/handlerexporttable') ?>">Export</a> -->
							</div>
							<div class="col-lg-4">
								<button data-toggle="modal" data-target="#modal-setting-harga" class="btn btn-default pull-right">Setting</button>
								<button data-toggle="modal" data-target="#modal-export-perkomoditi-perbulan" class="btn btn-default pull-right">Export per komoditi</button>
							</div>
						</div>
						<div class="row">
				            <?php echo form_open(base_url('index.php/router/validasi_harga_new'),array('name'=>'inputharga', 'method'=>'POST')); ?>
							<?php //echo form_open() ?>
					    	<div class="col-lg-4"> 
					    		<div class="form-group">
					    			<input type="text" id="date" class="form-control" name="date" value="<?php echo isset($date)?$date:date('Y-m-d'); ?>">
					    		</div>
					    	</div>
					    	<div class="col-lg-2">
					    		<!-- <div class="form-group"> -->
					    			<button class="btn btn-default">Pilih</button>
					    		<!-- </div> -->
					    	</div>
					    	<?php echo form_close() ?>
					    	<div class="col-lg-1">
					    		<!-- <div class="form-group"> -->
					    			<a href="#<?php //echo base_url('index.php/router/handlervalidasi/harga') ?>">
						    			<button class="btn btn-info" id="harga-valid">Validasi</button>
					    			</a>
					    		<!-- </div> -->
					    	</div>
					    	<div class="col-lg-1">
					    		<button class="btn btn-success" id="export-xls">export</button>
					    	</div>
					    	<div class="col-lg-1">
					    		<button class="btn btn-success" id="export-laporan">Unduh Laporan Harian</button>
					    	</div>
					    </div>
						<div class="clear-fix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<?php // print_r($newdata) ?>
							<table id="dt-responsive" class="table table-striped table-bordered dataTable " style="width:100%" >
								<thead>
									<th>No</th>
									<th>Komoditi</th>
									<th>Satuan</th>
									<?php foreach ($allpasar->result() as $key => $value): ?>
									<th>
									<?php echo ($value->nama_pasar) ?>
									</th>
									<?php endforeach ?>
								</thead>
								<tbody>
								<?php $no=0; foreach  ($allkomoditi->result() as $key => $value): $no++; ?>
								<tr>
									<td><?php echo $no; ?></td>
									<td><?php echo $value->nama_komoditi; ?></td>
									<td><?php echo $value->keterangan_komoditi; ?></td>
									<?php foreach ($allpasar->result() as $k => $v): ?>
										<?php 
											$style = "";
											if (isset($newdata[$value->nama_komoditi][$v->nama_pasar])) {
												# code...
												// $style = 'style="background-color : red"';
												$atas = $avg[$value->nama_komoditi] + $dev[$value->nama_komoditi];
												$bawah = $avg[$value->nama_komoditi] - $dev[$value->nama_komoditi];   
												if ($newdata[$value->nama_komoditi][$v->nama_pasar] < $atas && $newdata[$value->nama_komoditi][$v->nama_pasar] > $bawah ) {
														$style="";
													}	
											}
										 ?>
										<td data-toggle="tooltip" title="<?php echo($value->nama_komoditi)?>" <?php echo $style ?> >
										<?php if (isset($newdata[$value->nama_komoditi][$v->nama_pasar])): ?>
										<?php echo number_format($newdata[$value->nama_komoditi][$v->nama_pasar])  ?>
										<?php else: ?>
										<?php echo "-" ?>
										<?php endif ?>	
										</td>
									<?php endforeach ?>
								</tr>
								<?php endforeach ?>
								</tbody>
							</table>
							<!-- <?php print_r($query) ?> -->
				    	</div>
					</div>
		  		</div>
  			</div>
  		</div>
  			
  		
  	</div>
    
  </div>
</div>

<div class="modal" id="modal-setting-harga" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Setting harga </h5>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-lg-12">
		      	<div class="form-group">
		      		<label>Tanggal Harga Web</label>
			      	<input type="date" class="form-control" id="tanggal_harga_websetting">
		      	</div>	
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="simpan-tanggal-harga">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" id="modal-export-perkomoditi-perbulan" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Export data harga perkomoditi</h5>
      </div>
      <div class="modal-body">
      	<?php echo form_open(base_url('index.php/router/handlerlaporanhargaperkomoditi'),array('name'=>'laporan_ketersetdiaan', 'method'=>'POST')); ?>
      	<div class="row">
      		<div class="col-lg-6">
		      	<div class="form-group">
		      		<label>Komoditi</label>
		      		<select class="form-control" name="komoditi">
		      			<?php foreach ($allkomoditi->result() as $key => $value): ?>
		      				<option value="<?php echo $value->id_komoditi ?>"><?php echo $value->nama_komoditi ?></option>
		      			<?php endforeach ?>
		      		</select>
		      	</div>	
      		</div>
      		<div class="col-lg-3">
		      	<div class="form-group">
		      		<label>Bulan</label>
		      		<select class="form-control" name="bulan">
		      			
		      		<?php for ($i=0; $i < 12; $i++) { 
		      			# code...
		      			echo "<option>".($i+1)."</option>";
		      		} ?>
		      		</select>
		      	</div>	
      		</div>
      		<div class="col-lg-3">
		      	<div class="form-group">
		      		<label>Tahun</label>
		      		<select class="form-control" name="tahun">
		      			
		      		<?php for ($i=0; $i < 5; $i++) { 
		      			# code...
		      			echo "<option>".($i+2020)."</option>";
		      		} ?>
		      		</select>
		      	</div>	
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" id="simpan-tanggal-harga">Pilih</button>
        <?php echo form_close() ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>