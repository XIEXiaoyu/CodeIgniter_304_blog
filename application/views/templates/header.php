<html>
    <head>
    	<title>Jun Blog</title>
    	<!-- Latest compiled CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css">
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.js"></script>
		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.js"></script>
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
					<li><a href="<?php echo site_url('blogs/about'); ?>">About</a></li>
					<li><a href="http://www.pearstart.com">Portfolio</a></li>
				</ul>

				<?php if(isset($_SESSION['email'])):?>
					<a href="<?php echo site_url('admin/logout'); ?>" class="btn btn-link">Sign out</a>
				<?php else:?>
					<a href="<?php echo site_url('admin/login'); ?>" class="btn btn-link">Sign in</a>
				<?php endif;?>

				<?php if(isset($_SESSION['email'])){?>
					<a href="<?php echo site_url('blogs/create'); ?>" class="btn btn-link header_create">Create</a>
				<?php } ?>
			</div>		
    	</div>

    	<div class="main_middle">
			<div class="left_panel">
	        <?php foreach ($categories as $c): ?>
		        <div class="_<?php echo $c->id; ?> per_category">
		            <div class="text_and_button">
		                <p class="category"><?php echo $c->category; ?></p>
		                <a href="<?php echo site_url($c->link_all_route); ?>" class="btn btn-link button_in_left_panel" role="button">More</a>               
		            </div>
		            <p class="info"><?php echo $c->info; ?></p> 
		            <a class="article_link" href="<?php echo site_url('blogs/blog') . '/' . $latest_blogs[$c->id]->id ?>"><?php echo $latest_blogs[$c->id]->title; ?></a>
		        </div>
		    <?php endforeach; ?>
			</div>


