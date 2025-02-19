<?php
/*
function foo($arg_1, $arg_2) {
  echo "Example function \n";
  return $retval;
}

$makefoo = true;

bar();

if($makefoo) {
  function foo() {
    echo "I dont exist until program execution reaches me.\n";
  }
}

if ($makefoo) foo();

function bar(){
  echo "I exist immediately  upon program starts.\n";
}

// functions within functions

function foo() {
  function bar() {
    echo "I dont exist until foo() is called.\n";
  }
}

foo();
bar();
*/


// recursive functions 
function recursion($a) {
  if ($a < 20) {
    echo "$a\n";
    recursion($a + 1);
  }
}

recursion(1);

// function params and args
// eager eval - asses the value of args b4 calling func

function takes_array($input) {
  echo "$input[0] + $input[1] = ", 
    $input[0] + $input[1];
}


takes_array([3, 4, 5]);


function takes_many_args (
  $first_arg,
  $second_arg,
  $a_very_long_arg_name,
  $arg_with_default = 5,
  $again = " a default string",
) {
  // do something
}

// passing args by value - defualt behavior
// val of args don't outside func, but only inside func

// pass by reference &$param

function add_some_extra(&$string) {
  $string .= "and something extra.";
}


$str = "this is a string, ";
add_some_extra($str);
echo $str;


// default param values, maybe scalar vals, arrays,null, obj using
// newclassname() syn
/*
function makecoffee($type = "cappuccino") {
  return "make a cup of $type.\n";
}


echo makecoffee();
echo makecoffee(null);
echo makecoffee("espresso.");


// using objects as default vals 

 */
class DefaultCoffeeMaker {
  public function brew() {
    return "Making coffee.\n";
  }
}


class FancyCoffeeMaker {
  public function brew() {
    return "crafting a beautiful coffee just for you.\n";
  }
}


function makecoffee($coffeeMaker = new DefaultCoffeeMaker) {
  return $coffeeMaker->brew();
}

echo makecoffee();
echo makecoffee(new FancyCoffeeMaker);


// check the placements of params
// function makeyogurt($container = "bowl", $flavour) {
function makeyogurt($flavour, $container = "bowl") {
  return "Making a $container of $flavour yogurt.\n";
}

echo makeyogurt("raspberry");

// declaring optional params after mandatory params 

//function foo($a = [], $b) {};
// recommended 

// don't understand 
// function bar(?A $a, $b) {};


// using ... token to access var arguments 

function sum(...$numbers) {
  $acc = 0;
  foreach($numbers as $n) {
    $acc += $n;
  }
  return $acc;
}

echo sum(1, 2, 3, 4);

// also be used to traverse a var or unpack an array 

function add($a, $b) {
  return $a + $b; 
}


echo add(...[1, 2])."\n"; // same, but it traverses too
$a = [1, 2];

echo add(...$a); // unpacking an array


// type declared var args
// args should match the type of param
echo "start here ------------\n";
function total_intervals($unit, DateInterval ...$intervals) {
  $time = 0;
  foreach ($intervals as $interval) {
    $time += $interval->$unit;
  }
  return $time;
}


$a = new DateInterval("P1D");
$b = new DateInterval("P2D");
echo total_intervals("d", $a, $b). " days";


// echo total_intervals("d", null);

//named args
myFunction(paramName: $value);
function array_foobar(array: $value){
  // do something
}

// example 15










?>

