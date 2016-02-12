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

	<div class="content">
        <?php echo $blog[0]->content; ?>
	</div>
</div>