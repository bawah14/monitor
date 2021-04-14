<div class="right_col" role="main">
  <div class="">
    <div class="row">
    	<div class="x_panel">
          <div class="x_title">
            <h2>Input Data OD </h2><br>
            <?php if ($this->session->userdata('id_pasar')!=0): ?>
            <h2><?php echo date("d-m-Y"); ?></h2>
            <?php endif ?>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php echo form_open(base_url('index.php/router/handlerinputketersediaan'),array('name'=>'inputharga', 'method'=>'POST')); ?>
            <?php if ($this->session->userdata('id_pasar')==0): ?>
            <label>Pasar</label>
            <div class="form-group" >
              <select class="form-control" name="pasar">
                <option disabled="" selected="">Pilih Pasar ...</option>
                <?php foreach ($pasar as $key => $value): ?>
                  <option value="<?php echo $value->id_pasar ?>"><?php echo $value->nama_pasar ?></option>
                <?php endforeach ?>
              </select>
            </div>
            <label>Tanggal</label>
            <div class="form-group" >
              <input type="text" id="date-manual" class="form-control datepicker"  name="tanggal" required="">
            </div>
            <?php endif ?>

            <script type="text/javascript">
              var form = new Object();
            </script>
            <?php foreach ($komoditi as $key => $value): ?>
              <script type="text/javascript">
                form["<?php echo($value->id_komoditi) ?>"] = '<div class="row"><div class="col-xs-8"><div class="input-group"><input type="number" name="kd-<?php echo $value->id_komoditi ?>[]" class="form-control input input-hg"><span class="input-group-btn"><button type="button" class="btn btn-default"><?php echo $value->keterangan_komoditi ?></button></span></div></div><div class="col-xs-4"><div class="input-group"><input type="text" name="jlmh-<?php echo $value->id_komoditi ?>[]" class="form-control input input-hg"><span class="input-group-btn"><button type="button" class="btn btn-default"><i class="fa fa-user "></i></button></span></div></div></div><div class="row"><div class="col-xs-12"><div class="form-group"><textarea class="form-control" name="pj-<?php echo $value->id_komoditi ?>[]"></textarea></div></div></div>';
              </script> 
              <label><?php echo $value->nama_komoditi ?></label>
              <br>
              <a href="#" id="<?php echo $value->id_komoditi ?>" class="btn_tambah">+Tambah</a>
              <div class="form-group" id="form-group-<?php echo $value->id_komoditi ?>">
                <div class="row">
                  <div class="col-xs-8">
                    <div class="input-group">
                      <input type="number" step="0.01" name="kd-<?php echo $value->id_komoditi ?>[]" class="form-control input input-hg">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-default"><?php echo $value->keterangan_komoditi ?></button>
                      </span>
                    </div>
                  </div>
                  <div class="col-xs-4">
                    <!-- <label>Jumlah</label> -->
                    <div class="input-group">
                      <input type="number" name="jlmh-<?php echo $value->id_komoditi ?>[]" class="form-control input input-hg">
                      <span class="input-group-btn">
                          <button type="button" class="btn btn-default"><i class="fa fa-user "></i></button>
                      </span>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
            <button type="submit" class="btn btn-default pull-right">Kirim</button>
          <?php echo form_close(); ?>
          </div>
        </div>
    </div>
  </div>
</div>