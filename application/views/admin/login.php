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

        <div class="container">
            <?php echo validation_errors(); ?>
            <?php   if(isset($error_msg)) 
                    {
                        echo $error_msg; 
                    }
            ?>
            <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4">
                    <h1 class="text-center login-title">Sign in edit Jun's blog</h1>
                    <div class="account-wall">
                        <form action="<?php echo site_url('admin/login'); ?>" method="post" class="form-signin">
                        
                        <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo set_value('email'); ?>">
                        
                        <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo set_value('password'); ?>">
                        
                        <button class="btn btn-lg btn-success btn-block" type="submit">
                            Sign in</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>