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
        <?php // display the CKeditor so that we can create blog
        echo validation_errors(); ?>
        <form class="blog_form" action="<?php echo site_url('blogs/process'); ?>" method="post">
            <label class="blog_label" for="author">Author</label>
            <input type="text" name="author" value="<?php echo $this->session->flashdata('author'); ?>"/><br/>

            <label class="blog_label" for="category_id">Category id</label>
            <input type="text" name="category_id" value="<?php echo $this->session->flashdata('category_id'); ?>"/><br/>

            <label for="form_blog_title">Blog title</label>
            <input class="form_blog_title" type="text" name="title" value="<?php echo $this->session->flashdata('title'); ?>"/><br/><br>

            <textarea name="editor1" id="editor1" class="CKeditor" value="<?php echo $this->session->flashdata('editor1'); ?>"></textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor instance, using default configuration.
                // CKEDITOR.replace( 'editor1' );
                CKEDITOR.replace( 'editor1', {
                    uiColor: '#1bb11b'
                });
            </script> 
            <br>
            
            <input class="btn btn-info" type="submit" value="Submit">
            <a href="<?php echo site_url('blogs/home'); ?>" class="btn btn-danger btn_cancel_create" role="button">Cancle</a>
        </form>        
	</div>
</div>