<?<?php 

  $keyword = $_POST['search'];

  $con=mysqli_connect("149.4.211.180","ramd2811","23472811","ramd2811");

  if (mysqli_connect_errno()){

    echo "Failed to connect to MySQL: " . mysqli_connect_error();

  }

  $searchqueary = ("SELECT url , description, title
      FROM page, word, page_word WHERE 
      page.page_id = page_word.page_id AND 
      word.word_id = page_word.word_id AND 
      word.wordName LIKE '%".$keyword. "%'
      ORDER BY freq DESC");

  $result = mysqli_query($con,$searchqueary);

  echo "<table border='1'><tr><th>URL</th></tr><br>";

  while($row = mysqli_fetch_assoc($result)){
    $url = $row['url'];
    echo "<h2><a href=".$url. " target='_blank'>keyword Search: ".$keyword."</a><h2>";
    echo "<h5>Page Tittle: ".$row['title']. "<br></h5>";
    echo "Page Description: ".$row['description']. "<br>";
  }
  
  echo "</table>";

  mysqli_close($con);

 ?>