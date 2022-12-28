<?php include('engine/.inc/sistema/includes.php'); ?>
<?php include('engine/template/headers.php'); ?>
<body>
  <!-- top -->
	<?php if($activar_top == 1) include ('engine/template/top.php'); ?>
  <!-- /top -->

  <!-- main -->
	<?php include("engine/.inc/sistema/content.php");?>
  <!-- /main -->

  <!-- bottom -->
	<?php if($activar_bottom == 1) include ('engine/template/bottom.php'); ?>
  <!-- /bottom -->

  <!-- footer -->
	<?php include ('engine/template/footer.php'); ?>
  <!-- /footer -->
</body>
</html>