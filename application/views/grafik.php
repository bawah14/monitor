<?php //var_dump($pasar) ?>
<div class="right_col" role="main">
	<div class="">
		<div class="x_content">
			<div class="x_panel">
				<div class="x_title">
					<h4>Grafik</h4>
				</div>
				<div class="x_content">
					<div class="row">
						<div class="col-lg-6">
							<label>Komoditi</label>
							<select class="form-control grfk" id="grafik-komoditi">
								<option value="">Pilih</option>
								<?php foreach ($komoditi as $key => $value): ?>
									<option value="" disabled=""><?php echo $key ?></option>
									<?php foreach ($value as $k => $v): ?>
										<option value="<?php echo $v->id_komoditi ?>"><pre>&nbsp <?php echo $v->nama_komoditi ?></pre></option>
									<?php endforeach ?>
								<?php endforeach ?>
							</select>
							<!-- <input type="" name=""> -->
						</div>
						<div class="col-lg-6">
							<label>Pasar</label>
							<select class="form-control grfk" id="grafik-pasar">
								<option value="">Pilih</option>
								<?php foreach ($pasar as $key => $value): ?>
									<option value="<?php echo($value->id_pasar) ?>"><?php echo $value->nama_pasar ?></option>
								<?php endforeach ?>
							</select>
							<!-- <input type="" name=""> -->
						</div>
					</div>
					<br>	
					<div class="row">
						<canvas id="mychart"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
