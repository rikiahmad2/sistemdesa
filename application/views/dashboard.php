
<!-- Page content -->
<div id="page-content">

	<!-- First Row -->
	<div class="row">
		<!-- User Widgets -->
		<div class="col-lg-6">
			<div class="widget">
				<div class="widget-content themed-background-flat text-center">
					<h3 class="widget-heading text-light">JUMLAH WARGA<br>BERDASARKAN KLASIFIKASI</h3>
				</div>
				<div class="widget-content themed-background-muted text-center">
					<div class="btn-group">
						<a href="javascript:void(0)" class="btn btn-effect-ripple btn-default"><strong>JUMLAH TOTAL <?=$data2['jumlah']?> JIWA</strong></a>
					</div>
				</div>
				<div class="widget-content">
					<div class="row text-center">
						<?php
						foreach ($data3 as $row) {
							echo'
							<div class="col-xs-3">
							<h2><i class="fa fa-child"></i></h2><h4 class="widget-heading"><small>'.$row->nama_klasifikasi.'</small><br><a href="javascript:void(0)" class="themed-color-flat">'.$row->jumlah.'</a></h4>
							</div>';
						}
						?>
						
					</div>
				</div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="widget">
				<div class="widget-content themed-background-creme text-center">
					<h3 class="widget-heading text-light">JUMLAH WARGA<br>BERDASARKAN JENIS KELAMIN</h3>
				</div>
				<div class="widget-content themed-background-muted text-center">
					<div class="btn-group">
						<a href="javascript:void(0)" class="btn btn-effect-ripple btn-default"><strong>JUMLAH TOTAL <?=$data2['jumlah']?> JIWA</strong></a>
					</div>
				</div>
				<div class="widget-content">
					<div class="row text-center">
						<?php
						foreach ($data as $row) {

							if($row->jk == "L"){
								echo'
								<div class="col-xs-6">
								<h2><i class="fa fa-male"></i></h2><h4 class="widget-heading"><small> LAKI - LAKI</small><br><a href="javascript:void(0)" class="themed-color-flat">'.$row->jumlah.'</a></h4>
								</div>';
							}
							else{
								echo'
								<div class="col-xs-6">
									<h2><i class="fa fa-female"></i></h2><h4 class="widget-heading"><small> PEREMPUAN</small><br><a href="javascript:void(0)" class="themed-color-flat">'.$row->jumlah.'</a></h4>
								</div>';
							}
						}
						
						?>
					</div>
				</div>
			</div>
		</div>
		<!-- END User Widgets -->
	</div>

</div>
<!-- END Page Content -->
<!-- END Main Container -->
</div>
<!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

<!-- jQuery, Bootstrap, jQuery plugins and Custom JS code -->
<script src="<?=base_url('assets/');?>js/vendor/jquery-2.2.4.min.js"></script>
<script src="<?=base_url('assets/');?>js/vendor/bootstrap.min.js"></script>
<script src="<?=base_url('assets/');?>js/plugins.js"></script>
<script src="<?=base_url('assets/');?>js/app.js"></script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?=base_url('assets/');?>js/pages/uiWidgets.js"></script>
<script>$(function () { UiWidgets.init(); });</script>

<!-- Load and execute javascript code used only in this page -->
<script src="<?=base_url('assets/');?>js/pages/readyDashboard.js"></script>
<script>$(function(){ ReadyDashboard.init(); });</script>


</body>
</html>