<div class="main_middle">
	<div class="left_panel">
        <?php foreach ($categories as $c): ?>
        <div class="_<?php echo $c->id; ?> per_category">
            <div class="text_and_button">
                <p class="category"><?php echo $c->category; ?></p>
                <button type="button" class="btn btn-success button_in_left_panel">view all</button> 
            </div>
            <p class="info"><?php echo $c->info; ?></p> 
            <a class="article_link" href="latest_article"><?php echo $latest_blogs[$c->id]->title; ?></a>
        </div>
        <?php endforeach; ?>
	</div>

	<div class="content">
		<h2 class="blog_title"></h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
	</div>
</div>