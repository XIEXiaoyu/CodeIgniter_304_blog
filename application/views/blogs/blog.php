	<div class="content">
        <?php echo $blog[0]->content; ?>
	</div>
	<div>
		<?php if(isset($_SESSION['email'])){?>
			<a href="<?php echo site_url('blogs/edit') . '/' . $blog[0]->id; ?>" class="btn btn-link edit_article">Edit this article</a>
		<?php } ?>
	</div>
</div>