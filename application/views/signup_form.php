
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**

* @property CI_Loader $load

* @property CI_Form_validation $form_validation

* @property CI_Input $input

* @property CI_Email $email

* @property CI_DB_active_record $db

* @property CI_DB_forge $dbforge

*/

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Register</title>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/960.css");?>" type="text/css"  media="screen"/>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/reset.css");?>" type="text/css"  media="screen"/>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/text.css");?>" type="text/css"  media="screen"/>
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Molengo' rel='stylesheet' type='text/css'/>
         <script type="text/javascript" src="<?php echo base_url("/application/libraries/js/jquery-1.3.2.min.js");?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#submit").click(function(){
                    var email=$("#email").val();
                    var password=$("#password").val();
                    var passconf=$("#passconf").val();
                    var key=$("#key").val();
                    var dataString = 'email='+email+'&password='+password+'&passconf='+passconf+'&key='+key;
                    $.ajax({
                        type: "POST",
                        url: "http://localhost/smartCalendar/index.php/user/add_user",
                        data: dataString,
                        cache: false,
                        success: function(response){
                            if(response=='p'){
                                window.location.replace('http://localhost/smartCalendar/index.php/user/updateProfile');
                            }else{
                                if(!$('#errors').length){
                                    $("#form").append(response);
                                    $("#errors").fadeOut(2000, function(){
                                        $(this).remove();
                                    });
                                }
                            }
                        }
                    });
                     return false;
                });

            });
        </script>
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
                margin-top: 100px;
            }
            a{
                text-shadow: 0 -1px 1px rgba(0, 0, 0, 0.3);
                font-size:14px;
                text-decoration: none;
                padding-left:5px;
                color:red;
            }
            #errors{
                color:#DD4B39;
                padding:10px;
                background-color: #fbf9ea;
                border: 1px solid #e2e1d5;
                width:280px;
            }
       </style>
    </head>

    <body>
        <div id="container" class="container_16">
            <div id="form" class="grid_7 push_5">
                <h1>Register Form:</h1>
                <?php echo form_open(''); ?>
                <input type="text" id="email" name="email" placeholder ="Email" value="<?php echo set_value('email'); ?>" size="50" />
                <input type="password" id="password" name="password" placeholder="Password" value="<?php echo set_value('password'); ?>" size="50" />
                <input type="password" id="passconf" name="passconf" placeholder="Confirm Password" value="<?php echo set_value('passconf'); ?>" size="50" />
                <input type="text" id="key" name="key" placeholder="Activation Key" value="<?php echo set_value('key'); ?>" size="50" />
                <a href="keyinfo.html"> Help </a>
                <br/>
                <input type="submit" id="submit" value="Submit" />
                <?php echo form_close()?>
            </div>
        </div>
    </body>
</html>




