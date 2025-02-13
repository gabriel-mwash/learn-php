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

// arrays and objects 
foreach ($arr1 as $key => $value) {
  echo "{$key} => {$value} ";
  print_r($arr1);
}

echo "check this one \n";
print_r($arr1);

$a = array(1, 2, 3, 17);

foreach ($a as $v) {
  echo "current value of \$a: $v.\n";
}

$a = array(1, 2, 3, 17);
$i = 0;
foreach ($a as $v) {
  echo "\$a[$i] => $v.\n";
  $i++;
}

$a = array(
  "one" => 1,
  "two" => 2,
  "three" => 3,
  "seventeen" => 17
);

foreach ($a as $k => $v) {
  echo "\$a[$k] => $v.\n";
}

foreach (array(1, 2, 3, 4, 5) as $v) {
  echo "$v\n";
}



// nested arrays (Multi -d arrasy)
$array = [
  [1, 2],
  [3, 4],
];

foreach ($array as list($a, $b)) {
  echo "A: $a, B: $b\n";
}

// break statement
$arr = array("one", "two", "three", "stop", "five");
foreach ($arr as $val) {
  if ($val == "stop") {
    break;
  }
  echo "$val<br>\n";
}

$i = 0;
while (++$i) {
  switch ($i) {
    case 5:
      echo "At 5 <br> \n";
    case 10:
      echo "At 10; qutting <br> \n";
      break 2; //exit the switch and while
    default:
      break;
  }
}


// continue 

$arr = ["zero", "one", "two", "three", "four", "five", "six"];

foreach ($arr as $key => $value) {
  if (0 === ($key % 2)) {
    continue;
  }
  echo $value . "\n";
}


$i = 0;
while ($i++ < 5) {
  echo "outer\n";
  while (1) {
    echo "middle\n";
    while (1) {
      echo "Inner\n";
      continue 3;
    }
    echo "this never gets output.\n";
  }
  echo "neither does this. \n";
}










































































































































?>
