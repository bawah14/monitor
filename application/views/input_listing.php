<?php 
$bulan = ["januari","februari","maret","april","mei","juni","juli","agustus","september","oktober","november","desember"];
$tahun =  date("Y");
$bln = (int)date("m");
?>


<div class="right_col" role="main">
  <div class="">
	<div class="row">
    	<div class="x_panel">
          <div class="x_title">
          	<h2>
	          	Input Data Listing
          	</h2><br>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php echo form_open(base_url('index.php/router/handlerinputlisting'),array('name'=>'inputlisting', 'method'=>'POST')); ?>
            <div class="row">
            	<div class="col-lg-2">
            		<label>Minggu Ke-</label>
            		<div class="form-group">
            			<select class="form-control" name="minggu_listing">
            				<?php for ($i=1; $i <=5; $i++) { ?>
            				<option value="minggu ke-<?php echo($i) ?>"><?php echo $i ?></option>	
            				<?php } ?>
            			</select>
            		</div>
            	</div>
            	<div class="col-lg-2">
            		<label>Bulan</label>
            		<div class="form-group">
            			<select class="form-control" name="bulan_listing">
            				<?php for ($i=0; $i < 12; $i++) { ?>
            				<option value="<?php echo($bulan[$i]) ?>" <?php if (($i+1)==$bln): ?>
            					selected
            				<?php endif ?>><?php echo $bulan[$i] ?></option>	
            				<?php } ?>
            			</select>
            		</div>
            	</div>
            	<div class="col-lg-2">
            		<label>Tahun</label>
            		<div class="form-group">
            			<select class="form-control" name="tahun_listing">
            				<?php for ($i=$tahun-2; $i <= ($tahun+2); $i++) { ?>
            				<option value="<?php echo($i) ?>" <?php if ($i==$tahun): ?>
            					selected
            				<?php endif ?>><?php echo $i ?></option>	
            				<?php } ?>
            			</select>
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-xs-12 col-lg-12">
            		<label>Nama Toko</label>
            		<div class="form-group">
            			<input type="text" name="nama_toko_listing" class="form-control" required="">
            		</div>
            		<label>Alamat Toko</label>
            		<div class="form-group">
            			<input type="text" name="alamat_toko_listing" class="form-control" required="">
            		</div>
            		<label>Jenis Beras</label>
            		<div class="form-group">
            			<input type="text" name="jenis_listing" class="form-control" required="">
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-lg-6">
            		<label>Total Pembelian Toko (Ton)</label>
            		<div class="form-group">
            			<input type="number" step="0.1" name="pembelian_listing" class="form-control" required="">
            		</div>
            	</div>
            	<div class="col-lg-6">
            		<label>Total Penjualan Toko (Ton)</label>
            		<div class="form-group">
            			<input type="number" step="0.1" name="penjualan_listing" class="form-control" required="">
            		</div>
            	</div>
            </div>
            <div class="row">
            	<div class="col-lg-6">
            		<label>Harga Terendah (Kg)</label>
            		<div class="form-group">
            			<input type="number" step="100" name="harga_terendah_listing" class="form-control" required="">
            		</div>
            	</div>
            	<div class="col-lg-6">
            		<label>Harga Tertinggi (Kg)</label>
            		<div class="form-group">
            			<input type="number" step="100" name="harga_tertinggi_listing" class="form-control" required="">
            		</div>
            	</div>
            	<br>
        		<div class="pull-right">
        			<input type="submit" name="submit" value="kirim" class="btn btn-default">
        		</div>
            </div>
            <?php echo form_close() ?>
          </div>
          <div class="x_title">
          	<h2>
          		Kelola Data Listing
          	</h2>
          	<div class="clearfix"></div>
          </div>
          <div class="x_content">
          	<div class="row">
          		<div class="col-lg-12">
		          	<table id="dt-responsive" class="table table-striped table-bordered dataTable table-responsive" width="100%">
		          		<thead>
		          			<th>No</th>
		          			<th>Tanggal</th>
		          			<th>Minggu ke</th>
		          			<th>Nama Toko</th>
		          			<th>Pembelian</th>
		          			<th>Penjualan</th>
		          			<th>Harga Terendah</th>
		          			<th>Harga Tertinggi</th>
		          			<th>Action</th>
		          		</thead>
		          		<tbody>
		          			<?php $no=0; foreach ($listing->result_array() as $value): $no++;?>
		          				<tr>
		          					<td><?php echo $no ?></td>
		          					<td><?php echo $value['bulan_listing']." ".$value['tahun_listing'] ?></td>
		          					<td><?php echo $value['minggu_listing'] ?></td>
		          					<td><?php echo $value['nama_toko_listing'] ?></td>
		          					<td><?php echo $value['pembelian_listing'] ?></td>
		          					<td><?php echo $value['penjualan_listing'] ?></td>
		          					<td><?php echo $value['harga_terendah_listing'] ?></td>
		          					<td><?php echo $value['harga_tertinggi_listing'] ?></td>
		          					<td><a onclick="return confirm('yakin hapus data ?')" href="<?php echo base_url('index.php/router/hapus_listing/'.$value['id_listing']) ?>">Hapus</a> | <a href="#" data-toggle="modal" data-target="#myModal<?php echo $value['id_listing'] ?>" >edit</a></td>
		          				</tr>

								<!-- Modal -->
								<div id="myModal<?php echo $value['id_listing'] ?>" class="modal fade" role="dialog">
								  <div class="modal-dialog">

								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title">Data <?php echo $value['nama_toko_listing'] ?></h4>
								      </div>
								      <div class="modal-body">
								        <div class="row">
								        	<?php echo form_open(base_url('index.php/router/handlereditlisting'),array('name'=>'editlisting', 'method'=>'POST')) ?>
								        	<input type="hidden" name="id" value="<?php echo $value['id_listing'] ?>">
								        	<div class="row">
								            	<div class="col-lg-4">
								            		<label>Minggu Ke-</label>
								            		<div class="form-group">
								            			<select class="form-control" name="minggu_listing">
								            				<?php for ($i=1; $i <=5; $i++) { ?>
								            				<option value="minggu ke-<?php echo($i) ?>" <?php if ($value['minggu_listing'] == "minggu ke-".$i) {
								            					echo "selected";
								            				} ?>><?php echo $i ?></option>	
								            				<?php } ?>
								            			</select>
								            		</div>
								            	</div>
								            	<div class="col-lg-4">
								            		<label>Bulan</label>
								            		<div class="form-group">
								            			<select class="form-control" name="bulan_listing">
								            				<?php for ($i=0; $i < 12; $i++) { ?>
								            				<option value="<?php echo($bulan[$i]) ?>" <?php if ($bulan[$i]==$value['bulan_listing']): ?>
								            					selected
								            				<?php endif ?>><?php echo $bulan[$i] ?></option>	
								            				<?php } ?>
								            			</select>
								            		</div>
								            	</div>
								            	<div class="col-lg-4">
								            		<label>Tahun</label>
								            		<div class="form-group">
								            			<select class="form-control" name="tahun_listing">
								            				<?php for ($i=$tahun-2; $i <= ($tahun+2); $i++) { ?>
								            				<option value="<?php echo($i) ?>" <?php if ($value['tahun_listing']==$i): ?>
								            					selected
								            				<?php endif ?>><?php echo $i ?></option>	
								            				<?php } ?>
								            			</select>
								            		</div>
								            	</div>
								            </div>
								            <div class="row">
								            	<div class="col-xs-12 col-lg-12">
								            		<label>Nama Toko</label>
								            		<div class="form-group">
								            			<input type="text" name="nama_toko_listing" class="form-control" required="" value="<?php echo $value['nama_toko_listing'] ?>">
								            		</div>
								            		<label>Alamat Toko</label>
								            		<div class="form-group">
								            			<input type="text" name="alamat_toko_listing" class="form-control" required="" value="<?php echo $value['alamat_toko_listing'] ?>">
								            		</div>
								            		<label>Jenis Beras</label>
								            		<div class="form-group">
								            			<input type="text" name="jenis_listing" class="form-control" required="" value="<?php echo $value['jenis_listing'] ?>">
								            		</div>
								            	</div>
								            </div>
								            <div class="row">
								            	<div class="col-lg-6">
								            		<label>Total Pembelian Toko (Ton)</label>
								            		<div class="form-group">
								            			<input type="number" step="0.1" name="pembelian_listing" class="form-control" required="" value="<?php echo $value['pembelian_listing'] ?>">
								            		</div>
								            	</div>
								            	<div class="col-lg-6">
								            		<label>Total Penjualan Toko (Ton)</label>
								            		<div class="form-group">
								            			<input type="number" step="0.1" name="penjualan_listing" class="form-control" required="" value="<?php echo $value['penjualan_listing'] ?>">
								            		</div>
								            	</div>
								            </div>
								            <div class="row">
								            	<div class="col-lg-6">
								            		<label>Harga Terendah (Kg)</label>
								            		<div class="form-group">
								            			<input type="number" step="100" name="harga_terendah_listing" class="form-control" required="" value="<?php echo $value['harga_terendah_listing'] ?>">
								            		</div>
								            	</div>
								            	<div class="col-lg-6">
								            		<label>Harga Tertinggi (Kg)</label>
								            		<div class="form-group">
								            			<input type="number" step="100" name="harga_tertinggi_listing" class="form-control" required="" value="<?php echo $value['harga_tertinggi_listing'] ?>">
								            		</div>
								            	</div>
								            	<br>
								            </div>
								        </div>
								      </div>
								      <div class="modal-footer">

								        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								        <button type="submit" class="btn btn-info"  >Kirim</button>
								        <?php echo form_close() ?>
								      </div>
								    </div>

								  </div>
								</div>
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

