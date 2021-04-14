<?php //var_dump($data) ?>
<?php foreach ($pasar as  $value): ?>
  <?php $psr[$value->id_pasar] = $value->nama_pasar ?>
<?php endforeach ?>
<div class="right_col" role="main">
  <div class="">
    <div class="row">
    	<div class="x_panel">
          <div class="x_title">
            <h2>Input Manual</h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <?php echo form_open(base_url('index.php/router/handlerinputmanual'),array('name'=>'inputharga', 'method'=>'POST')); ?>
                <label>Tanggal</label>
                <!-- <div class="form-group"> -->
                <input type="text" id="date-manual" class="form-control" name="date" value="<?php echo isset($date)?$date:date('Y-m-d'); ?>">
                  <!-- </div> -->
                <label>Tipe</label>
                <select id="tipe-manual" name='tipe' class="form-control">
                  <option selected="" value="">Pilih...</option>
                  <option value="harga">Harga</option>
                  <option value="stok">Stok</option>
                </select>
              	<label for="fullname">Pasar :</label>
                <?php if ($this->session->userdata('id_pasar')!=0): ?>
                  <input type="text" name="pasar" value="<?php echo $this->session->userdata('id_pasar') ?>" hidden>
                  <input type="text"  class="form-control" value="<?php echo $psr[$this->session->userdata('id_pasar')] ?>" readonly>
                <?php else: ?>
                <select id="pasar-manual" name="pasar" class="form-control" required="" >
                  <option disabled="" value="">Pilih Pasar...</option>
                  <?php foreach ($pasar as $value): ?>
                    <option value="<?php echo $value->id_pasar ?>" <?php if ($this->session->userdata('id_pasar')==$value->id_pasar): ?>
                      selected
                    <?php endif ?>><?php echo $value->nama_pasar ?></option>
                  <?php endforeach ?>
                </select>
                <?php endif ?>
                <br>
                <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
              	<?php foreach ($komoditi as $key =>$val): ?>
                  <?php $newkey = str_replace(" ", "_", $key); ?>
                  <div class="panel">
                    <a class="panel-heading collapsed" role="tab" id="heading<?php echo($newkey) ?>" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo<?php echo($newkey) ?>" aria-expanded="false" aria-controls="collapseTwo">
                      <h4 class="panel-title"><?php echo $key ?></h4>
                      <!-- <h4 >Collapsible Group Item #2</h4> -->
                    </a>
                    <div id="collapseTwo<?php echo($newkey) ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo($newkey) ?>">
                      <div class="panel-body">
                      <?php foreach ($val as $value): ?>
                        
      	              	<label for="Harga"><?php echo $value->nama_komoditi ?> / <?php echo $value->keterangan_komoditi ?>  :</label>
      	              	<input type="text" class="form-control input input-hg" name="kd<?php echo($value->id_komoditi) ?>" id="kd<?php echo($value->id_komoditi) ?>" data-parsley-trigger="change">
                      <?php endforeach ?>
                      </div>
                    </div>
                  </div>
              	<?php endforeach ?>
                </div>
              <br>
              <button class="btn btn-info pull-right" type="submit">Kirim</button>
            <?php echo form_close(); ?>
            <!-- end form for validations -->

          </div>
        </div>
    </div>
  </div>
</div>