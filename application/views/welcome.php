<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Welcome</title>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/960.css");?>" type="text/css"  media="screen"/>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/reset.css");?>" type="text/css"  media="screen"/>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/text.css");?>" type="text/css"  media="screen"/>
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'/>
        <style type="text/css">
            body{
                background: transparent url(<?php echo base_url("/application/libraries/images/noise.png");?>) repeat 0 0;
            }
            h1{
                font-family: Shadows Into Light, Arial, Helvetica, sans-serif;
                font-size: 68px;
            }
            #student{
                background-color: red;
            }
            #club{
                background-color: yellow;
            }
            #student, #club{
                border-radius:300px;
                -moz-border-radius:300px;
                -webkit-border-radius:300px;
            }
            #studentHeader{
                margin-left: -50px;
            }
            #message{
                margin-top: 30px;
                margin-bottom: 60px;
            }
            @-webkit-keyframes fade {
                0% {
                        opacity: 1.0;
                }
                100% {
                        opacity: 0.5;
                }
            }

            .grid_5:hover {
                cursor:pointer;
                -webkit-animation-name: fade;
                -webkit-animation-duration: 2s;
            }
            a{
                text-decoration:none;
                color:black;
            }
        </style>
    </head>
    <body>
        <div id ="container" class="container_16">
            <h1 id="message" class="prefix_2">Welcome to Smart Calendar</h1>
            <a href="#">
                <div id="student" class="grid_5 prefix_3">
                    <h1 id="studentHeader">Student</h1>
                </div>
            </a>
            <a href=<?php echo base_url("/index.php/user");?>>
                <div id="club" class="grid_5 prefix_3">
                    <h1>Club</h1>
                </div>
            </a>
        </div>
    </body>
</html>