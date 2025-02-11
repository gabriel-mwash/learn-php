<?php


// scalar value types - can't be broken down further
// int, fp, string, boolean
//
// composite value types - non scalar ie arrays and objects


// comparison expressions - false or true

// ++value, php increments var before reading its val pre increme
// value++, php increments var after reading its val- post increme

// ternary condition operator 

$first ? $second : $third;
// if first subexp is true, evaluate it ,otherwise eval the 3rd


function double($i) {
  return $i * 2;
}

$b = $a = 5; // assign 5 to b and c var
$c = $a++; // post-incre , assign original val to c , c = 5, a = 6

$e = $d = ++$b; // pre-inc, assign the inc val of $b to e and d ie 6


$f = double($d++); //post incr, pass orign value of f as param and inc later ie f= 12 (6 * 2)

$g = double(++$e); // pre-inc, pass the inc val of e as param, 7 ie g= 14 (7 * 2)

$h = $g += 10;
// expressions can be auto converted to bollean values true or false;
?>
