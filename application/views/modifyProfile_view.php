<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
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
              font-family:Arial, Helvetica, sans-serif;
              font-size:12px;
          }
          #nameBox, #descriptionBox, #emailBox, #webPageBox, #phoneBox{
            width:300px;
            margin:50px;
          }
          .nameTextWrapper, .descriptionTextWrapper, .emailTextWrapper, .webPageTextWrapper, .phoneTextWrapper{
            border:solid 1px #0099CC;
            padding:5px;
            width:200px;
          }
          .editNameLink, .editDescriptionLink, .editEmailLink, .editWebPageLink, .editPhoneLink{
           float:right
          }

          .nameEditBox, .descriptionEditBox, .emailEditBox, .webPageEditBox, .phoneEditBox{
            overflow: hidden;
            border:solid 1px #0099CC;
            font-size:12px;
            font-family:Arial, Helvetica, sans-serif;
            padding:5px
          }

         textarea { resize:both; }
      </style>

  </head>
  <body>
      <div id="container">
          <div id="nameBox">
              <a href="#"class="editNameLink" title="Edit">Edit</a>
              <div class="nameTextWrapper">Hello amine</div>
              <div class="editName" style="display:none" >
                  <textarea class="nameEditBox" cols="26" rows="3"></textarea>
              </div>
          </div>
        <div id="descriptionBox">
              <a href="#"class="editDescriptionLink" title="Edit">Edit</a>
              <div class="descriptionTextWrapper"><?php echo $description;?></div>
              <div class="editDescription" style="display:none" >
                  <textarea class="descriptionEditBox" cols="26" rows="10"></textarea>
              </div>
          </div>
          <div id="emailBox">
              <a href="#"class="editEmailLink" title="Edit">Edit</a>
              <div class="emailTextWrapper"><?php echo $emails;?></div>
              <div class="editEmail" style="display:none" >
                  <textarea class="emailEditBox" cols="26" rows="3"></textarea>
              </div>
          </div>
          <div id="webPageBox">
              <a href="#"class="editWebPageLink" title="Edit">Edit</a>
              <div class="webPageTextWrapper"><?php echo $webPages;?></div>
              <div class="editWebPage" style="display:none" >
                  <textarea class="webPageEditBox" cols="26" rows="3"></textarea>
              </div>
         </div>
          <div id="phoneBox">
              <a href="#"class="editPhoneLink" title="Edit">Edit</a>
              <div class="phoneTextWrapper"><?php echo $phoneNumbers;?></div>
              <div class="editPhone" style="display:none" >
                  <textarea class="phoneEditBox" cols="26" rows="3"></textarea>
              </div>
         </div>
      </div>
  </body>
</html>
