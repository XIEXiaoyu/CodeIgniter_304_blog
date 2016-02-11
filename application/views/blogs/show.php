<div class="main_middle">
	<div class="left_panel">
        <?php foreach ($categories as $c): ?>
        <div class="_<?php echo $c->id; ?> per_category">
            <div class="text_and_button">
                <p class="category"><?php echo $c->category; ?></p>
                <a href="<?php echo site_url($c->link_all_route); ?>" class="btn btn-link button_in_left_panel" role="button">More</a>               
            </div>
            <p class="info"><?php echo $c->info; ?></p> 
            <a class="article_link" href="latest_article"><?php echo $latest_blogs[$c->id]->title; ?></a>
        </div>
        <?php endforeach; ?>
	</div>

	<div class="content">
        <!-- show all the blogs -->
        <div class="all_blogs">
            <?php foreach($a_category_blogs as $c_b): ?>
                <div class="blog_list">
                    <p>
                        <a href="<?php echo site_url('blogs\blog'). '\\' . $c_b->id; ?>">
                        <?php echo $c_b->title; ?>
                        </a>
                    </p>
                    <p><?php echo  $c_b->first_paragraph;?></p>
                </div>
            <?php endforeach; ?>
        </div>
	</div>
</div>