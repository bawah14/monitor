<?php  $no=0; foreach ($ketersediaan as $key => $value): $no++;  ?>
  <?php $jumlah[$key] = 0 ?>
  <div id="modal-view<?php echo($no) ?>" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Data <?php echo $key ?></h4>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-bordered" style="width: 100%">
            <thead>
              <th>Pedagang</th>
              <th>Asal</th>
              <th>Jumlah (Kg)</th>
              <th>Act</th>
            </thead>
            <tbody>
            <?php  foreach ($value as $k => $v): ?>
              <tr>
                <td><?php echo $v->nama_pedagang; ?></td>
                <td><?php echo $v->asal_ketersediaan ?></td>
                <td><?php echo number_format($v->jumlah_ketersediaan) ?></td>
                <td><a href= "<?php echo base_url('index.php/router/hapus_ketersediaan/'.$v->id_ketersediaan) ?>";>Hapus</a></td>
              </tr>
              <?php $jumlah[$key] += $v->jumlah_ketersediaan ; ?>
            <?php endforeach ?>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
          <!-- <button type="button" class="btn btn-success" >Lanjut</button> -->
        </div>
      </div>

    </div>
  </div>
<?php endforeach ?>
<div class="right_col" role="main">
  <div class="">
    <div class="row">
    	<div class="x_panel">
          <div class="x_title">
            <h2>Data Ketersediaan Minggu Ini</h2><br>
            <?php if ($this->session->userdata('id_pasar')!=0): ?>
            <h2><?php echo date("d-m-Y"); ?></h2>
            <?php endif ?>
            <button class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-tambah-ketersediaan">Input</button>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php //print_r($ketersediaan) ?>
            <div class="row">
              <div class="col-lg-12">
              <table class="table table-striped table-bordered" style="width: 100%">
                <thead>
                  <th>No</th>
                  <th style="width: 100%">Komoditi</th>
                  <th>Total (Kg)</th>
                  <th>Action</th>
                </thead>
                <tbody>
                <?php  $no=0; foreach ($ketersediaan as $key => $value):$no++;  ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $key ?></td>
                    <td><?php echo number_format($jumlah[$key]) ?></td>
                    <td><button data-toggle="modal" data-target="#modal-view<?php echo($no) ?>" class="btn btn-default"><i class="fa fa-eye" aria-hidden="true"></i></button></td>
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
<div id="modal-tambah-ketersediaan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Input Ketersediaan</h4>
      </div>
      <div class="modal-body">
        <?php // print_r($komoditi) ?>
        <div class="form-group">
          <label>Pilih Komoditi</label>
          <select class="form-control" required="" id="komoditi">
            <option disabled="" selected="" value="" >Pilih Komoditi</option>
            <?php foreach ($komoditi as $key => $value): ?>
              <option value="<?php echo $value->id_komoditi?>"><?php echo $value->nama_komoditi ?></option>
            <?php endforeach ?>
          </select>
        </div>
        <div class="form-group">
          <label>Jumlah Pedagang</label>
          <input type="number" id="jumlah" class="form-control" min="1" value="0" step="1" required="">
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-success" id="input-ketersediaan" >Lanjut</button>
      </div>
    </div>

  </div>
</div>