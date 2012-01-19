<?php

   if (empty($daily_events ))
        {
            echo "<h4>No events</h4>";
            exit ();
        }

      
        echo "Events <br/><br/>";
        //var_dump($daily_events);

        foreach ($daily_events as $day=>$events){
            echo "<br/>".$day , "<br/>";


            echo "<table border='1'>
              <tr>
              <th>id</th>
              <th>title</th>
              <th>startTime</th>
            

              </tr>";
           // var_dump($events);

           foreach ($events as $row)
            {
                  echo "<tr>";
                  echo "<td>" . $row['id'] . "</td>";
                  echo "<td>" . htmlspecialchars ($row['title']) . "</td>";
                  echo "<td>" . date ("F j, Y, g:i a",$row['startTime']) . "</td>";
                  echo "</tr>";
            }

            echo "</table>";

        }




?>

