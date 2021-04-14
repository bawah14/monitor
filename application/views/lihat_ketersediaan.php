<?php 
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
          	 	<button class="btn btn-default pull-right" id="pilih-laporan-lihat">Pilih</button>
              <!-- 
          	 	<button class="btn btn-success pull-right" id="download-ketersediaan">Export</button>
              <button class="btn btn-success pull-right" id="download-ketersediaan-bulanan">Export bulan</button>
               -->
          	 </div>
          	 </div>
          	 <hr>
          	 <div class="row" style="overflow-x:auto;">
          	 	<div class="col-lg-12" >
          	 		<table  class="table table-bordered table-stripped"  >
          	 			<thead>
          	 				<th >No</th>
          	 				<th >Komoditi</th>
                    <th>Satuan</th>
                    <th>Total</th>
          	 			</thead>
          	 			<tbody >
						<?php if (isset($perminggu) && $perminggu!=null): ?>
	
          	 				<?php $no=0; foreach ($perminggu as $key => $value): $no++; ?>
          	 					<tr>
          	 						<td style="text-align: center"><?php echo $no ?></td>
          	 						<td><?php echo $key?></td>
          	 						<!-- <td><?php echo number_format($value[0]->total,2,",",".")?> Kg</td> -->
                        <td>Kg</td>
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
