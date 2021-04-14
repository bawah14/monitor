<div class="right_col" role="main">
  <div class="">
    <div class="row">
    	<div class="x_panel">
          <div class="x_title">
            <h2>Input Data <?php echo urldecode($nama_komoditi) ?></h2><br>
            <?php if ($this->session->userdata('id_pasar')!=0): ?>
            <h2><?php echo date("d-m-Y"); ?></h2>
            <?php endif ?>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php echo form_open(base_url('index.php/router/handlerinputketersediaan'),array('name'=>'inputharga', 'method'=>'POST')); ?>
            <div class="row">
              <div class="col-lg-12">

                <input type="hiden" name="minggu" value="<?php echo $webconfig[0]->minggu_ketersediaan_webconfig ?>" hidden>
                
                <input type="hiden" name="bulan" value="<?php echo $webconfig[0]->bulan_ketersediaan_webconfig ?>" hidden >
                <input type="hiden" name="tahun" value="<?php echo $webconfig[0]->tahun_ketersediaan_webconfig ?>" hidden>
                <div class="form-group" id="form-group-<?php echo $value->id_komoditi ?>">
                <?php for ($i=0; $i < $jumlah_pedagang ; $i++) { ?>  
                <h3>Pedagang <?php echo $i+1 ?></h3>
                <div class="row">
                  <div class="col-xs-6">
                      <label>Jumlah</label>
                    <div class="input-group">
                      <input required type="number" step="1" name="kd-<?php echo $id_komoditi ?>[]" class="form-control input" >
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-default">Kg</button>
                      </span>
                    </div>
                  </div>
                  <div class="col-xs-6">
                    <!-- <label>Jumlah</label> -->
                      <label>Nama Pedagang</label>
                    <div class="input-group">
                      <input required type="text" name="nama-<?php echo $id_komoditi ?>[]" class="form-control input">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-default"><i class="fa fa-user "></i></button>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <div class="form-group"><label>Asal Ketersediaan</label>
                      <textarea required class="form-control" name="asal-<?php echo $id_komoditi ?>[]"></textarea>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
              </div>
            </div>
            <div class="row">
              <div class="col-xs-12">
                
                <button type="submit" class="btn btn-blue pull-right">Input</button>
              </div>
            </div>
            <?php echo form_close(); ?>
          </div>
      </div>
    </div>
  </div>
</div>