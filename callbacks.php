<?php 

echo "------------START HERE -------------";

// an example callback function
function my_callback_function() {
  echo "hello world";
}


// an example callback method 
class MyClass {
  static function myCallbackMethod() {
    echo "hello world, methoddy";
  }
}

// type 1: simple callback
call_user_func("my_callback_function");

// type 2 : static class method call
call_user_func(array("MyClass", "myCallbackMethod"));


// type 3 : object method call 
$obj4 = new MyClass();
call_user_func(array($obj4, "myCallbackMethod"));

// type4 : static class method call
call_user_func("MyClass::myCallbackMethod");

// type 5 : relative static class method call 

class A {
  public static function who() {
    echo "A\n";
  }
}


class B extends A {
  public static function who() {
    echo "B\n";
  }
}

call_user_func(array("B", "parent::who")); //A , depricated

// type 6 : objects implementing __invoke can be used as callables 


class C {
  public function __invoke($name)
  {
    echo "Hello ", $name, "\n";
  }
}

$c = new C();
call_user_func($c, "PHP!");


// callbak using closures - variables that store anonymous functions and 
// can be called like normal functions 


$double = function($a) {
  return $a * 2;
};

//this is our range of numbers 
$numbers = range(1, 5);

// use the closure as a callback here to 
// double the size of each element in the range 

$new_numbers = array_map($double, $numbers);
$another = array_map($double, array(20, 30, 40, 50));

print implode(" ", $new_numbers) . PHP_EOL;
print implode("-", $another);


// void - a return-only type declaration indicating the func does not return a value, but function may still terminate.
//
function my_function() {
  // return void; // returns null
};

// NEVER - is a return-only type indiciating the functin does not terminate. ifinite loops.
//

// RELATIVE CLASS TYPES 

// SELF - value must be an instanceof same class 

// PARENT - val must be instanceof parent class in which the typ
// declaration is used.
//
// STATIC - is a return-only type which requires the value returned
// must be an instanceof the same class as the one the method is called
// in.

//----------end of relative class types -----------

// SINGLETON TYPES - allows only one value, ie, php supporst
// two singletons typestrue and flase


// iterables - a built-in compile time type alias for array|Traversible 


function gen(): iterable {
  yield 1;
  yield 2;
  yield 3;
}



// the type of the value is determined by the value it stores
// and therefore no need to explicitly defind the type of a variable 


$sum = "10" + 5;
echo $sum;






















?>
