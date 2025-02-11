<?php

$var = NULL;

$foo = true;

if ($foo) {
  echo "the truth value is true";
}
/*
var_dump((bool) "");
var_dump((bool) "0");
var_dump((bool) 1);
var_dump((bool) -2);
var_dump((bool) "foo");
var_dump((bool) 2.3e5);
var_dump((bool) array(12));
var_dump((bool) array());
var_dump((bool) "false");
 */

$x = true;
$y = false;

$z = $y OR $x;

var_dump((bool) $z);

$z = $y || $x;
var_dump((bool) $z);

$z = ($y or $x);
var_dump((bool) $z);


$a = 1234; //decimal
$b = 0123; // octal number (equiv = 83 dec)
$d = 0x1A; // hexadecimal number (equv = 26 dec)
$e = 0b11111111;
$f = 1_234_567; //dec as of v7.4.0)

$large_number = 50000000000000000000000000000000;
var_dump($large_number);


var_dump(PHP_INT_MAX + 1);

var_dump(25/7);
var_dump((int) (25/7));
var_dump(round(25/7));


function foo($value): int {
  return $value;
}

var_dump(foo(8.1));
var_dump(foo(8.0));
var_dump((int) 8.1);
var_dump(intval(8.1));
var_dump(foo(8.1));

// type juggling 
// if one is float, so too are the rest int, otherwise ints 
//
// TYPE CASTING


$foo = 10; // $foo is an int
$bar = (bool) $f00;  // $bar is a bool; //value is casted to the type in 
// brackets

echo "---------------START HERE---------------"  . PHP_EOL;
$binary = (binary) $string;
$binary = b"binary string";

$foo = 10;
$str = "$foo";
$fst = (string) $foo;

if ($fst === $str) {
  echo "they are the same" . PHP_EOL;
}


$a = "car";
$a[0] = "b";
echo $a;
























?>
