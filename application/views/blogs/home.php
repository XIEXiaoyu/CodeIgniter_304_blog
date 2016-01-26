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
        <!-- if the $data contains the tag with value 'content_submitted', then the view should display the content, or it should display the CKeditor to let the user to provide the blog content -->
        <?php 
        if(isset($tag)) 
        { // display the content 
            echo $latest_blog->content; 
        }
        else 
        { // display the CKeditor ?>
            <form action="savetextarea.php" method="post">
                Author:<br>
                <input type="text" name="author">
                <br>
                Category id:<br>
                <input type="text" name="category_id">
                <br>
                Blog title:<br>
                <input class="form_blog_title" type="text" name="blog_title">
                <br><br>               
                <textarea name="editor1" id="editor1" class="CKeditor"></textarea>
                <script>
                    // Replace the <textarea id="editor1"> with a CKEditor instance, using default configuration.
                    CKEDITOR.replace( 'editor1' );
                </script> 
                <br>
                <input class="btn btn-info" type="submit" value="Submit">          
            </form>
        <?php } ?>
	</div>
</div>