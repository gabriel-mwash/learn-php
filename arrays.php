<?php
/*
array(
  key => value,
  key2 => value2,
  key3 => value3,
  ...
);

 */ 
// language construct
$array = array(
  "foo" => "bar",
  "bar" => "foo",
);


// use the short array syntax
// key can either be a str or int
$array1 = [
  "foo" => "bar",
  "bar" => "foo",
  ];

$array2 = array(
  1 => "a",
  "1" => "b",
  1.5 => "c",
  true => "d",
);

var_dump($array2);


$array3 = array(
  "foo" => "bar",
  "bar" => "foo",
  100 => -100,
  -100 => 100,
);

var_dump($array3);


$array4 = array("foo", "bar", "hello", "world");
var_dump($array4);

$array5 = array(
  "a",
  "b",
  6 => "c",
  "d",
);

var_dump($array5);


$array6 = array(
  1 => "a",
  "1" => "b",
  1.5 => "c",
  -1 => "d",
  "01" => "e",
  "1.5" => "f",
  true => "g",
  false => "h",
  "" => "i",
  null => "j",
  "k",
  2 => "l",
);


var_dump($array6);


$array7 = [];

$array7[-5] = 1;
$array7[] = 2;

var_dump($array7);


$array8 = array(
  "foo" => "bar",
  42 => 24,
  "multi" => array(
    "dimensional" => array(
      "array" => "foo"
    )
  )
);


var_dump($array8["foo"]); //bar
var_dump($array8[42]); // 24,
var_dump($array8["multi"]["dimensional"]["array"]); // foo


// array deferencing 
function getArray() {
  return array(1, 2, 3);
}

$secondElement = getArray()[1];
echo $secondElement;

//  $arr[key] = value;
//  $arr[] = value;
//

$array9 = array(5 => 1, 12 => 2);

$array9[] = 56; // adds a new element

$array9["x"] = 42; // adds a new element to the array with key x

unset($array9[5]); // removes the element from the array

unset($array9); // deletes the whole array

var_dump($array9);


// create a simple array
$array10 = array(1, 2, 3, 4, 5);
print_r($array10);

// now del every item, but leave the array intact
foreach ($array10 as $i => $value) {
  unset($array10[$i]);
}

print_r($array10);

// append an item ( note that the new key is 5, instead of 0)

$array10[] = 6;
print_r($array10);

// re-index we don't loose count of the index (keys) even when we delete the values of the array

$array10 = array_values($array10);
$array10[] = 7;
print_r($array10);

// array destructuring - into distinct variables 

$source_array = ["foo", "bar", "baz"];

[$fo, $ba, $bz] = $source_array;
/*
echo $fo;
echo $ba;
echo $bz;
 */

// destructuring a multidimensional array

$source_array1 = [
  [1, "john"],
  [2, "jane"],
];


// foreach specifically for traversing arrays easily
foreach ($source_array1 as [$id, $name]) {
  print_r("hello " . $name . ", Your id is " . $id . PHP_EOL);
}

// destructuring starts at 0
// arr elements are ignored if variable ain't provided 

$source_array2 = ["foo", "bar", "baz"];

[, , $bz] = $source_array2;

echo $bz . PHP_EOL; // baz

// array destructuring can be used to swap values 

$a = 1;
$b = 2;

[$b, $a] = [$a, $b];

echo $a . PHP_EOL;
echo $b . PHP_EOL;

// arrays with functions

$array11 = array(1 => "one", 2 => "two", 3 => "three");
unset($array11[2]); // produces an array ( 1 => "one", 3 => "three");
// not (1 => "one", 2 => "three");

$array11b = array_values($array11);// re-indexes the araray
print_r($array11b);


// quote keys ,though not always 

error_reporting(E_ALL);
ini_set("display_errors", true);
ini_set("html_errors", false);
// simple array; 

$array12 = array(1, 2);
$count = count($array12);

for ($i = 0; $i < $count; $i++) {
  echo "\nChecking $i : \n";
  echo "bad: " . $array12["$i"] . "\n";
  echo "good: " . $array12[$i] . "\n";
  echo "bad: {$array12["$i"]}\n";
  echo "good:{$array12[$i]}\n";
}


// show all errors 
error_reporting(E_ALL);

$array13 = array("fruit" => "apple", "veggie" => "carrot");

// correct 
print $array13["fruit"];
print $array13["veggie"];

// incorrect, works but also throws a phperror 
// undefined constant fruit E_NOTICE

// print $array13[fruit];

define("fruit", "veggie");


print $array13["fruit"];
print $array13[fruit];

print "Hello {$array13[fruit]}";
print "Hello {$array13["fruit"]}";

// print "Hello $array13['fruit']"; // doesn't work

// concatenation instead 
print "Hello " . $array13["fruit"]; 

// converting to array
// object to array
// an array whose elements are object's properties
// keys are the member variable names, 
// private variables have class names prepended to the variable name,
// protected vars have a "*" prepended to the variable name.
// prepended values have nul bytes on either sides.
class A {
  // private $B;
  protected $C;
  public $D;
  function __construct()
  {
    $this->{1} = null;
  }
}

var_export((array) new A());


// comparing arrays with arry_diff() and array operators
// array unpacking using ... operator
$array14 = [1, 2, 3];
$array15 = [...$array14]; //[1, 2, 3]
$array16 = [0, ...$array14]; // [0, 1, 2, 3]
$array17 = [...$array14, ...$array15, 111]; // [1, 2, 3, 1, 2, 3, 111]
$array18 = [...$array14, ...$array14]; // [1, 2, 3, 1, 2, 3]

function getArr() {
  return ["a", "b"];
}

$array19 = [...getArr(), "c" => "d"]; // ["a", "b", "c" =>"d"]

print_r($array19);


// array unpaking with duplicate key 
// string key
$arr1 = ["a" => 1];
$arr2 = ["a" => 2];
$arr3 = ["a" => 0, ...$arr1, ...$arr2];
var_dump($arr3); // ["a" => 2];


//integer key
$arr4 = [1, 2, 3];
$arr5 = [4, 5, 6];
$arr6 = [...$arr4, ...$arr5];
var_dump($arr6); // [1, 2, 3, 4, 5, 6]

$arr7 = [1, 2, 3];
$arr8 = ["a" => 4];
$arr4 = [...$arr7, ...$arr8];
var_dump($arr4);

// versatality of array type

$a = array(
  "color" => "red",
  "taste" => "sweet",
  "shape" => "round",
  "name"  => "apple",
  4, // with key of 0
);

$b = array("a", "b", "c");

// . . . is completely equivalent with this:
$a = array();
$a["color"] = "red";
$a["taste"] = "sweet";
$a["shape"] = "round";
$a["name"] = "apple";
$a[] = 4; // with key of 0

$b = array();
$b[] = "a";
$b[] = "b";
$b[] = "c";


// using array()


$map = array(
  "version" => 4,
  "os" => "GNU/linux",
  "lang" => "english",
  "short_tags" => true,
);

// strictly numerical keys 
$array = array(7, 8, 0, 156, -10);

// this is the sme as array ( 0 => 7, 0 => 8....);


$switching = array(
  10, // key is also 0
  5 => 6,
  3 => 7,
  "a" => 4,
  11, // key = 6 maximum integer-indices was 5)
  "8", 2, // key = 8 (integer!)
  "02" => 77, // key = '02' 
  0 => 12 // the value 10 will be overwritten by 12

);

// empty array 
$empty = array();


// collection 
$colors = array("red", "blue", "green", "yellow");

foreach ($colors as $color) {
  echo $color. PHP_EOL;
}


// we can change the value of an array by passing them by 
// reference
// &$varaible - this alters the original value of the array and as a consequnce alters the array 
// passing by value alters a copy of the elements in the array, not the values themselves.


foreach ($colors as &$color) {
  $color = mb_strtoupper($color);
}


print_r($colors);


// print mb_strtoupper("gabriel");


$firstquarter = array(
  1 => "january",
        "february",
        "march",
);

print_r($firstquarter);

// fill an array with all items from a directory
$handle = opendir("/home/gabu/code");

while ( false !== ($file = readdir($handle))) {
  $files[] = $file;
}

closedir($handle);

print_r($files);


// sorting an array 


sort($files);
print_r($files);

// mutlidimensional / recursive arrays 

$fruits = array(
  "fruits" => array(
    "a" => "orange",
    "b" => "banana",
    "c" => "apple",
  ),
  "numbers" => array(
    1, 2, 3, 4, 5, 6),
  "holes" => array(
    "first",
    5 => "second",
    "third"
  )
);

echo $fruits["holes"][5]; // print second 
echo $fruits["fruits"]["a"]; // print orange
unset($fruits["holes"][0]); // first

// create a new multi-dimensional array 
$juices["apple"]["green"] = "good";

print_r($juices); // ("apple" => array( "green" => "good");

// array assignment will involve value copying 

$arr1 = array(2, 3);
$arr2 = $arr1;
$arr2[] = 4; // $arr2 is changed 
// arr1 is still array(2, 3)

$arr3 = &$arr1;
$arr3[] = 4; // now $arr1 and $arr3 are the same


echo "this is array 2 and 3 \n";
print_r($arr2);
print_r($arr3);



$myarray = [];

$myarray["product"] = "fish";

print_r($myarray);











?>
