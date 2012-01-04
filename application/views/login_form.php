
<!DOCTYPE html>

<html lang="en">
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Login!</title>


    </head>

    

    <body>

        <h1>Login, Fool!</h1>

        <div id="login_form">
       
            <?php echo form_open('user_controller/validate_credentials'); ?>

                <h5>Email</h5>
                <div style="color:red"> <?php echo form_error('email'); ?>  </div>
                <input type="text" name="email" value="<?php echo set_value('email'); ?>" size="50" />
                
                <h5>Password</h5>
                <div style="color:red"> <?php echo form_error('password'); ?> </div>
                <input type="password" name="password" value="" size="50" />

             
                <div><input type="submit" value="Submit" /></div>
                <br/>

                <?php echo anchor('user_controller/signup', 'Create Account'); ?>

            </form> 

         </div><!-- end login_form-->
         
         
    </body>
</html>  