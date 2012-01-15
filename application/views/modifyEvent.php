<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/960.css");?>" type="text/css"  media="screen"/>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/reset.css");?>" type="text/css"  media="screen"/>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/text.css");?>" type="text/css"  media="screen"/>
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Molengo' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/css3-buttons.css");?>" type="text/css"  media="screen">
    </head>
    <body>
        <div id="container">
          <div id="titleBox">
              <a href="#"class="editTitleLink" title="Edit">Edit</a>
              <div class="titleTextWrapper"><?php echo "";?></div>
              <div class="editTitle" style="display:none" >
                  <textarea class="titleEditBox" cols="26" rows="3"></textarea>
              </div>
          </div>
          <div id="startTimeBox">
            
          </div>
        </div>
    </body>
</html>
