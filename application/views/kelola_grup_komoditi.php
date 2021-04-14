<?php //var_dump($grup_komoditi->result()) ?>
<div class="right_col" role="main">
	<div class="">
		<div class="x_content">
			<div class="row">
				<div class="col-lg-12">
					<div class="x_panel">
						<div class="x_tittle">
							<div class="row">
								<div class="col-lg-8">
									<h2>Daftar Komoditi</h2>
								</div>
								<div class="col-lg-4">
									<button class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-tambah">Tambah</button>
								</div>
							</div>
							<div class="clear-fix"></div>
						</div>
						<div class="x_content">
					    	<table id="dt-responsive" class="table table-striped table-bordered dataTable table-responsive " width="100%" >
					    		<thead>
					    			<th>NO</th>
					    			<th>Nama</th>
					    			<th>Action</th>
					    		</thead>
					    		<tbody>
					    			<?php $no = 1;?>
					    			<?php foreach ($grup_komoditi->result() as $value): ?>
					    			<tr>
					    				<td><?php echo $no;$no++; ?></td>
					    				<td><?php echo $value->nama_grup_komoditi ?></td>
					    				<td> <a href="#" data-toggle="modal" data-target="#modal-edit<?php echo($value->id_grup_komoditi)?>"> Edit</a> | <a href="<?php echo(base_url('index.php/router/handlerdelete/grup_komoditi/'.$value->id_grup_komoditi)) ?>" onclick="return confirm('Yakin hapus ??');">Delete</a></td>
					    			</tr>
					    			<div class="modal fade" id="modal-edit<?php echo($value->id_grup_komoditi)?>" tabindex="-1" role="dialog" aria-hidden="true">
									    <div class="modal-dialog">
									      <div class="modal-content">

									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
									          </button>
									          <h4 class="modal-title" id="myModalLabel">Edit Grup Komoditi</h4>
									        </div>
									        <div class="modal-body">
									            <?php echo form_open(base_url('index.php/router/handlereditgrupkomoditi'),array('name'=>'inputpasar', 'method'=>'POST')); ?>
									            <input type="text" hidden="" name="id" value="<?php echo $value->id_grup_komoditi ?>">
									            <div class="form-group">
									            	<label>Nama</label>
									            	<input type="text" class="form-control" name="nama_grup_komoditi" value="<?php echo $value->nama_grup_komoditi ?>">
									            </div>
									            <div class="form-group">
									            	<label>Keterangan</label>
									            	<input type="text" class="form-control" name="keterangan_grup_komoditi" value="<?php echo $value->keterangan_grup_komoditi ?>">
									            </div>
									            <!-- <div class="form-group">
									            	<select class="form-control" name="status_komoditi">
									            		<option>Pilih</option>
									            		<option value=1>Harga</option>
									            		<option value=2>Stok</option>
									            	</select>
									            </div> -->
									        </div>
									        <div class="modal-footer">
									          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									          <button type="submit" class="btn btn-primary">Simpan</button>
									            <?php echo form_close() ?>
									        </div>

									      </div>
									    </div>
									  </div>
					    			<?php endforeach ?>
					    		</tbody>
					    		<tfoot>
					    		</tfoot>
					    	</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="modal-tambah" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Tambah Grup Komoditi</h4>
        </div>
        <div class="modal-body">
            <?php echo form_open(base_url('index.php/router/handlerinputgrupkomoditi'),array('name'=>'inputpasar', 'method'=>'POST')); ?>
            <div class="form-group">
            	<label>Nama</label>
            	<input type="text" class="form-control" name="nama_grup_komoditi">
            </div>
            <div class="form-group">
            	<label>Satuan</label>
            	<input type="text" class="form-control" name="keterangan_grup_komoditi">
            </div>
            <!-- <div class="form-group">
            	<select class="form-control" name="status_komoditi">
            		<option>Pilih</option>
            		<option value=1>Harga</option>
            		<option value=2>Stok</option>
            	</select>
            </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
            <?php echo form_close() ?>
        </div>

      </div>
    </div>
  </div>