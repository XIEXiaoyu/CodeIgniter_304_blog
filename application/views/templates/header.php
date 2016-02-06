<html>
    <head>
    	<title>Jun Blog</title>
    	<!-- Latest compiled CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="<?php echo asset_url(); ?>css/style.css" type="text/css"> 
		<script src="<?php echo asset_url(); ?>ckeditor/ckeditor.js"></script>      
    </head>
    <body>
    	<div class="ceiling_top">
    		<div class="ceiling"></div>
			
			<div class="below_ceiling">
				<p class="logo_name">Jun's blog</p>

				<ul class="ceiling_nav">
					<li><a href="<?php echo site_url('blogs/home'); ?>">Home</a></li>
					<li><a href="<?php echo site_url('pages/about'); ?>">About</a></li>
					<li><a href="http://www.pearstart.com">Portfolio</a></li>
				</ul>
				<a href="<?php echo site_url('admin/login'); ?>" class="btn btn-link">sign in</a>
			</div>		
    	</div>


