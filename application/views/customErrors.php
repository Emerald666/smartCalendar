<?php

if($errorNumber==1){
    echo "<div id=\"errors\"><p>Dates are invalid</p></div>";
}
else if($errorNumber==2){
    echo "<div id=\"errors\"><p>Can't create event in the past</p></div>";
}
else if($errorNumber==3){
    echo "<div id=\"errors\"><p>start time can't be bigger than end time</p></div>";
}
else if($errorNumber==4){
    echo "<div id=\"errors\"><p>Ypur key is invalid</p></div>";
}
else if($errorNumber==-1){
     echo "<div id=\"success\"><p>Event successfully added</p></div>";
}else{
    echo "<div id=\"errors\"><p>Unknown error !</p></div>";
}

?>
