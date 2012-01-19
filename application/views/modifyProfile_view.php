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
      <script type="text/javascript">
          $(document).ready(function() {
            ///////////////////////////////////////////////
            //
            //The name
            ///////////////////////////////////////////////
            $('.editNameLink').click(function(){
               $('.nameTextWrapper').hide();
               var data=$('.nameTextWrapper').html();
               $('.editName').show();
               $('.nameEditBox').html(data);
               $('.nameEditBox').focus();
            });

            $(".nameEditBox").mouseup(function(){
                return false;
            });

            $(".nameEditBox").change(function(){
                $('.editName').hide();
                var boxval=$(".nameEditBox").val();
                var dataString = 'name='+ boxval+'&type=1';
                $.ajax({
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
                });

            });

            $(document).mouseup(function()
            {
                $('.editName').hide();
                $('.nameTextWrapper').show();
            });
            /////////////////////////////////////////////////
            //
            //The description
            ////////////////////////////////////////////////
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
                $('.editName').hide();
                var boxval=$(".descriptionEditBox").val();
                var dataString = 'description='+ boxval+'&type=2';
                $.ajax({
                    type: "POST",
                    url: "http://localhost/smartCalendar/index.php/test/updateUserProfile",
                    data: dataString,
                    cache: false,
                    success: function(response){
                        if(response=='p'){
                            $('.descriptionTextWrapper').html(boxval);
                            $('.descriptionTextWrapper').show();
                        }
                    }
                });
            });

            $(document).mouseup(function()
            {
                $('.editDescription').hide();
                $('.descriptionTextWrapper').show();
            });
            /////////////////////////////////////////////////
            //
            //The email
            ////////////////////////////////////////////////
            $('.editEmailLink').click(function(){
               $('.emailTextWrapper').hide();
               var data=$('.emailTextWrapper').html();
               $('.editEmail').show();
               $('.emailEditBox').html(data);
               $('.emailEditBox').focus();
            });

            $(".emailEditBox").mouseup(function(){
                return false;
            });

            $(".emailEditBox").change(function(){
                $('.editEmail').hide();
                var boxval=$(".emailEditBox").val();
                var dataString = 'emails='+ boxval+'&type=3';
                $.ajax({
                    type: "POST",
                    url: "http://localhost/smartCalendar/index.php/test/updateUserProfile",
                    data: dataString,
                    cache: false,
                    success: function(response){
                        if(response=='p'){
                            $('.emailTextWrapper').html(boxval);
                            $('.emailTextWrapper').show();
                        }
                    }
                });
            });

            $(document).mouseup(function()
            {
                $('.editEmail').hide();
                $('.emailTextWrapper').show();
            });
            /////////////////////////////////////////////////
            //
            //The host
            ////////////////////////////////////////////////
            $('.editHostLink').click(function(){
               $('.hostTextWrapper').hide();
               var data=$('.hostTextWrapper').html();
               $('.editHost').show();
               $('.hostEditBox').html(data);
               $('.hostEditBox').focus();
            });

            $(".hostEditBox").mouseup(function(){
                return false;
            });

            $(".hostEditBox").change(function(){
                $('.editHost').hide();
                var boxval=$(".hostEditBox").val();
                var dataString = 'hosts='+ boxval+'&type=6';
                $.ajax({
                    type: "POST",
                    url: "http://localhost/smartCalendar/index.php/test/updateUserProfile",
                    data: dataString,
                    cache: false,
                    success: function(response){
                        if(response=='p'){
                            $('.hostTextWrapper').html(boxval);
                            $('.hostTextWrapper').show();
                        }
                    }
                });
            });

            $(document).mouseup(function()
            {
                $('.editHost').hide();
                $('.hostTextWrapper').show();
            });
            /////////////////////////////////////////////////
            //
            //The websites
            ////////////////////////////////////////////////
            $('.editWebPageLink').click(function(){
               $('.webPageTextWrapper').hide();
               var data=$('.webPageTextWrapper').html();
               $('.editWebPage').show();
               $('.webPageEditBox').html(data);
               $('.webPageEditBox').focus();
            });

            $(".webPageEditBox").mouseup(function(){
                return false;
            });

            $(".webPageEditBox").change(function(){
                $('.editWebPage').hide();
                var boxval=$(".webPageEditBox").val();
                var dataString = 'webPages='+ boxval+'&type=4';
                $.ajax({
                    type: "POST",
                    url: "http://localhost/smartCalendar/index.php/test/updateUserProfile",
                    data: dataString,
                    cache: false,
                    success: function(response){
                        if(response=='p'){
                            $('.webPageTextWrapper').html(boxval);
                            $('.webPageTextWrapper').show();
                        }
                    }
                });
            });

            $(document).mouseup(function()
            {
                $('.editWebPage').hide();
                $('.webPageTextWrapper').show();
            });
            /////////////////////////////////////////////////
            //
            //The phone
            ////////////////////////////////////////////////
            $('.editPhoneLink').click(function(){
               $('.phoneTextWrapper').hide();
               var data=$('.phoneTextWrapper').html();
               $('.editPhone').show();
               $('.phoneEditBox').html(data);
               $('.phoneEditBox').focus();
            });

            $(".phoneEditBox").mouseup(function(){
                return false;
            });

            $(".phoneEditBox").change(function(){
                $('.editPhone').hide();
                var boxval=$(".phoneEditBox").val();
                var dataString = 'phoneNumbers='+ boxval+'&type=5';
                $.ajax({
                    type: "POST",
                    url: "http://localhost/smartCalendar/index.php/test/updateUserProfile",
                    data: dataString,
                    cache: false,
                    success: function(response){
                        if(response=='p'){
                            $('.phoneTextWrapper').html(boxval);
                            $('.phoneTextWrapper').show();
                        }
                    }
                });
            });

            $(document).mouseup(function()
            {
                $('.editPhone').hide();
                $('.phoneTextWrapper').show();
            });

          });

          </script>
      <style type="text/css">
          body{
              margin-top:30px;
              font-family:Helvetica, Arial, sans-serif;
              background: transparent url(<?php echo base_url("/application/libraries/images/noise.png");?>) repeat 0 0;
              font-size:13px;
          }
          h1{
               font-family: Shadows Into Light, Arial, Helvetica, sans-serif;
               font-size: 68px;
               margin-left:-90px;
           }
            #nameBox, #descriptionBox, #emailBox, #webPageBox, #phoneBox, #hostBox {
                width: 450px;
                margin-left:-20px;
                margin-bottom:20px;
            }
            .nameTextWrapper, .descriptionTextWrapper, .emailTextWrapper, .webPageTextWrapper, .phoneTextWrapper, .hostTextWrapper {
                border: solid 1px #0099CC;
                padding: 5px;
                width: 320px;
                border-radius:3px;
            }
          .editNameLink, .editDescriptionLink, .editEmailLink, .editWebPageLink, .editPhoneLink, .editHostLink{
             float:right;
             width: 94px;
             margin-left: 50px;
          }

          .nameEditBox, .descriptionEditBox, .emailEditBox, .webPageEditBox, .phoneEditBox, .hostEditBox{
            overflow: hidden;
            border:solid 1px #0099CC;
            font-size:12px;
            font-family:Arial, Helvetica, sans-serif;
            padding:5px;
            border-radius:3px;
          }

         textarea {
           resize:both;
           background: transparent url(<?php echo base_url("/application/libraries/images/noise.png");?>) repeat 0 0;
         }
         .button{
          margin:0px;
        }
        label{

            padding:7px;
            margin-left:-20px;
            border-radius :2px;
            font-size:14px;
            color: white !important;
            border: 1px solid #B0281A !important;
            background: #D14130;
            background: -webkit-linear-gradient(top, #DC4A38, #C53727);
            background: -moz-linear-gradient(top, #DC4A38, #C53727);
            background: -ms-linear-gradient(top, #DC4A38, #C53727);
            background: -o-linear-gradient(top, #DC4A38, #C53727);
            cursor:pointer;
           
        }
        a{
            text-decoration:none;
        }
      </style>

  </head>
  <body>
      <div id="container" class="container_16">
          <div id="fieldsContainer" class="grid_16 push_4">
              <h1>Update Your Profile</h1>
              <div id="nameBox">
                  <a href="#"class="editNameLink button on" title="Edit Title"><span class="icon icon145"></span><span>Name</span></a>
                  <div class="nameTextWrapper"><?php echo $name;?></div>
                  <div class="editName" style="display:none" >
                      <textarea class="nameEditBox" cols="43" rows="3"></textarea>
                  </div>
              </div>
            <div id="descriptionBox">
                  <a href="#"class="editDescriptionLink button on" title="Edit Description"><span class="icon icon145"></span><span>Description</span></a>
                  <div class="descriptionTextWrapper"><?php echo $description;?></div>
                  <div class="editDescription" style="display:none" >
                      <textarea class="descriptionEditBox" cols="43" rows="10"></textarea>
                  </div>
              </div>
              <div id="emailBox">
                  <a href="#"class="editEmailLink button on" title="Edit Emails"><span class="icon icon145"></span><span>Emails</span></a>
                  <div class="emailTextWrapper"><?php echo $emails;?></div>
                  <div class="editEmail" style="display:none" >
                      <textarea class="emailEditBox" cols="43" rows="3"></textarea>
                  </div>
              </div>
              <div id="hostBox">
                  <a href="#"class="editHostLink button on" title="Edit Hosts"><span class="icon icon145"></span><span>Hosts</span></a>
                  <div class="hostTextWrapper"><?php echo $hosts;?></div>
                  <div class="editHost" style="display:none" >
                      <textarea class="hostEditBox" cols="43" rows="4"></textarea>
                  </div>
              </div>
              <div id="webPageBox">
                  <a href="#"class="editWebPageLink button on" title="Edit Webpages"><span class="icon icon145"></span><span>Webpages</span></a>
                  <div class="webPageTextWrapper"><?php echo $webPages;?></div>
                  <div class="editWebPage" style="display:none" >
                      <textarea class="webPageEditBox" cols="43" rows="3"></textarea>
                  </div>
             </div>
              <div id="phoneBox">
                  <a href="#"class="editPhoneLink button on" title="Edit Phone Numbers"><span class="icon icon145"></span><span>Phone #</span></a>
                  <div class="phoneTextWrapper"><?php echo $phoneNumbers;?></div>
                  <div class="editPhone" style="display:none" >
                      <textarea class="phoneEditBox" cols="43" rows="3"></textarea>
                  </div>
             </div>
               <a href="gotoProfile" style="margin-left: -20px"class="button on" title="Profile Page"><span class="icon icon4"></span><span>Home</span></a>
               <br/><br/><br/>
             <div id="logout">
                <a href="logout">
                    <label>&nbsp;&nbsp;Logout&nbsp;&nbsp;</label>
                </a>
            </div>
            </div>
      </div>
  </body>
</html>