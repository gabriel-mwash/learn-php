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
// myFunction(paramName: $value);
// function array_foobar(array: $value){
//   // do something
// }

// example 15


// positional args v named args 


array_fill(0, 100, 50);


// using named args  - for which order doesn't matter

array_fill(start_index: 0, count: 100, value: 50);


// htmlspecialchars($string, double_encode: false);
// same as 

//htmlspecialchars($string, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401, "utf-8", false);


// function foo($param) {...} 

// foo(param: 1, param: 2);


// using named args after unpacking 

function foo($a, $b, $c = 3, $d = 4) {
  return $a + $b + $c + $d;
}


var_dump(foo(...[1, 2], d: 40)); // 46
var_dump(foo(...["b" => 2, "a" => 1], d: 40)); // 46

// var_dump(foo(...[1, 2], b:20));


// return - any type including arrays and obj

echo "start here return =========\n";
function square($num) {
  return $num * $num;
}

echo square(4);

// fun return one value; for multiple values, arrays is the way


function samll_numbers() {
  return [0, 1, 2];
}


[$zero, $one, $two] = samll_numbers();


// returning a reference
// use ref oper(&) in func decl, and assing the returned val to var;
function &returns_reference() {
//  return $someref;
}


// $newref = & returns_reference($someref);


// variable functions 
// a var with paranthesis appended to it is treated as a func


function foo1() {
  echo "in foo1()<br>\n";
}

function bar($arg="") {
  echo "In bar(); arg was '$arg'.<br>\n";
}


// this is a wrapper func around echo 

function echoit($string) {
  echo $string;
}


$func = "foo1";
$func();

$func = "bar";
$func("test");

$func = "echoit";
$func("test");


class foo3 {
  function Variable() {
    $name = "Bar";
    $this->$name();
  }

  function Bar() {
    echo "This is Bar";
  }
}


$foo4 = new Foo3();
$funcname = "Variable";

$foo4->$funcname();



class Foo5 {
  static $variable = "static property";
  static function Variable() {
    echo "method variable called";
  }
}

echo Foo5::$variable;
$variable = "Variable";
Foo5::$variable();


class Foo6 {
  static function bar() {
    echo "bar\n";
  }

  function baz() {
    echo "baz\n";
  }
}

$func = array("Foo6", "bar"); 
$func();

$func = array(new Foo6, "baz");
$func();

$func = "Foo6::bar";
$func();


// internal (built-in) functions 


// anonymous functions - closures 
// a func with no specified name 
// useful as the val of a callable param 


// echo preg_replace_callback('~~([a-z]~~', function ($match){
 //  return strtoupper($match[1]);
//}, "hello-world");
 

// outpouts helloWorld

// assigning a clouser to a variable as its value  


$greet = function($name) {
  printf("Hello %s\r\n", $name);
};

// in other words
function greet ($name) {
  printf("hello %s\r\n", $name);
};

$greet("World");
$greet("PHP");


// closures can inherit variables from the parent scope 
// var passed to use construct
// vars shouldn't include superglobals


$message = "hello";

// iherit message 
$example = function () use ($message) {
  var_dump($message);
};

$example();


// iherited variable's value is from when the func 
// is defined, not when called
$message = "world";
$example();

// reset message
$message = "hello";

// inherit by-reference
$example = function () use (&$message) {
  var_dump($message);
};

$example();



// the changed value in the parent scope 
// is reflected inside the func call
$message = "world";
$example();


// closuers can accept regular args 

$example = function ($args) use ($message) {
  var_dump($args . " " . $message);
};

$example("hello");

// return type declration comes after the use clause 

$example = function () use ($message): string {
  return "hello $message";
};

var_dump($example());


// example of closures and scoping 
// a basic shoppin cart which contains a list of adde prod 
// and the quantity of each prod, including a method which 
// calculates the total price of items in the cart using 
// a closure as a callback

class Cart {
  const PRICE_BUTTER = 1.00;
  const PRICE_MILK = 3.00;
  const PRICE_EGGS = 6.95;

  protected $products = array();

  public function add($product, $quantity) {
    $this->products[$product] = $quantity;
  }

  public function getQuantity($product) {
    return isset($this->products[$product]) ? 
      $this->products[$product] : false;
  }

  public function getTotal($tax) {
    $total = 0.00;
    $callback = function ($quantity, $product) 
      use ($tax, &$total)
    {
      $pricePerItem = constant(__CLASS__ . "::PRICE_" . 
        strtoupper($product));
      $total += ($pricePerItem * $quantity) * ($tax + 1.0);
    };

    array_walk($this->products, $callback);
    return round($total, 2);
  }
}

$my_cart = new Cart;

// add some items to the cart 

$my_cart->add("butter", 1);
$my_cart->add("milk", 3);
$my_cart->add("eggs", 6);

// print the total with a 5% sales tax 

print $my_cart->getTotal(0.05);


// automatic binding of $this 
// a method can return a closure

class Test {
  public function testing() {
    return function() {
      var_dump($this);
    };
  }
}

$object = new Test;
$function = $object->testing();
print_r($function);

// closusres are automatically bound to the current class
// making $this available inside the func's scope.

// static anonymous functions 
// prevents them from being automatically bound to them. 


// attempting to use $this inside a static anonymous func 


/*
class Foo7 {
  function __construct()
  {
    $func = static function() {
      var_dump($this);
    }; 
    $func();
  }
}

new Foo7();
 */


$func = static function() {
  // function body 
};

//$func = $func->bindTo(new stdClass);
// $func();


// arrow functions 

$y = 1;
$fn1 = fn($x) => $x + $y;

$fn2 = function($x) use ($y) {
  return $x + $y;
};

var_export($fn1(3));

// capture var by val automatically even when nested 

$z = 1;
$fn = fn($x)=>fn($y)=>$x * $y + $z;

var_export($fn(5)(10));

// values from outer scope cannot be modified by arrow funcs 

$x = 1;
$fn = fn() => $x++;
$fn();
var_export($x);


// first class callable syntax 
// a way to create anony func from callable 

class Foo {
  public function method() {}
  public static function staticmethod() {}
  public function __invoke() {}
}

$obj = new Foo();
$classStr = "Foo";
$methodStr = "method";
$staticmethodStr  = "staticmethod";

$f1 = strlen(...);
$f2 = $obj(...);
$f3 = $obj->method(...);
// $f4 = $obj->methodStr(...);
$f5 = Foo::staticmethod();
$f6 = $classStr::$staticmethodStr(...);

// traditional callable using string, array 
$f7 = 'strlen'(...);
$f8 = [$obj, 'method'](...);
$f9 = [Foo::class, 'staticmethod'](...);

// scope comparioson of callableExpr(...) and traditional callable
class Foo9 {
  public function getPrivateMethod() {
    return [$this, "privateMethod"];
  }

  private function privateMethod() {
    echo __METHOD__, "\n";
  }
}


$foo = new Foo9;
$privateMethod = $foo->getPrivateMethod();
$privateMethod();

// error, this is because call is performed outside from foo and visibility will be checked from this point.


class Foo10 {
  public function getPrivateMethod() {
    // uses the scope where the callable is acquired
    return $this->getPrivateMethod(...); // identical to closure::fromcallable([$this, 'privatemethod']);
  }

  private function privateMethod() {
    echo __METHOD__, "\n";
  }
}

$foo1 = new Foo10;
$privateMethod = $foo1->getPrivateMethod();
$privateMethod(); //foo1::privatemethod;
?>

