<?php
  $con=mysqli_connect("localhost","root","","phpCrawlerTutorial");

  if (mysqli_connect_errno())
  {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 

  $query = ("SELECT referer, title, description from pages");

  $result = mysqli_query($con,$query);
  echo "<table border='1'><tr><th>URL</th><th>Title</th><th>Description</th><th>lastIndexed</th><th>lastModified</th><th>timeToindex</th></tr>";

  while($row = mysqli_fetch_assoc($result))
  {

    $lastIndexed = date("Y/m/d");
    $timeToIndex = date('H:i:s');
    $lastModified = date("Y/m/d");

    $url = $row['referer'];
    $title = $row['title'];
    $description = $row['description'];
    if(is_null($url) || is_null($title) || is_null($description)){

    }
    else{
      echo "<tr>";
      echo "<td>" . $url . "</td>";
      echo "<td>" . $title. "</td>";
      echo "<td>" . $description . "</td>";
      echo "<td>" . $lastIndexed . "</td>";
      echo "<td>" . $lastModified . "</td>";
      echo "<td>" . $timeToIndex . "</td>";
      echo "</tr>";
       $sql = "INSERT INTO page (url, title, description, lastModified, lastIndexed, timeToindex)VALUES
    ('".$url. "','".$title."','".$description."','".$lastModified."','".$lastIndexed."','".$timeToIndex."') ";

      if (!mysqli_query($con, $sql)) {
        
      } 
    }

   

  }
  echo "</table>";

  mysqli_close($con);
?> 

