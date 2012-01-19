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
                
                 $("#submit").click(function(){
                    var title=$("#title").val();
                    var startTime=Date.parse($("#startTime").val());
                    var endTime=Date.parse($("#endTime").val());
                    var description=$("#description").val();
                    var dataString = 'title='+title+'&startTime='+startTime+'&endTime='+endTime+"&description="+description;
                    $.ajax({
                       type: "POST",
                       url: "http://localhost/smartCalendar/index.php/events/addNewEvent",
                       data: dataString,
                       cache: false,
                       success: function(response){
                           if(!$('#errors').length && !$('#success').length ){
                                $("#eventForm").append(response);
                                $("#errors").fadeOut(2000, function(){
                                    $(this).remove();
                                });
                                $("#success").fadeOut(2000, function(){
                                    $(this).remove();
                                    $("#title").val('');
                                    $("#endTime").val('');
                                    $("#startTime").val('');
                                    $("#description").val('');
                                });
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
          h2{
               font-family: Shadows Into Light, Arial, Helvetica, sans-serif;
               font-size: 40px;
           }
         label[title='Logout']{
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
            /*border-left-style:dotted;
            border-width:1px;*/
            border-left:1px solid white;
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
            margin-bottom:10px;
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
            border-radius:2px;
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
        .dayContainer{
            font-size:16px;
            border-bottom-style:solid;
            border-width:1px;
            margin-bottom:15px;
        }
        a[title='Add event']{
            width:90px;
        }
        a[title='Update profile']{
            width:110px;
        }
        #success{
            background-color:#DAFFDA;
            color:#DD4B39;
            padding:10px;;
            border: 1px solid #e2e1d5;
            width:320px;
        }
        #errors{
            color:#DD4B39;
            padding:10px;
            background-color: #fbf9ea;
            border: 1px solid #e2e1d5;
            width:320px;
        }
       </style>
    </head>
    <body>
        <div id="container" class="container_16">
            <div class="grid_15">
                <h1>Welcome Back,</h1>
            </div>
            <div id="logout" class="grid_1">
                <a href="logout">
                    <label title="Logout">Logout</label>
                </a>
            </div>
            <div id="addContainer" class="grid_16">
                <a href="updateProfile" class="button on" title="Update profile"><span class="icon icon4"></span><span>Update Profile</span></a>
            </div>
            <br/>
            <div id="addContainer" class="grid_2">
                <a href="#" class="button on" title="Add event"><span class="icon icon3"></span><span>New Event</span></a>
            </div>
            <div id="eventForm" class="grid_14 alpha">
                <?php
                    echo form_open('');
                ?>
                 <input type="text" name="title" id="title" placeholder="Title" value="" />
                 <br/>
                 <input type="text" name="title" id="title" placeholder="Location" value=""/>
                 <br/>
                 <input type="text" name="startTime" id="startTime" placeholder="Start Time" value="" class="time" />
                 <label>to</label>
                 <input type="text" name="endTime" id="endTime" placeholder="End Time" value="" class="time" />
                 <br/>
                 <?php
                    echo form_textarea(array('name'=>'description', 'id'=>'description', 'placeholder'=>'Description'));
                    echo "<br/>";
                    $attributes=array('id'=>'submit', 'name'=>'create', 'value'=>'Create');
                    echo form_submit($attributes);
                    echo form_close();
                ?>
            </div>
            <div id="EventsHeader" class="grid_16 push_6">
                <h2>My Events!</h2>
            </div>
            <div class="dayContainer grid_16">
                <span><b>Friday Jan 2200</b></span>
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
                            <li><b>Host: </b>Jason Derouloux</li>
                            <li><b>Where: </b>Wherever you want</li>
                            <li><b>When: </b>12:00-16:00</li>
                            <li><b>Description:</b>psum is that it has a more-or-less normal distribution of letters,
                                as opposed to using 'Content here, content here', making it look like readable English.
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default
                                model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                Various versions have evolved over the years, someti</li>
                        </ul>
                    </div>
                </div>
                <div class="commandContainer grid_1 alpha">
                     <a href="#" class="button on" title="Edit event"><span class="icon icon145"></span></a>
                </div>
            </div>
           <div class="event grid_16">
                <div class="styleContainer grid_2 alpha">
                     <span>18:00-19:00</span>
                </div>
                <div class="eventContainer grid_13 alpha">
                    <p class="title">Lorem Ipsum is simply dummy text of the printing and typesettin</p>
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
                    <span>20:00-23:00</span>
                </div>
                <div class="eventContainer grid_13 alpha">
                    <p class="title">leap into electronic typesetting, remaining essentially unchanged. It was popularised
                        in the 1960s with the release of Letraset sheets conta</p>
                    <div class="content">
                        <ul>
                            <li><b>Host: </b>Jason Derouloux</li>
                            <li><b>Where: </b>Wherever you want</li>
                            <li><b>When: </b>12:00-16:00</li>
                            <li><b>Description:</b>psum is that it has a more-or-less normal distribution of letters,
                                as opposed to using 'Content here, content here', making it look like readable English.
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default
                                model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                Various versions have evolved over the years, someti</li>
                        </ul>
                    </div>
                </div>
                <div class="commandContainer grid_1 alpha">
                     <a href="#" class="button on" title="Edit event"><span class="icon icon145"></span></a>
                </div>
            </div>
            <div class="dayContainer grid_16">
                <span><b>Friday Jan 2200</b></span>
            </div>
            <div class="event grid_16">
                <div class="styleContainer grid_2 alpha">
                    <span>12:00-16:00</span>
                </div>
                <div class="eventContainer grid_13 alpha">
                    <p class="title">Richard McClintock, a Latin professor at Hampden-Sydney College in </p>
                    <div class="content">
                        <ul>
                            <li><b>Host: </b>Jason Derouloux</li>
                            <li><b>Where: </b>Wherever you want</li>
                            <li><b>When: </b>12:00-16:00</li>
                            <li><b>Description:</b>psum is that it has a more-or-less normal distribution of letters,
                                as opposed to using 'Content here, content here', making it look like readable English.
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default
                                model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                Various versions have evolved over the years, someti</li>
                        </ul>
                    </div>
                </div>
                <div class="commandContainer grid_1 alpha">
                     <a href="#" class="button on" title="Edit event"><span class="icon icon145"></span></a>
                </div>
            </div>
            <div class="event grid_16">
                <div class="styleContainer grid_2 alpha">
                    <span>16:00-22:00</span>
                </div>
                <div class="eventContainer grid_13 alpha">
                    <p class="title">There are many variations of passages of Lorem Ipsum available, but the majority have suffered
                        alteration in some fo</p>
                    <div class="content">
                        <ul>
                            <li><b>Host: </b>Jason Derouloux</li>
                            <li><b>Where: </b>Wherever you want</li>
                            <li><b>When: </b>12:00-16:00</li>
                            <li><b>Description:</b>psum is that it has a more-or-less normal distribution of letters,
                                as opposed to using 'Content here, content here', making it look like readable English.
                                Many desktop publishing packages and web page editors now use Lorem Ipsum as their default
                                model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy.
                                Various versions have evolved over the years, someti</li>
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