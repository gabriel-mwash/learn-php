<?php
// new statement to create an new object
echo "------------------START-----------------" . PHP_EOL;


class foo {
  function do_foo() {
    echo "doing foo";
  }
}

$bar = new foo;
$bar->do_foo();
print_r($bar);


$obj = (object) array(1 => 300);
var_dump(isset($obj->{1})); // outputs 'bool(true)'
var_dump(key($obj)); // outputs 'integer(1) 1

// mem variable named scalar will contain the value;
$obj1 = (object) "ciao";
echo $obj1->scalar;

// insantiating an empty generic php object
$genericObject = new stdClass();
var_dump($genericObject);

// cast an empty array to an object
$obj2 = (object) array(); // or
$obj3 = (object) [];



















?>


