
<!DOCTYPE html>

<html lang="en">
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login!</title>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/960.css");?>" type="text/css"  media="screen"/>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/reset.css");?>" type="text/css"  media="screen"/>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/text.css");?>" type="text/css"  media="screen"/>
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'/>
       <link href='http://fonts.googleapis.com/css?family=Molengo' rel='stylesheet' type='text/css'/>
        <style type="text/css">
            body{
                background: transparent url(<?php echo base_url("/application/libraries/images/noise.png");?>) repeat 0 0;
            }
            h1{
                font-family: Shadows Into Light, Arial, Helvetica, sans-serif;
                font-size: 68px;
            }
            input{
                font-family: Molengo, Arial, Helvetica, sans-serif;
                border-radius :5px;
                height:30px;
                font-size:15px;
                margin:5px;
            }
            input[type='submit']{
                color: white !important;
                text-shadow: 0 1px 0 #2F5BB7 !important;
                border: 1px solid #2F5BB7 !important;
                background: #3F83F1;
                background: -webkit-linear-gradient(top, #4D90FE, #357AE8);
                background: -moz-linear-gradient(top, #4D90FE, #357AE8);
                background: -ms-linear-gradient(top, #4D90FE, #357AE8);
            }
            #container{
                margin-top:100px;
            }
            a{
                text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.3);
                font-size:14px;
                text-decoration: none;
                padding-left:5px;
            }
        </style>
    </head>

    

    <body>
        <div id="container" class="container_16">
            <div id="form" class="grid_5 push_5">
                <h1>Login Form:</h1>
                <?php echo form_open('user_controller/validate_credentials'); ?>
                    <div style="color:red"> <?php echo form_error('email'); ?>  </div>
                    <div class="input_wrapper">
                        <input type="text" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>" size="50" />
                    </div>
                    <div style="color:red"> <?php echo form_error('password'); ?> </div>
                    <div class="input_wrapper">
                        <input type="password" name="password" placeholder="Password" value="" size="50" />
                    </div>
                    <div><input type="submit" value="Submit" /></div>
                    <br/>
                    <?php echo anchor('user_controller/signup', 'Register Now!'); ?>
                <?php echo form_close(); ?>
            </div>
        </div>
    </body>
</html>  