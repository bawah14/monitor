
<?php foreach ($pasar as  $value): ?>
  <?php $psr[$value->id_pasar] = $value->nama_pasar ?>
<?php endforeach ?><div class="right_col" role="main">
  <div class="">
    <div class="row">
    	<div class="x_panel">
          <div class="x_title">
            <h2>Input Data Stok <small>Click to validate</small></h2>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">

            <!-- start form for validation -->
            <!-- <form id="demo-form" data-parsley-validate="" novalidate=""> -->
            <?php echo form_open(base_url('index.php/router/handlerinputstok'),array('name'=>'inputstok', 'method'=>'POST')); ?>
              	<label for="fullname">Pasar :</label>
              	<?php if ($this->session->userdata('id_pasar')!=0): ?>
                  <input type="text" name="pasar" value="<?php echo $this->session->userdata('id_pasar') ?>" hidden>
                  <input type="text"  class="form-control" value="<?php echo $psr[$this->session->userdata('id_pasar')] ?>" readonly>
                <?php else: ?>

              	<select id="heard-stok" name="pasar" class="form-control" required="">
                	<option disabled="" selected="">Pilih...</option>
                	<?php foreach ($pasar as $value): ?>

                    <option value="<?php echo $value->id_pasar ?>" <?php if ($this->session->userdata('id_pasar')==$value->id_pasar): ?>
                      selected
                    <?php endif ?>><?php echo $value->nama_pasar ?></option>
	                	<!-- <option value="<?php echo $value->id_pasar ?>"><?php echo $value->nama_pasar ?></option> -->
                	<?php endforeach ?>
              	</select>
                <?php endif ?><!-- 
              	<?php foreach ($komoditi as $value): ?>
	              	<label for="Stok"><?php echo $value->nama_komoditi ?> :</label>
	              	<input type="number" class="form-control input" name="kd<?php echo($value->id_komoditi) ?>" id="kd<?php echo($value->id_komoditi) ?>" data-parsley-trigger="change">
              	<?php endforeach ?> -->
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
                        
                        <label for="Stok"><?php echo $value->nama_komoditi ?> / <?php echo $value->keterangan_komoditi ?>  :</label>
                        <input type="number" class="form-control input input-stk" name="kd<?php echo($value->id_komoditi) ?>" id="kd<?php echo($value->id_komoditi) ?>" data-parsley-trigger="change">
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