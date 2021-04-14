<?php //var_dump($user) ?>
<div class="right_col" role="main">
	<div class="">
		<div class="x_content">
			<div class="row">
				<div class="col-lg-12">
					<div class="x_panel">
						<div class="x_tittle">
							<div class="row">
								<div class="col-lg-8">
									<h2>Daftar Pasar</h2>
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
					    			<?php foreach ($pasar->result() as $value): ?>
					    			<tr>
					    				<td><?php echo $no;$no++; ?></td>
					    				<td><?php echo $value->nama_pasar ?></td>
					    				<td>Edit | <a href="<?php echo(base_url('index.php/router/handlerdelete/pasar/'.$value->id_pasar)) ?>" onclick="return confirm('Yakin hapus ?');" >Delete</a></td>
					    			</tr>
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
          <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
        </div>
        <div class="modal-body">
            <?php echo form_open(base_url('index.php/router/handlerinputpasar'),array('name'=>'inputpasar', 'method'=>'POST')); ?>
            <div class="form-group">
            	<label>Nama</label>
            	<input type="text" class="form-control" name="nama_pasar">
            </div>
            <div class="form-group">
            	<label>Keterangan</label>
            	<input type="text" class="form-control" name="keterangan_pasar">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
            <?php echo form_close() ?>
        </div>

      </div>
    </div>
  </div>