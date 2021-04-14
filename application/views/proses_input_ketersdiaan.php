<div class="right_col" role="main">
  <div class="">
    <div class="row">
    	<div class="x_panel">
          <div class="x_title">
            <h2>Data Ketersediaan Minggu Ini</h2><br>
            <?php if ($this->session->userdata('id_pasar')!=0): ?>
            <h2><?php echo date("d-m-Y"); ?></h2>
            <?php endif ?>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
              <div class="col-lg-12">
                <?php print_r($nama_komoditi) ?>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div>