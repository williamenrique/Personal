	</div>
	<!-- content-wrapper ends -->
	<footer class="footer">
		<div class="container-fluid clearfix">
			<span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a
					href="#">Workinfo</a>.
				All rights reserved.</span>
			<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted &amp; made with <i
					class="far fa-heart text-danger"></i></span>
		</div>
	</footer>
	<!-- partial -->
	</div>
	<!-- main-panel ends -->
	</div>
	<!-- page-body-wrapper ends -->
	</div>
	<!-- container-scroller -->
	<!-- move top -->
	<!-- <button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
		<span class="fa fa-angle-up"></span>
	</button> -->
	<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {
	scrollFunction()
};

function scrollFunction() {
	if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
		document.getElementById("movetop").style.display = "block";
	} else {
		document.getElementById("movetop").style.display = "none";
	}
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
	document.body.scrollTop = 0;
	document.documentElement.scrollTop = 0;
}
	</script>
	<!-- /move top -->


	<script src="<?= PLUGINS?>jquery/jquery-3.3.1.min.js"></script>
	<!-- <script src="<?= PLUGINS?>jquery/jquery-1.10.2.min.js"></script> -->

	<!-- loading-gif Js -->
	<!-- <script src="<?= PLUGINS?>modernizr/modernizr.js"></script> -->
	<script>
// $(window).load(function() {
// 	// Animate loader off screen
// 	$(".se-pre-con").fadeOut("slow");;
// });
const base_url = "<?= base_url()?>";
	</script>
	<!--// loading-gif Js -->

	<!-- plugins:js -->
	<script src="<?= PLUGINS?>vendor.bundle.base.js"></script>
	<!-- endinject -->
	<script src="<?= PLUGINS?>off-canvas.js"></script>
	<script src="<?= PLUGINS?>hoverable-collapse.js"></script>
	<script src="<?= PLUGINS?>template.js"></script>
	<script src="<?= PLUGINS?>settings.js"></script>
	<script src="<?= PLUGINS?>todolist.js"></script>
	<script src="<?= PLUGINS?>all.js"></script>
	<!-- plugin js for this page -->

	<!-- <script src="<?= PLUGINS?>jquery/jquery-3.3.1.min.js"></script> -->

	<script src="<?= PLUGINS?>dataTable/jquery.dataTables.js"></script>
	<script src="<?= PLUGINS?>dataTable/dataTables.bootstrap4.js"></script>
	<script src="<?= PLUGINS?>dataTable/data-table.js"></script>
	<script src="<?= PLUGINS?>dataTable/data-table.js"></script>

	<script src="<?= JS.$data['page_functions']?>"></script>
	<!-- endinject -->
	</body>

	</html>