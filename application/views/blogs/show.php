	<div class="content">
        <!-- show all the blogs -->
        <div class="all_blogs">
            <?php foreach($a_category_blogs as $c_b): ?>
                <div class="blog_list">
                    <p>
                        <a href="<?php echo site_url('blogs/blog'). '/' . $c_b->id; ?>">
                        <?php echo $c_b->title; ?>
                        </a>
                    </p>
                    <p><?php echo  $c_b->first_paragraph;?></p>
                </div>
            <?php endforeach; ?>
        </div>
	</div>
</div>