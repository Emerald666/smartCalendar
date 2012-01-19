<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="<?php echo base_url("/application/libraries/css/jquery-ui-timepicker-addon.css");?>" type="text/css" media="screen, projection"/>
        <link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url("/application/libraries/css/jquery-ui-1.8.16.custom.css");?>" />
        <script type="text/javascript" src="<?php echo base_url("/application/libraries/js/jquery-1.3.2.min.js");?>"></script>
        <script type="text/javascript" src="<?php echo base_url("/application/libraries/js/jquery-ui-1.8.16.custom.min.js");?>"></script>
        <script type="text/javascript" src="<?php echo base_url("/application/libraries/js/jquery-ui-timepicker-addon.js");?>"</script>
        <script type="text/javascript" src="<?php echo base_url("/application/libraries/js/jquery-ui-sliderAccess.js");?>"</script>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/960.css");?>" type="text/css"  media="screen"/>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/reset.css");?>" type="text/css"  media="screen"/>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/text.css");?>" type="text/css"  media="screen"/>
        <link href='http://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'/>
        <link href='http://fonts.googleapis.com/css?family=Molengo' rel='stylesheet' type='text/css'/>
        <link rel="stylesheet" href=" <?php echo base_url("/application/libraries/css/css3-buttons.css");?>" type="text/css"  media="screen">
    </head>
    <script type="text/javascript">
             $(document).ready(function() {
                $('.time').datetimepicker({
                onClose: function(dateText, inst){
                        if(dateText!=""){
                            var date=new Date(dateText);
                            //alert(date.getTime());
                            //alert(date.getDay()+"/"+date.getMonth()+"/"+date.getYear()+" "+date.getHours()+":"+date.getMinutes());
                        }
                    }
                });
                ///////////////////////////////////////////////
                //
                //The title
                ///////////////////////////////////////////////
                $('.editTitleLink').click(function(){
                   $('.titleTextWrapper').hide();
                   var data=$('.titleTextWrapper').html();
                   $('.editTitle').show();
                   $('.titleEditBox').html(data);
                   $('.titleEditBox').focus();
                });

                $(".titleEditBox").mouseup(function(){
                    return false;
                });

                $(".titleEditBox").change(function(){
                    $('.editTitle').hide();
                    var boxval=$(".titleEditBox").val();
                    var dataString = 'title='+ boxval+'&type=1';
                   /* $.ajax({
                        type: "POST",
                        url: "http://localhost/smartCalendar/index.php/test/updateUserProfile",
                        data: dataString,
                        cache: false,
                        success: function(response){
                            if(response=='p'){
                                $('.nameTextWrapper').html(boxval);
                                $('.nameTextWrapper').show();
                            }
                        }
                    });*/
                    $('.titleTextWrapper').html(boxval);
                    $('.titleTextWrapper').show();
                });

                $(document).mouseup(function()
                {
                    $('.editTitle').hide();
                    $('.titleTextWrapper').show();
                });
                ///////////////////////////////////////////////
                //
                //The location
                ///////////////////////////////////////////////
                $('.editLocationLink').click(function(){
                   $('.locationTextWrapper').hide();
                   var data=$('.locationTextWrapper').html();
                   $('.editLocation').show();
                   $('.locationEditBox').html(data);
                   $('.locationEditBox').focus();
                });

                $(".locationEditBox").mouseup(function(){
                    return false;
                });

                $(".locationEditBox").change(function(){
                    $('.editLocation').hide();
                    var boxval=$(".locationEditBox").val();
                    var dataString = 'location='+ boxval+'&type=2';
                   /* $.ajax({
                        type: "POST",
                        url: "http://localhost/smartCalendar/index.php/test/updateUserProfile",
                        data: dataString,
                        cache: false,
                        success: function(response){
                            if(response=='p'){
                                $('.nameTextWrapper').html(boxval);
                                $('.nameTextWrapper').show();
                            }
                        }
                    });*/
                    $('.locationTextWrapper').html(boxval);
                    $('.locationTextWrapper').show();
                });

                $(document).mouseup(function()
                {
                    $('.editLocation').hide();
                    $('.locationTextWrapper').show();
                });
                ///////////////////////////////////////////////
                //
                //The description
                ///////////////////////////////////////////////
                $('.editDescriptionLink').click(function(){
                   $('.descriptionTextWrapper').hide();
                   var data=$('.descriptionTextWrapper').html();
                   $('.editDescription').show();
                   $('.descriptionEditBox').html(data);
                   $('.descriptionEditBox').focus();
                });

                $(".descriptionEditBox").mouseup(function(){
                    return false;
                });

                $(".descriptionEditBox").change(function(){
                    $('.editDescription').hide();
                    var boxval=$(".descriptionEditBox").val();
                    var dataString = 'description='+ boxval+'&type=3';
                   /* $.ajax({
                        type: "POST",
                        url: "http://localhost/smartCalendar/index.php/test/updateUserProfile",
                        data: dataString,
                        cache: false,
                        success: function(response){
                            if(response=='p'){
                                $('.nameTextWrapper').html(boxval);
                                $('.nameTextWrapper').show();
                            }
                        }
                    });*/
                    $('.descriptionTextWrapper').html(boxval);
                    $('.descriptionTextWrapper').show();
                });

                $(document).mouseup(function()
                {
                    $('.editDescription').hide();
                    $('.descriptionTextWrapper').show();
                });
                $('a.back').click(function(){
                    parent.history.back();
                    return false;
                });
             });
    </script>
    <style type="text/css">
      body{
          margin-top:30px;
          font-family:Helvetica, Arial, sans-serif;
          background: transparent url(<?php echo base_url("/application/libraries/images/noise.png");?>) repeat 0 0;
      }
     h1{
       font-family: Shadows Into Light, Arial, Helvetica, sans-serif;
       font-size: 68px;
    }
    #titleBox, #descriptionBox, #locationBox {
        width: 450px;
        margin-left:-20px;
        margin-bottom:20px;
    }
    .titleTextWrapper, .descriptionTextWrapper, .locationTextWrapper{
        border: solid 1px #0099CC;
        padding: 5px;
        width: 320px;
        border-radius:3px;
    }
    .editTitleLink, .editDescriptionLink, .editLocationLink{
        float:right;
        width: 94px;
        margin-left: 50px;
    }
    .button{
        margin:0px;
    }
    input, textarea{
        border-radius :5px;
        padding: 5px;
        border: solid 1px #0099CC;
        font-size:13px;
        margin:5px;
        background: transparent url(<?php echo base_url("/application/libraries/images/noise.png");?>) repeat 0 0;
    }
    input{
        width:150px;
        text-align:center;
        margin-bottom:20px;
    }
    #startTime{
        margin-left:-20px;
    }
    textarea{
        margin-right:3px;
    }


    </style>
    <body>
        <div id="container" class="container_16">
            <div class="grid_16 push_4">
              <h1>Edit your event</h1>
              <a href="#" style="margin-left: -20px"class="button on" title="Remove event"><span class="icon icon186"></span><span>remove</span></a>
              <br/><br/><br/>
              <div id="titleBox">
                  <a href="#"class="editTitleLink button on" title="Edit"><span class="icon icon145"></span><span>Title</span></a>
                  <div class="titleTextWrapper"><?php echo $title; ?></div>
                  <div class="editTitle" style="display:none" >
                      <textarea class="titleEditBox" cols="37" rows="3"></textarea>
                  </div>
              </div>
              <div id="locationBox">
                  <a href="#"class="editLocationLink button on" title="Edit"><span class="icon icon145"></span><span>Location</span></a>
                  <div class="locationTextWrapper"><?php echo $location; ?></div>
                  <div class="editLocation" style="display:none" >
                      <textarea class="locationEditBox" cols="37" rows="3"></textarea>
                  </div>
              </div>
              <input type="text" name="startTime" id="startTime" value="<?php echo date('m/d/o H:i', $startTime);?>" class="time" />
              <label>to</label>
              <input type="text" name="startTime" id="endTime"  value="<?php echo date('m/d/o H:i ', $endTime);?>" class="time"/>
              <div id="descriptionBox">
                  <a href="#"class="editDescriptionLink button on" title="Edit"><span class="icon icon145"></span><span>Description</span></a>
                  <div class="descriptionTextWrapper"><?php echo $description; ?></div>
                  <div class="editDescription" style="display:none" >
                      <textarea class="descriptionEditBox" cols="37" rows="11"></textarea>
                  </div>
              </div>
               <a href="#" style="margin-left: -20px"class="button on back" title="Previous"><span class="icon icon63"></span><span>Back to user page</span></a>
            </div>
        </div>
    </body>
</html>
