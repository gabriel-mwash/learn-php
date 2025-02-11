<html>
  <head>
    <title>forms in php</title>
  </head>
  <body>
    <form action="data.php" method="post">
      Name : <input type="text" name="username"></input> <br>
      Email: <input type="text" name="email"></input> <br>
      <input type="submit" name="submit" value="submit me"></input>
    </form>
  </body>
</html>


<?php

// only two methods for accessing data from html forms
// global variables post and request 
//
// dots and spaces in varnames are conv to underscores, a.b -> a_b

?>
