<?php

// $a = 3 * 3 % 5; // ( 3 * 3 ) % 5 = 4

use MyClass as GlobalMyClass;

($a = true ? 0 : true) ? 1 : 2;

// $a = 1;
// $b = 2;
// $a = $b += 3; // $a = ($b += 3) -> 5

echo "______START HERE________". PHP_EOL;
$a = 1;
echo $a + ++$a; //good one, pre-inc, we inc the var b4 reading its value

$i = 1;
$array[$i] = $i++;


$x = 4;

echo "x minus one equals" . $x -1 . ", or so I hope \n";

echo "x minus one equals " . ($x -1 ) . " or so I hope \n";

var_dump( 5 % 3);
var_dump( 5 % -3);
var_dump( -5 % 3);
var_dump( -5 % -3);

echo "Post-increment: ", PHP_EOL;
$a = 5;
var_dump($a++); //var is inc after reading its val
var_dump($a);

echo "Pre-increment:", PHP_EOL;
$a = 5;
var_dump(++$a); // post-inc, var is inc b4 reading its val
var_dump($a);


echo "Post-decrement: ", PHP_EOL;
$a = 5;
var_dump($a--); //var is dec after reading its val
var_dump($a);

echo "Pre-decrement:", PHP_EOL;
$a = 5;
var_dump(--$a); // post-inc, var is dec b4 reading its val
var_dump($a);

// inc non numeric strings


echo "== Alphabetic strings ==" . PHP_EOL;
$s = "W";
for ($n = 0; $n < 6; $n++) {
  echo ++$s . PHP_EOL;
}

// alphanumeric strings behave diff 
echo "== Alphanumeric strings ==" . PHP_EOL;
$d = "A8";
for ($n = 0; $n < 6; $n++) {
  echo ++$d . PHP_EOL;
}


$d = "A08";
for ($n = 0; $n < 6; $n++) {
  echo ++$d . PHP_EOL;
}

// if the numeric string will be interepreted as an num-string it will be casted to an int or float.
$s = "5d9";
var_dump(++$s);
var_dump(++$s);

echo "-----ASSIGNMNENTS START HERE-------", PHP_EOL;
$a = ($b = 4) + 5; // a = 9;

$a = 3;
$a += 5;

$b = "Hello";
$b .= "There!";

// assignmnt by reference

$a = 3;
$b = &$a; //$b is a reference to $a 

print "$a\n";
print "$b\n";

//in classes assin by reference 

class C {}

$o = new C;

echo "____BITWISE OPER_____\n";

$a = true;
$b = false;

echo $a | $b;


echo "_____comparison________\n";
$a == $b; // equal true if a is b after type juggling
$a === $b; // identical true if they are of same type

$a != $b; // not equal 
$a <> $b; // not equal

$a !== $b; // not identical in terms of type

$a > $b ; // greater than, true if a is greater than by
$a <= $b; // less than or equal to

$a >= $b; // true if a is equal to or greater than b

$a <=> $b; // spaceshift, an int less than, equal to, or greater than 
//zero when $a is less than, equal to, or greater than $b, respec

var_dump(0 == "a");
var_dump("1" == "01");
var_dump("10" == "1e1");
var_dump(100 == "1e2");

switch ("a") {
case 0:
  echo "0";
  break;
case "a":
  echo "a";
  break;
}

echo "_____beginning of spaceshift_______\n";
// integers 
echo 1 <=> 1, PHP_EOL; // 0
echo 1 <=> 2, PHP_EOL; // -1
echo 2 <=> 1, PHP_EOL; // 1

// floats 
echo 1.5 <=> 1.5, PHP_EOL; // 0
echo 1.5 <=> 2.5, PHP_EOL; // -1
echo 2.5 <=> 1.5, PHP_EOL; // 1

// strings 
echo "a" <=> "a", PHP_EOL; // 0
echo "a" <=> "b", PHP_EOL; // -1
echo "b" <=> "a", PHP_EOL; // 1

echo "a" <=> "aa", PHP_EOL; // -1
echo "zz" <=> "aa", PHP_EOL; // 1 

// arrays 
echo [] <=> [], PHP_EOL; // 0
echo [1, 2, 3] <=> [1, 2, 3], PHP_EOL; // 0
echo [1, 2, 3] <=> [], PHP_EOL; // 1
echo [1, 2, 3] <=> [1, 2, 1], PHP_EOL; // 1
echo [1, 2, 3] <=> [1, 2, 4], PHP_EOL; // -1

// objects 
$a = (object) ["a" => "b"]; 
$b = (object) ["a" => "b"];
echo $a <=> $b, PHP_EOL; // 0

$a = (object) ["a" => "b"]; 
$b = (object) ["a" => "c"];
echo $a <=> $b, PHP_EOL; // -1


$a = (object) ["a" => "c"];
$b = (object) ["a" => "b"];
echo $a <=> $b, PHP_EOL; // 1

// not only values are compared; keys must match 

$a = (object) ["a" => "b"];
$b = (object) ["b" => "b"];
echo $a <=> $b,"THIS ONE",  PHP_EOL; // 1*

echo "__________end of shiftspace________\n";

// bool and null are compared as bool always 
var_dump(1 == true);
var_dump(0 == false);
var_dump(100 < true);
var_dump(-10 < false);
var_dump(min(-100, -10, null, 10, 100));


function standard_array_compare($op1, $op2) {
  if (count($op1) < count($op2)) {
    return -1; // $op1 < $op2
  }
  elseif (count($op1) > count($op2)) {
    return ; // $op1 > $op2 
  }

  foreach ($op1 as $key => $val) {
    if (!array_key_exists($key, $op2)) {
      return 1;
    }
    elseif ($val < $op2[$key]) {
      return -1;
    }
    elseif ($val > $op2[$key]) {
      return 1;
    }
  }
  return 0; // $op1 == $op2 
}

// ternary operator 
$action = (empty($_POST["action"])) ? "default" : $_POST["action"];

// alternative 
if (empty($_POST["action"])) {
  $action = "default";
} else {
  $action = $_POST["action"];
}


// null coalescing operator ??


// example usage for : Null coalesce operator 
$action = $_POST["action"] ?? "default";

// the above is identical to this if/else statement 

if (isset($_POST["action"])) {
  $action = $_POST["action"];
}
else {
  $action = "default";
}

// print "Mr. " . $name ?? "Anonymous";
print "Mr. " . ($name ?? "Anonymous");

$foo = null;
$bar = null;
$baz = 1;
$qux = 2;

echo $foo ?? $bar ?? $baz ?? $qux;

// ERROR CONTROL
// @ supresses any diagn error gen by the expression

/*
$my_file = @file("non_existent_file") or 
  die("Failed opening file: error was '" .
  error_get_last()["message"] . "'");
 */


// this works for any expression ,not just functions:
$value = @$cache[$key];

// will not issue a notice if the index $key doesn't exist.
// @ on expressions only ie var, fun calls, cert lang constructs include


// execution operator - backtick ``
echo "\n---exe operators---- \n";

$output = `ls -al`;
echo "<prev>$output</prev>";


// logic 
$a = (false && foo());
$b = (true || foo());
$c = (false and foo());
$d = (true or foo());

$e = false || true; // e = (false || true)
$f = false or true; // (f = false) or true

var_dump($e, $f);

$h = true and false; // (h = true) and false 

$g = true && false; // g = (true && false);

var_dump($g, $h);

$a = "hello ";
$b = $a . "World!"; // now $b contains "Hello world!"

$a = "hello ";
$a .= "World"; // now $a contains "Hello world!"


// array types 

$a = array("a" => "apple", "b" => "banana");
$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");

$c = $a + $b; // Union of $a and $b
echo "Union of \$a and \$b: \n";
var_dump($c);


// check on type arrays, on their unions 


class myClass {

}

class NotMyclass {
}

$a = new myClass;

echo "__START HERE TYPE OPERATORS____\n";

var_dump( $a instanceof MyClass);
var_dump( $a instanceof NotMyclass);



// checking whether an obj is not an instance of a class 
// using the logical not operator

class myClass1 {
}

$a = new myClass1;
var_dump(!($a instanceof stdClass));

interface myInterface {

}

class myClass2 implements myInterface{

}

$a = new myclass2;

var_dump($a instanceof myclass2);
var_dump($a instanceof myInterface);

// using instanceof with other variables
echo "-------start here ======\n";
$b = new myclass2;
$c = 'myclass2';
$d = 'NotMyclass';

var_dump($a instanceof $b);
var_dump($a instanceof $c);
var_dump($a instanceof $d);

$a = 1;
$b = null;
// $c = imagecreate(5, 5);

var_dump($a instanceof stdClass);
var_dump($b instanceof stdClass);
var_dump($c instanceof stdClass);
var_dump($false instanceof stdClass);

var_dump(false instanceof stdClass);


class classA extends \stdClass {}
class classB extends \stdClass {}
class classC extends ClassB {}
class classD extends ClassA {}


function getSomeClass(): string {
  return classA::class;
}

echo "begin here ****\n";

var_dump(new classA instanceof ("std"."Class"));
var_dump(new classB instanceof ("Class"."B"));
var_dump(new classC instanceof ("Class"."A"));
var_dump(new classD instanceof (getSomeClass()));




























?>




