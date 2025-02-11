<?php
echo "-------------START HERE-----------". PHP_EOL;
$var = "Bob";
$Var = "Joe";

echo "$var, $Var" . PHP_EOL;


$_4site = "no yet";

$taiyte = "mansikka";

// obscure variable names
// variables are assigned by value
${"invalid-name"} = "bar";
$name = "invalid-name";
echo ${'invalid-name'}, " ", $$name . PHP_EOL;



// $foo = "Bob";
// $bar = &$foo; // reference $foo via $bar 
// $bar = "My name is $bar"; // alter $bar
//echo $bar . PHP_EOL;
// echo $foo . PHP_EOL; // $foo is altered too.


// only variables may be assigned by reference
// $foo = 25;
// $bar = &$foo;
// $bar = &(24 * 7); // experssion

/*function test() {
  return 25;
}
 */

// $bar = &test(); // func don't return varables by reference

// arrays allow autovivification from an undefined variable.
// auto creation of new arrays)

$unset_array[] = "value"; //doesn't generate a warning

// superglobals are predefined variables

// scope of a variable - context of def

$a = 1;
// include "b.inc"; // variable $a will be available within b.inc

$a = 1;

/*
function test() {
  echo $a; // variable $a is undefined as it refers to a local variable version of $a
}
 */ 

$a = 1;
$b = 2;

function sum() {
  global $a, $b;
  return $b = $a + $b;
}


echo "-------START HERE FOR SCOPE----------" . PHP_EOL;

// echo sum();
// echo $b;


// using te $GLOBALS array 
// assoc array - name of glob var - key, contents - value;
function sum2() {
  $GLOBALS["b"] = $GLOBALS["a"] + $GLOBALS["b"];
}


sum2();
// echo $b;

function test_superglobal() {
  echo $_POST["name"];
}

function test() {
  static $a = 0;
  echo $a;
  $a++;
}

// test();


function test2() {
  static $count = 0;
  $count++;
  echo $count;
  if ($count < 10) {
    test();
  }
  $count--;
}
echo "Answer test2()" . PHP_EOL;
test2();


/*
function foo() {
  // static $int = 0;
  // static $int = 1 + 2;
  static $int = sqrt(121);

  $int++;
  echo $int;
}
 */

function exampleFunction($input) {
  $result = (static function () use ($input) {
    static $counter = 0;
    $counter++;
    return "$input, Counter: $counter\n";
  });

  return $result();
}

echo exampleFunction("A"); // outputs: input: A, counter: 1 
echo exampleFunction("B"); // outputs: input: B, counter: 1


// static variables behave like static props

/*
class Foo {
  public static function counter() {
    static $counter = 0;
    $counter++;
  return $counter;
  }
}

class Bar extends Foo {}
var_dump(Foo::counter());
var_dump(Foo::counter());
var_dump(Bar::counter());
var_dump(Bar::counter());
 */




function test_global_ref() {
  global $obj;
  $new = new stdClass;
  $obj = &$new;
}

function test_global_noref() {
  global $obj;
  $new = new stdClass;
  $obj = $new;
}

test_global_ref();
var_dump($obj);
test_global_noref();
var_dump($obj);

// references with global and static vars
function &get_instance_ref() {
  static $obj;

  echo "Static object: " ;
  var_dump($obj);
  if (!isset($obj)) {
    $new = new stdClass;
    // Assign a new ref to the static var 
    $obj = &$new;
  }

  if (!isset($obj->property)) {
    $obj->propety = 1;
  }
  else {
    $obj->property++;
  }
  return $obj;
}

function &get_instance_noref() {
  static $obj;

  echo "Static objct: ";
  var_dump($obj);
  if (!isset($obj)) {
    $new = new stdClass;
    // assign the obj to the static var 
    $obj = $new;
  }

  if (!isset($obj->property)) {
    $obj->property = 1;
  }
  else {
    $obj->property++;
  }
  return $obj;
}


$obj1 = get_instance_ref();
$still_obj1 = get_instance_ref();
echo "\n";
$obj2 = get_instance_noref();
$still_obj2 = get_instance_noref();


var_dump($still_obj2);

// variable varialble names 

$a = "hello";
$$a = "world";

echo "$a {$$a}". PHP_EOL; // or 
echo "$a " , $$a . PHP_EOL;
echo "$a $hello";


// ${$a[1]}; // char at index 1 in var a as var (e as var)
// echo ${$a}[1]; // index from the variables output : 0

echo "----------START HERE-------------". PHP_EOL;



class Foo {
  public $bar = "I am bar.";
  public $arr = ["I am A.", "I am B.", "I am C."];
  public $r = "I am r.";
}

$foo = new Foo();

$bar = "bar";
$baz = ["foo", "bar", "baz", "quux"];
echo $foo->$bar . "\n";
echo $foo->{$baz[1]} . "\n";

$start = "b";
$end = "ar";

echo $foo->{$start . $end} . "\n";

$arr = "arr";
echo $foo->{$arr[1]} . "\n"; 
echo $foo->{$arr}[1] . "\n";

// variables from external sources 
// html forms get and post 
















?>
