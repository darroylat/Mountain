<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Mountain</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>images/icono.png"> 
	<!-- Bootstrap Styles-->
    <link href="<?php echo base_url(); ?>assets/mountain/css/bootstrap.css" rel="stylesheet" />
     <!-- FontAwesome Styles-->
    <link href="<?php echo base_url(); ?>assets/mountain/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom Styles-->
    <link href="<?php echo base_url(); ?>assets/mountain/css/custom-styles.css" rel="stylesheet" />
     <!-- Google Fonts-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- JS Scripts-->
  <!-- jQuery Js -->
  <script src="<?php echo base_url(); ?>assets/mountain/js/jquery-1.10.2.js"></script>
    <!-- Bootstrap Js -->
  <script src="<?php echo base_url(); ?>assets/mountain/js/bootstrap.min.js"></script>
  <!-- Metis Menu Js -->
  <script src="<?php echo base_url(); ?>assets/mountain/js/jquery.metisMenu.js"></script>
    <!-- Custom Js -->
  <link href="<?php echo base_url(); ?>assets/mountain/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />

  <!-- Morris Chart Js -->
  <script src="<?php echo base_url(); ?>assets/mountain/js/morris/raphael-2.1.0.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/mountain/js/morris/morris.js"></script>
  <script src="<?php echo base_url(); ?>assets/mountain/js/modal.js"></script>
  <script src="<?php echo base_url(); ?>assets/mountain/default.js"></script>
  
  <script src="<?php echo base_url(); ?>assets/mountain/js/dataTables/jquery.dataTables.js"></script>
  <script src="<?php echo base_url(); ?>assets/mountain/js/dataTables/dataTables.bootstrap.js"></script>
  <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
</head>
<body>
    <div id="wrapper">
      <?php $this->load->view($encabezado); ?>
      <?php $this->load->view($menu); ?>
      <?php if (isset($datos)) {
        $this->load->view($contenido, $datos);
      }else{
        $this->load->view($contenido);
      }
       ?>
      <?php
        if (isset($modal_contrasena)) {
          $this->load->view($modal_contrasena);
        }
      ?>
    </div>
   <!-- /. WRAPPER  -->
</body>
</html>
