<footer class="page-footer">
	<div class="font-13">2023 © <b>Perpustakaan</b> </div>
	<div class="to-top"><i class="fa fa-angle-double-up"></i></div>
</footer>
</div>
</div>

<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
	<div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- CORE PLUGINS-->
<script src="<?= base_url('backend/dist') ?>/assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script>
<script src="<?= base_url('backend/dist') ?>/assets/vendors/popper.js/dist/umd/popper.min.js" type="text/javascript"></script>
<script src="<?= base_url('backend/dist') ?>/assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= base_url('backend/dist') ?>/assets/vendors/metisMenu/dist/metisMenu.min.js" type="text/javascript"></script>
<script src="<?= base_url('backend/dist') ?>/assets/vendors/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL PLUGINS-->
<script src="<?= base_url('backend/dist') ?>/assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
<script src="<?= base_url('backend/dist') ?>/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
<script src="<?= base_url('backend/dist') ?>/assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
<script src="<?= base_url('backend/dist') ?>/assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script>
<script src="<?= base_url('backend/dist') ?>/assets/vendors/DataTables/datatables.min.js" type="text/javascript"></script>
<!-- CORE SCRIPTS-->
<script src="<?= base_url('backend/dist') ?>/assets/js/app.min.js" type="text/javascript"></script>
<!-- PAGE LEVEL SCRIPTS-->
<script src="<?= base_url('backend/dist') ?>/assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function() {
		$('#example-table').DataTable({
			pageLength: 10,
			//"ajax": './assets/demo/data/table_data.json',
			/*"columns": [
			    { "data": "name" },
			    { "data": "office" },
			    { "data": "extn" },
			    { "data": "start_date" },
			    { "data": "salary" }
			]*/
		});
	})
</script>
</body>

</html>