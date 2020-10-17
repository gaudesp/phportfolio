       </div>

    </div>

    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">
			Copyright &copy; 2018 Gaudesp<br />
			Site créé par <b>Gauthier Desplanque</b><br />
			<a href="<?php echo URL.'admins'; ?>">Panel d'Administration</a>
		</p>
      </div>
    </footer>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo URL; ?>public/js/jquery.wysibb.js"></script>
    <script src="<?php echo URL; ?>public/js/wysibb.js"></script>
	<script src="<?php echo URL; ?>public/js/popper.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap.js"></script>
    <script src="<?php echo URL; ?>public/js/bootstrap.bundle.js"></script>
	
    <script>
	$(document).ready(function() {
	 var wbbOpt = {
				  buttons: "bold,italic,underline,strike,|,justifyleft,justifycenter,justifyright,|,bullist,numlist,|,img,link,|,fontcolor,fontsize,|,table,",
				lang: "fr"
	 }
	 $("#body").wysibb(wbbOpt);
	});
    </script>

  </body>
</html>