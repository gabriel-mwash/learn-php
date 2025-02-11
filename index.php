<!DOCTYPE html>
<html>
<head>
  <title>php test</title>
</head>
<body>
<b>
  <?php
  echo "hello there, serving directly from apache web server\n";
  echo $_SERVER["HTTP_USER_AGENT"];
  if (str_contains($_SERVER["HTTP_USER_AGENT"], 'Chrome')) {
  ?>
<h3>str_contains() returend true </h3>
<p>You are using firefox </p>

<?php
  } else {
?>
<h3>str_contains() return false </h3>
<p> you are not using firefox </p>
<?php
  }
?>
</body>
</html>
