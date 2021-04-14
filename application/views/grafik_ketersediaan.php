 <?php //var_dump($komoditi) 
$txtbul = array(
  '1' => 'Januari',
  '2' => 'Februari',
  '3' => 'Maret',
  '4' => 'April',
  '5' => 'Mei',
  '6' => 'Juni',
  '7' => 'Juli',
  '8' => 'Agustus',
  '9' => 'September',
  '10' => 'Oktober',
  '11' => 'November',
  '12' => 'Desember',
   );
 ?>
<div class="right_col" role="main">
  <div class="">
    <div class="row">
    	<div class="x_panel">
          <div class="x_title">
          	<h1>Grafik Ketersediaan</h1>
          	<div class="clearfix"></div>
          </div>
          <div class="x_content">
          	<div class="row">
          		<div class="col-lg-4">
          			<label>Komoditi</label>
          			<div class="form-group">
          				<select class="form-control" name="komoditi" id="komoditi-grafik">
	          				<option disabled="" selected="">Pilih Komoditi ...</option>
	          				<?php foreach ($komoditi as $key => $value): ?>
	          				<option value="<?php echo $value->id_komoditi ?>"><?php echo $value->nama_komoditi ?></option>	
	          				<?php endforeach ?>
          				</select>
          			</div>
          		</div>
          		<div class="col-lg-4">
          			<label>Bulan</label>
          			<div class="form-group">
          				<select class="form-control" name="bulan" id="bulan-grafik" required="">
          					<option disabled="" selected="">Pilih Bulan ...</option>
          					<?php for ($i=0; $i < 12; $i++) { ?>\
          					<option value="<?php echo $i+1 ?>">Bulan Ke - <?php echo $i+1 ?></option>
          					<?php } ?>
          				</select>
          			</div>
          			<!-- <?php var_dump($pasar) ?> -->
          		</div>
          		<div class="col-lg-4">
          			<label>Tahun</label>
          			<div class="form-group">
          				<select class="form-control" name="tahun" id="tahun-grafik" required="">
          					<option disabled="" selected="">Pilih Tahun ...</option>
          					<?php for ($i=2020; $i < 2025; $i++) { ?>
          					<option value="<?php echo $i ?>"><?php echo $i ?></option>
          					<?php } ?>
          				</select>
          			</div>
          			<!-- <?php var_dump($pasar) ?> -->
          		</div>
          	</div>
          	<div class="row">
          		<div class="col-lg-12">
          			<button class="pull-right btn btn-info" id="pilih-grafik-ketersediaan">Pilih</button>
          		</div>
          	</div>
          	<div class="row">
              <div class="col-lg-12">
                <?php if (isset($_GET['txtkom'])): ?>
                  <h1 align="center"><?php echo $_GET['txtkom'] ?> (Kg) </h1>

                  <h2 align="center"><?php echo $txtbul[$_GET['bulan']] ?> / <?php echo $_GET['tahun'] ?> </h2>
                  <br>
                <?php endif ?>
            		<canvas id="chart-ketersediaan" width="100%" height="25%"></canvas>
              </div>
          	</div>
          </div> 
        </div>
    </div>
  </div>
</div>