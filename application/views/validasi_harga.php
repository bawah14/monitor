<?php //var_dump($query) ?>
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
						</div>
						<div class="row">
				            <?php echo form_open(base_url('index.php/router/validasi_harga'),array('name'=>'inputharga', 'method'=>'POST')); ?>
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
				    		<!-- <div class="col-sm-12"> -->
						    	<table id="dt-responsive" class="table table-striped table-bordered dataTable " style="width:100%" >
						    		<thead>
						    			<?php $no=1; ?>
						    			<th>No</th>
						    			<th >Deskripsi<i style="color: white">aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa</i></th>
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
						    					<td data-toggle="tooltip" title="<?php echo($value->nama_komoditi) ?>" >
							    					<?php echo $harga[$val->id_pasar][$value->id_komoditi] == 0 ? '-':number_format($harga[$val->id_pasar][$value->id_komoditi]); ?>
						    					</td>
						    				<?php endforeach ?>
						    			</tr>
						    			<?php endforeach ?>
						    		</tbody>
						    		<tfoot>
						    			
						    			<th>No</th>
						    			<th >Deskripsi</th>
						    			<th>Satuan</th>
						    			<?php foreach ($allpasar->result() as $value): ?>
						    				<th ><?php echo $value->nama_pasar ?></th>
						    			<?php endforeach ?>
						    		</tfoot>
						    	</table>
				    		<!-- </div> -->
				    	</div>
					</div>
		  		</div>
  			</div>
  		</div>
  			
  		
  	</div>
    
  </div>
</div>