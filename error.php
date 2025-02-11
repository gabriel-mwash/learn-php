<?php 


// @ supresses any diagn error gen by the expression

$my_file = @file("non_existent_file") or 
  die("Failed opening file: erroe was '" .
  error_get_last()["message"] . "'");


// this works for any expression ,not just functions:
$value = @$cache[$key];

// will not issue a notice if the index $key doesn't exist.
// @ on expressions only ie var, fun calls, cert lang constructs include




?>
