  <!--footer section start-->
<footer class="dashboard">
  <p>&copy 2020 Collective. All Rights Reserved | Design by <a href=#" target="_blank"
      class="text-primary">workinfo</a></p>
</footer>
<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
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
<script src="<?= PLUGINS?>jquery/jquery-1.10.2.min.js"></script>

<script src="<?= PLUGINS?>jquery.nicescroll/jquery.nicescroll.js"></script>
<script src="<?= PLUGINS?>script/scripts.js"></script>
<script src="<?= PLUGINS?>dataTables/jquery.dataTables.min.js"></script>

<!-- close script -->
<script>
  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="<?= PLUGINS?>modernizr/modernizr.js"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->

<!-- Bootstrap Core JavaScript -->
<script src="<?= JS_VENDORS?>bootstrap.min.js"></script>
<script src="<?= JS?>function.main.js"></script>

</body>

</html>
