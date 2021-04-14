<?php //var_dump($user) ?>
<?php foreach ($pasar->result() as  $value) {
	# code...
	$psr[$value->id_pasar] = $value->nama_pasar;
} ?>
<div class="right_col" role="main">
	<div class="">
		<div class="x_content">
			<div class="row">
				<div class="col-lg-12">
					<div class="x_panel">
						<div class="x_tittle">
							<div class="row">
								<div class="col-lg-8">
									<h2>Daftar User</h2>
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
					    			<th>Nama | email</th>
					    			<th>Pasar</th>
					    			<th>Role</th>
					    			<th>Action</th>
					    		</thead>
					    		<tbody>
					    			<?php $no = 1;?>
					    			<?php foreach ($user->result() as $value): ?>
					    			<tr>
					    				<td><?php echo $no;$no++; ?></td>
					    				<td><?php echo $value->nama_user." | ".$value->email_user  ?></td>
					    				<td><?php echo $value->id_pasar == 0 ? "kosong" :$psr[$value->id_pasar]; ?></td>
					    				<td><?php echo $value->role_user; ?></td>
					    				<td>Edit | <a href="<?php echo(base_url('index.php/router/handlerdelete/user/'.$value->id_user)) ?>" onclick="return confirm('Yakin hapus ?');">Delete</a></td>
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
            <?php echo form_open(base_url('index.php/router/handlerinputuser'),array('name'=>'inputuser', 'method'=>'POST')); ?>
            <div class="form-group">
            	<label>Nama</label>
            	<input type="text" class="form-control" name="nama_user">
            </div>
            <div class="form-group">
            	<label>Email</label>

            	<input type="text" class="form-control" name="email_user">
            </div>
            <div class="form-group">
            	<label>Password</label>

            	<input type="password" class="form-control" name="password_user">
            </div>
            <div class="form-group">
            	<label>Role</label>

            	<select name="role_user" class="form-control" required="">
            		<option value="">Pilih</option>
            		<option value="lapangan">Lapangan</option>
            		<option value="otoriter1">Validator 1</option>
            		<option value="otoriter2">Validator 2</option>
            		<option value="otoriter3">Validator 3</option>
            		<!-- <option value="admin">Admin</option> -->
            	</select>

            	<!-- <input type="text" class="form-control" name="nama_user"> -->
            </div>
            <div class="form-group">
            	<label>Pasar</label>
            	<select name="pasar_user" class="form-control" required="">
            		<option value="">Pilih...</option>
            		<?php foreach ($pasar->result() as  $value): ?>
            			
            		<option value="<?php echo $value->id_pasar ?>"><?php echo $value->nama_pasar ?></option>
            		<!-- <option value="otoriter1">Validator 1</option> -->
            		<!-- <option value="otoriter2">Validator 2</option> -->
            		<!-- <option value="otoriter3">Validator 3</option> -->
            		<?php endforeach ?>
            		<!-- <option value="admin">Admin</option> -->
            	</select>
            	
            	<!-- <input type="text" class="form-control" name="nama_user"> -->
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
            <?php echo form_close() ?>
        </div>

      </div>
    </div>
  </div>