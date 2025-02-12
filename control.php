<?php

// if (expr)
//  statement 


if ($a > $b) {
  echo "a is bigger than b";
  $b = $a;
}
else {
  echo "a is not bigger than b";
}

$a = false;
$b = true;

if ($a) 
  if ($b) 
    echo "b";
  else 
    echo "c";



if ($a > $b) {
  echo "a is bigger than b";
}
elseif ($a == $b) {
  echo "a is equal to b";
}
else {
  echo " a is smaller than b";
}


// when using a colon to define if/elseif condiions use elseif in a 
// single word 


if ($a > $b):
  echo $a. "is greater than " .$b;
elseif ($a == $b):
  echo "The above line does not causes a parse error.";
endif;

// while, if, for, foreach, and switch 

// while (expr)
//  statement 



$i = 1;
while ($i <= 10) {
  echo $i++;
}


$i = 1;
while ($i <= 10){
  echo $i;
  $i++;
}

echo "===do while \n";
$i = 0; 
do {
  echo $i;
}
while ($i > 0);

do {
  if ($i < 5) {
    echo "i is not big enough";
    break;
  }
  $i *= $factor;
  if ($i < $minimum_limit) {
    break;
  }
  echo "i is ok";
}
while (0);

// for (expr1; expr2; expr3)
//  statement 

for ($i = 1; $i <= 10; $i++) {
  echo $i;
}

for ($i = 1; ;$i++) {
  if ($i > 10) {
    break;
  }
  echo $i;
}

$i = 1;
for (; ; ) {
  if ($i > 10) {
    break;
  }
  echo $i;
  $i++;
}
echo "check four \n";
for ($i = 1; $i <= 10; print $i, $i++);

// iterating arrays 

$people = array(
  array("name" => "kalle", "salt" => 856412),
  array("name" => "Pierre", "salt" => 215863)
);

/*
for ($i = 0; $i < count($people); ++$i) {
  $people[$i]["salt"] = mt_rand(000000, 999999);
}
 */



$people = array(
  array("name" => "kalle", "salt" => 856412),
  array("name" => "Pierre", "salt" => 215863)
);
/*
for ($i = 0, $size = count($people); $i < $size; ++$i) {
  $people[$i]["salt"] = mt_rand(000000, 999999);
}
 */

// foreach (iterable_expression as $value)
//  statement 
// foreach (iterable_expression as $key => $value)
//  statement 

$arr = array(1, 2, 3, 4);

foreach ($arr as &$value) {
  $value = $value * 2;
}

unset($value);
echo "============star here \n";
$arr1 = array(1, 2, 3, 4);
foreach ($arr1 as &$value) {
  $value = $value * 2;
}


foreach ($arr1 as $key => $value) {
  echo "{$key} => {$value}";
  print_r($arr1);
}




















































































































































?>
