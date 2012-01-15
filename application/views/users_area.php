<!DOCTYPE html>

<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>User Page</title>
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
        <script type="text/javascript">
             $(document).ready(function() {
                $("a[title$='Add event']").click(function(){
                    $("#eventForm").slideToggle(500);
                    return false;
                });
                $('.time').datetimepicker({
                onClose: function(dateText, inst){
                        if(dateText!=""){
                            var date=new Date(dateText);
                            //alert(date.getTime());
                            //alert(date.getDay()+"/"+date.getMonth()+"/"+date.getYear()+" "+date.getHours()+":"+date.getMinutes());
                        }
                    }
                });
               $('.title').click(function(){
                     $(this).closest('.event').find('.content').slideToggle(500);
                });
             });
        </script>
       <style type="text/css">
          body{
               background: transparent url(<?php echo base_url("/application/libraries/images/noise.png");?>) repeat 0 0;
               margin-top:50px;
            }
          h1{
               font-family: Shadows Into Light, Arial, Helvetica, sans-serif;
               font-size: 68px;
           }
          h2{
               font-family: Shadows Into Light, Arial, Helvetica, sans-serif;
               font-size: 48px;
           }
           #container{
               margin-top: 40px;
          }
         label{
            margin-top:30px;
            padding:12px;
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
        #logout{
           margin-top:40px;
        }

        #eventForm{
            display:none;
            border-left-style:dotted;
            border-width:1px;
            padding:3px;
        }
        input, textarea{
            font-family: Molengo, Arial, Helvetica, sans-serif;
            border-radius :5px;
            height:30px;
            font-size:15px;
            margin:5px;
        }
        textarea{
            height:150px;
            width:450px;
        }
        input[name='title']{
            width:350px;
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

        #addContainer, #eventForm{
            margin-bottom:25px;
        }
        
        .styleContainer{
            color: white !important;
            border: 1px solid #2F5BB7 !important;
            background: #3F83F1;
            background: -webkit-linear-gradient(top, #4D90FE, #357AE8);
            background: -moz-linear-gradient(top, #4D90FE, #357AE8);
            background: -ms-linear-gradient(top, #4D90FE, #357AE8);
            border-bottom-style:dotted;
            border-width:1px;
            height:20px;
            margin-top:2px;
            text-align:center;
        }

        .eventContainer{
            border-bottom-style:dotted;
            border-width:1px;
        }

        .eventContainer:hover{
            cursor:pointer
        }

        .event{
            margin-bottom:20px;
        }

        .title{
            margin-left:5px;
            margin-top:5px;
        }
        .content{
            display:none;
        }


       </style>
    </head>
    <body>
        <div id="container" class="container_16">
            <div class="grid_15">
                <h1>Welcome Back, <?php echo $this->session->userdata('email'); ?></h1>
            </div>
            <div id="logout" class="grid_1">
                <a href="walou.html">
                    <label>Logout</label>
                </a>
            </div>
            <div id="addContainer" class="grid_2">
                <a href="#" class="button on" title="Add event"><span class="icon icon3"></span></a>
            </div>
            <div id="eventForm" class="grid_14 alpha">
                <?php
                    echo form_open('test/addEvent');
                ?>
                <input type="text" name="title" id="title" placeholder="Title" value="" />
                 <br/>
                 <input type="text" name="startTime" id="startTime" placeholder="Start Time" value="" class="time" />
                 <input type="text" name="endTime" id="endTime" placeholder="End Time" value="" class="time" />
                 <br/>
                 <?php
                    echo form_textarea(array('name'=>'description', 'id'=>'description', 'placeholder'=>'Description'));
                    echo "<br/>";
                    $attributes=array('id'=>'submit', 'name'=>'create', 'value'=>'Create');
                    echo form_submit($attributes);
                    echo form_close();
                    echo validation_errors();
                ?>
            </div>
            <div id="EventsHeader" class="grid_16 push_6">
                <h2>Events!</h2>
            </div>
            <div class="event grid_16">
                <div class="styleContainer grid_2 alpha">
                     <span>12:00-14:00</span>
                </div>
                <div class="eventContainer grid_13 alpha">
                    <p class="title">Fall Bird Walks</p>
                    <div class="content">
                        <ul>
                            <li><b>Host: </b>Jason Derouloux</li>
                            <li><b>Where: </b>Wherever you want</li>
                            <li><b>When: </b>12:00-14:00</li>
                            <li><b>Description: </b> can accomplish this, but it's all or nothing.
                                I click one minimize button, and everything goes. How can I contain
                                it to just toggle items with a certain class name that are children of
                                the div that the minimize button is in? I've tried .parent(), .child(), .next(),
                                .prev(). I've thrown everything at it that I know. Now I turn to you, kind sirs (or madams).
                                What am I doing wrong? Here's the ul I'm trying to run it on.</li>
                        </ul>
                    </div>
                </div>
                <div class="commandContainer grid_1 alpha">
                    <a href="#" class="button on" title="Edit event"><span class="icon icon145"></span></a>
                </div>
            </div>
             <div class="event grid_16">
                <div class="styleContainer grid_2 alpha">
                    <span>12:00-16:00</span>
                </div>
                <div class="eventContainer grid_13 alpha">
                    <p class="title">Cast in Bronze: A Workshop in Exploring and Creating Bronze Sculpture</p>
                    <div class="content">
                        <ul>
                            <li><b>Host:</b></li>
                            <li><b>Where:</b></li>
                            <li><b>When:</b></li>
                            <li><b>Description:</b></li>
                        </ul>
                    </div>
                </div>
                <div class="commandContainer grid_1 alpha">
                     <a href="#" class="button on" title="Edit event"><span class="icon icon145"></span></a>
                </div>
            </div>
        </div>
    </body>
</html>