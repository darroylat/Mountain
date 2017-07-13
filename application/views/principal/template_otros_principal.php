<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Mountain</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/principal/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>
		<div id="page-wrapper">
      <?php if (isset($header)) {
              $this->load->view($header);
            }
            if (isset($banner)) {
              $this->load->view($banner);
            }
            if (isset($main) && isset($id)) {
              $this->load->view($main,$id);
            }else{
							$this->load->view($main);
						}
            if (isset($cta)) {
              $this->load->view($cta);
            }
            if (isset($footer)) {
              $this->load->view($footer);
            }?>
    </div>

  		<!-- Scripts -->
  			
  			<script src="<?php echo base_url(); ?>assets/principal/js/jquery.min.js"></script>
  			<script src="<?php echo base_url(); ?>assets/principal/js/jquery.dropotron.min.js"></script>
  			<script src="<?php echo base_url(); ?>assets/principal/js/jquery.scrollgress.min.js"></script>
  			<script src="<?php echo base_url(); ?>assets/principal/js/skel.min.js"></script>
  			<script src="<?php echo base_url(); ?>assets/principal/js/util.js"></script>
  			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
  			<script src="<?php echo base_url(); ?>assets/principal/js/main.js"></script>
  	</body>
  </html>
