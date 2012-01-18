<?php

   if (empty($events ))
        {
            echo "<h4>No events</h4>";
            exit ();
        }

      
        echo "Events <br/><br/>";


        foreach ($daily_events as $day=>$events){
            echo $day , "<br/>";
            
            
            echo "<table border='1'>
              <tr>
              <th>id</th>
              <th>title</th>
              <th>Location</th>
              <th>startTime</th>
              <th>End Time</th>
              
              </tr>";

           foreach ($events as $row)
            {
                  echo "<tr>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . htmlspecialchars ($row['title']) . "</td>";
                   echo "<td>" . htmlspecialchars ($row['location'],ENT_QUOTES ) . "</td>";
                    echo "<td>" . date ("F j, Y, g:i a",$row['startTime']) . "</td>";
                    echo "<td>" . date ("F j, Y, g:i a", $row['endTime']) . "</td>";
                  echo "<td>" . nl2br(htmlspecialchars ($row['description'],ENT_QUOTES )) . "</td>";
                  echo "</tr>";
            }

            echo "</table>";
            
        }




?>

