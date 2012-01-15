<?php

        if (empty($events ))
        {
            echo "<h4>Results</h4>";
            echo "<p>Sorry, your search: &quot;" . $trimmed . "&quot; returned zero results</p>";
            exit ();
        }

        // display what the person searched for
        //echo "<p>You searched for: &quot;" . $search . "&quot;</p>";

        // begin to show results set
        echo "Results <br/>";


         echo "<table border='1'>
              <tr>
              <th>id</th>
              <th>title</th>
              <th>Location</th>
              <th>startTime</th>
              <th>End Time</th>
              <th>Description</th>
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

?>
