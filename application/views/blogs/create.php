	<div class="content">
        <div class="validation_error">
            <?php echo validation_errors(); ?>
        </div>
        
        <form class="blog_form" action="<?php echo site_url('blogs/create'); ?>" method="post">
            <label class="blog_label" for="author">Author</label>
            <input type="text" name="author" value="<?php echo set_value('author'); ?>"/><br/>

            <label class="blog_label" for="category_id">Category id</label>
            <input type="text" name="category_id" value="<?php echo set_value('category_id'); ?>"/><br/>

            <label for="form_blog_title">Blog title</label>
            <input class="form_blog_title" type="text" name="title" value="<?php echo set_value('title'); ?>"/><br/><br>

            <textarea name="editor1" id="editor1" class="CKeditor" value="<?php echo set_value('editor1'); ?>"></textarea>
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