<?php 
// print_r($perminggu);
// print_r($perbulan);

if (isset($query)) {
     # code...
     print_r($query);
}
 ?>
<div class="right_col" role="main">
  <div class="">
    <div class="row">
    	<div class="x_panel">
          <div class="x_title">
          	<h2>Laporan Ketersediaan</h2>
            <button class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-bulanan-perpasar">Laporan per Pasar</button>
            <button class="btn btn-info pull-right" data-toggle="modal" data-target="#modal-tahunan-perpasar">Laporan per Pasar Tahunan</button>
          	<div class="clearfix"></div>
          </div>
          <div class="x_content">
          	<?php 
				// print_r($pasar);print_r($komoditi);
          	// print_r($komoditi);print_r($ketersediaan);
          	 ?>
          	 <div class="row">
                 <label>Bulan</label>
                 <div class="form-group">
                   <select class="form-control" name="bulan"  id="bulan-laporan">
                     <option disabled="" selected="">Pilih Bulan ...</option>
                     <?php for ($i=0; $i < 12; $i++) {?> 
                     <option value="<?php echo $i+1 ?>" <?php if (isset($_GET['bulan']) && $_GET['bulan'] == $i+1 ): ?>
                       selected
                     <?php endif ?>>Bulan ke - <?php echo $i+1 ?></option>
                     <?php } ?>
                   </select>
                 </div>
                 <label>Tahun</label>
                 <div class="form-group">
                   <select class="form-control" name="tahun"  id="tahun-laporan">
                     <option disabled="" selected="">Pilih Tahun ...</option>
                     <?php for ($i=0; $i < 5; $i++) {?> 
                     <option value="<?php echo $i+2020 ?>"  <?php if (isset($_GET['bulan']) && $_GET['tahun'] == $i+2020 ): ?>
                       selected
                     <?php endif ?>><?php echo $i+2020 ?></option>
                     <?php } ?>
                   </select>
                 </div>
          	 <div class="form-group">
          	 	<button class="btn btn-default pull-right" id="pilih-laporan">Pilih</button>
          	 	<button class="btn btn-success pull-right" id="download-ketersediaan">Export</button>
              <button class="btn btn-success pull-right" id="download-ketersediaan-bulanan">Export bulan</button>
          	 </div>
          	 </div>
          	 <hr>
          	 <div class="row">
          	 	<div class="col-lg-12">
          	 		<table id="export-ketersediaan-table" class="table table-striped table-bordered  table-responsive " width="100%" >
          	 			<thead style="font-size: 32px ">
          	 				<th >No</th>
          	 				<th >Komoditi</th>
          	 				<th>Minggu 1</th>
                    <th>Minggu 2</th>
                    <th>Minggu 3</th>
                    <th>Minggu 4</th>
                    <th>Minggu 5</th>
                    <th>Total</th>
          	 			</thead>
          	 			<tbody style="font-size: 28px ">
						<?php if (isset($perminggu) && $perminggu!=null): ?>
	
          	 				<?php $no=0; foreach ($perminggu as $key => $value): $no++; ?>
          	 					<tr>
          	 						<td style="text-align: center"><?php echo $no ?></td>
          	 						<td><?php echo $key?></td>
          	 						<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
                        <td style="text-align: left"><?php echo number_format($value[1][0]->total,2,",",".") ?></td>
                        <td style="text-align: left"><?php echo number_format($value[2][0]->total,2,",",".") ?></td>
                        <td style="text-align: left"><?php echo number_format($value[3][0]->total,2,",",".") ?></td>
                        <td style="text-align: left"><?php echo number_format($value[4][0]->total,2,",",".") ?></td>
                        <td style="text-align: left"><?php echo number_format($value[5][0]->total,2,",",".") ?></td>
                        <td style="text-align: left"><?php echo number_format($perbulan[$key][0]->total,2,",",".") ?></td>
          	 					</tr>
          	 				<?php endforeach ?>
						<?php  endif ?>
          	 			</tbody>
          	 		</table> 
          	 	</div>
          	 </div>
          </div>
    	</div>
    </div>
  </div>
</div>
<div class="modal" id="modal-bulanan-perpasar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Pilih Tanggal</h5>
      </div>
      <div class="modal-body">
        <!-- <p></p> -->
        <div class="row">
          <div class="col-lg-6">
          <?php echo form_open(base_url('index.php/router/handlerlaporanperpasar'),array('name'=>'laporan_ketersetdiaan', 'method'=>'POST')); ?>
            <div class="form-group" > 
              <label>Bulan</label>
              <select class="form-control" name="bulan" placeholder="Pilih bulan" >
                <?php for ($i=0; $i < 12; $i++) { 
                  echo "<option>".($i+1)."</option>";
                } ?>
              </select>
            </div>
          </div>
          <div class="col-lg-6">  
            <div class="form-group" > 
              <label>Tahun</label>
              <select class="form-control" name="tahun" placeholder="Pilih bulan" >
                <?php for ($i=0; $i < 5; $i++) { 
                  echo "<option>".($i+2020)."</option>";
                } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Pilih</button>
        <?php echo form_close() ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="modal-tahunan-perpasar" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="modal-title">Pilih Tanggal</h5>
      </div>          
      <div class="modal-body">
        <!-- <p></p> -->
        <div class="row">
          <?php echo form_open(base_url('index.php/router/handlerlaporanperpasartahunan'),array('name'=>'laporan_ketersetdiaan', 'method'=>'POST')); ?>
          <div class="col-lg-12">  
            <div class="form-group" > 
              <label>Tahun</label>
              <select class="form-control" name="tahun" placeholder="Pilih bulan" >
                <?php for ($i=0; $i < 5; $i++) { 
                  echo "<option>".($i+2020)."</option>";
                } ?>
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Pilih</button>
        <?php echo form_close() ?>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>