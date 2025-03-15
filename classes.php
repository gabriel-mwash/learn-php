<?php

// classes and objects 

use myClass as GlobalMyClass;

class SimpleClass {
  // property declaration 
  public $var = "a default value";

  // method declaration 
  public function displayVar() {
    echo $this->var;
  }
}

//$this is available when a method is called from within an obj context.
 
class A {
  function foo() {
    if (isset($this)) {
      echo "\$this is defined (";
      echo get_class($this);
      echo ")\n";
    }
    else {
      echo "\$this is not defined.\n";
    }
  }
}


class B {
  function bar() {
    // A::foo();
  }
}

$a = new A();
$a->foo();

// A::foo();

$b = new B();
$b->bar();


// B::bar();


// readonly classes
// #[\allowDynamicProperties]
// readonly class Foo {
// :};


// readonly class Foo {
//   public $bar;
// };


// readonly classes can be extended if, and only if, the child
// class is also a readonly class

// new keyword to create an instance 

$instance = new SimpleClass();

// this can also be done with a variable 
$className = "SimpleClass";
$instance = new $className(); // new SimpleClass()

// using new with arbitrary expressions   

class ClassA extends \stdClass {} 
class ClassB extends \stdClass {} 
class ClassC extends \ClassB {} 
class ClassD extends \ClassA {} 

function getSomeClass(): string {
  return "ClassA";
}

var_dump(new (getSomeClass()));
var_dump(new ("Class". "B"));
var_dump(new ("Class" . "C"));
var_dump(new (classD::class));


$instance = new SimpleClass();

$assigned = $instance;
$reference = & $instance;

$instance->var = "\$assigned will have this value";

$instance = null; // $instance and $reference become null

var_dump($instance);
var_dump($reference);
var_dump($assigned);



// creating obj in different ways
/*
class Test {
  public static function getNew() {
    return new static();
  }
}

class child extends Test {}

$obj1 = new Test();//by the class name
$obj2 = new $obj1(); // through the variable containing an obj
var_dump($obj1 !== $obj2);

$obj3 = Test::getNew(); //by the class method
var_dump($obj2 instanceof Test);

$obj4 = child::getNew(); // through a child class method
var_dump($obj4 instanceof child);
 */


// possible to access the member of a newly created
// obj in a signle expression 

echo (new DateTime())->format("Y");


// PROPERTIES AND METHODS


class Foo {
  public $bar = "property";

  public function bar() {
    return "method";
  }
}

$obj = new Foo();
echo $obj->bar, PHP_EOL, $obj->bar(), PHP_EOL;

class Foo1 {
  public $bar;

  public function __construct()
  {
    $this->bar = function() {
      return 42;
    };
  }
}

// extends 
// a class can inherit constants, methods and properties

class ExtendClass extends SimpleClass {
  //redefine the parent method 
  function displayVar()
  {
    echo "Extending class\n";
    parent::displayVar();
  }
}

$extended = new ExtendClass();
$extended->displayVar();

// compatible child methods 

class Base {
  public function foo(int $a) {
    echo "Valid\n";
  }
}

class Extend1 extends Base {
  function foo(int $a = 5) {
    parent::foo($a);
  }
}

class Extend2 extends Base {
  function foo(int $a, $b = 5) {
    parent::foo($a);
  }
}

$extended1 = new Extend1();
$extended1->foo();
$extended2 = new Extend2();
$extended2->foo(1);


// fatal error when a child method removes a param

// class Base2 {
//   public function foo(int $a = 5) {
//     echo "Valid\n";
//   }
// }
// 
// class Extend extends Base2 {
//   function foo() {
//     parent::foo(1);
//   }
// }
// 
// // fatal error ehwn a child method makes an optional 
// // param mandatory 
// 
// class Base3 {
//   public function foo(int $a = 5) {
//     echo "valid\n";
//   }
// }
// 
// class Extend extends Base3 {
//   function foo(int $a) {
//     parent::foo($a);
//   }
// }


// highly discouraged to rename a methods' param in a 
// child class, leads to runtime error though its not
// a signature incompatiblity.


// ::class - used for class name resolution
/*
namespace NS {
  class className {}
  echo className::class;
}
 */

// nullsafe methods and properties 
// nullsafe operetor to access prperties and methods 

// $result = $repository->getUser(5)?->name;


// is equivalent to the following 
/*
if (is_null($repository)) {
  $result = null;
}
else {
  $user = $repository->getuser(5);
  if (is_null($user)) {
    $result = null;
  }
  else {
    $result = $user->name;
  }
}
 */

// PROPERTIES - class member variables 
// property declration 

class simpleClass1 {
  public $var1 = "hello " . "world";
  public $var2 = <<<EOD
  hello world
  EOD;
  public $var3 = 1 + 2;
  // invalid property declrations 
  // public $var4 = self::myStaticMethod();
  //public $var5 = $myVar;

  // valid declrations
  //public $var6 = myConstant;
  public $var7 = [true, false];

  public $var8 = <<<"EOD"
  hello world
  EOD;
  
  //without visibility modifier 
  static $var9;
  // readonly int $var10;
  
}


// type declration of properties 

echo PHP_EOL;
echo "start here--------\n";
class User {
  public int $id;
  public ?string $name;

  public function __construct(int $id, ?string $name)
  {
    $this->id = $id;
    $this->name = $name;
    
  }
}

$user = new User(1234, null);

var_dump($user->id);
var_dump($user->name);


// accessing properties 

class Shape {
  public int $numberOfSides;
  public string $name;

  public function setNumberOfSides(int $numberOfSides) : void {
    $this->numberOfSides = $numberOfSides;
  }

  public function setName(string $name) : void {
    $this->name = $name;
  }

  public function getNumberofSides() : int {
    return $this->numberOfSides;
  }

  public function getName() : string {
    return $this->name;
  }
}


$triangle = new Shape();
$triangle->setNumberOfSides(3);
$triangle->setName("triangle");


var_dump($triangle->getName());
var_dump($triangle->getNumberofSides());

$circle = new Shape();
$circle->setName("circle");
$circle->setNumberOfSides(1);

var_dump($circle->getName());
var_dump($circle->getNumberofSides());


// readonly prevents the modification of property after 
// initialization 
class Test {
  public readonly string $prop;

  public function __construct(string $prop) 
  {
    $this->prop = $prop;
  }
}

$test = new Test("foobar");
// legal read. 
var_dump($test->prop);

// illegal reassignment. irregardless of whether the assigned 
// value is the same 

// $test->prop = "foobar";

// this is not correct ;
// public readonly int $prop = 42;// 
// a readonly prop with a default value is like a const, which isn't 
// paricularly useful


// readonly properties do not preclude interior mutability 
// obj stored in readonly props may still be modified internally

class Test2 {
  public function __construct(public readonly object $obj)
  {

  }
}

$test = new Test2(new stdClass);
// legal interior mutation
$test->obj->foo = 1;

// illegal reassignment 
// $test->obj = new stdClass;



// readonly properties and cloning 
// readonly proerties can be reiniialized when cloning an obj 
// using the __clone() method

class Test3 {
  public readonly ?string $prop;

  public function __clone()
  {
    $this->prop = null;
  }

  public function setProp(string $prop) : void {
    $this->prop = $prop;
  }
}

$test3 = new Test3;
$test3->setProp("foobar");

$test4 = clone $test3;
var_dump($test4->prop);


// PROPERTY HOOKS
// supported in php8.4 latest version , current local version is 8.3.6
/* review hooks after installing php8.4
class Example {
  private bool $modified = false;
  public string $foo = "default value" {
    get {
      if ($this->modified) {
        return $this->foo . " (modified)";
      }
      return $this->foo;
  }
    set(string $value) {
      $this->foo = strtolower($value);
      $this->modified = true;
  }
  }
}

class Example2 {
  public string $foo = "default value" {
    get => $this->foo . ($this->modified ? " (modified)" : ""); 
    set => strtolower($value);
}
 */

// CLASS CONSTANTS

class MyClass {
  const CONSTANT = "constant value";

  function showConstant() {
    echo self::CONSTANT . "\n";
  }
}

echo MyClass::CONSTANT . "\n";

$className = "MyClass";
echo $className::CONSTANT . "\n";

$class = new MyClass();
$class->showConstant();

echo $class::CONSTANT."\n";


// ::class allows fully qualified class name resolution at compile 
// time, hence useful for namespaced classes.

/*
namespace foo {

    use myClass1;

  class bar {}
  echo bar::class; //foo\bar
}
 */

// class constant expression example 

const ONE = 1;
/*
class foo {
  const TWO = ONE * 2;
  const THREE = ONE + self::TWO;
  const SENTENCE = "The value of THREE is".self::THREE;
}


class Foo {
  public const BAR = "bar";
  private const BAZ = "baz";
}

$name = "BAR";
echo Foo::{$name}, PHP_EOL;
 */


// AUTOLOADING CLASSES
/*
spl_autoload_register(function ($class_name) {
  include $class_name . ".php";
});


$obj = new myClass1();
$obj = new myClass2();


// this example attempts to load the interface ITest

spl_autoload_register(function ($name) {
  var_dump($name);
});


class Foo implements ITest {} // error, ITest not found



// composer generates a vendor/autload.php which is set up 
// to automatically load packages that are being managed by composer

require __DIR__ . "/vendor/autoload.php";
$uuid = Ramsey\Uuid\Uuid::uuid7();

echo "Generated new UUID -> ", $uuid->toString(), "\n";
 */


// constructors and destructors 

// constructors in inheritance

class BaseClass {
  function __construct()
  {
    print "In BaseClass constructor\n";
  }
}

class SubClass extends BaseClass {
  function __construct()
  {
    parent::__construct();
    print "In subclass constructor\n";
  }
}

class OtherSubClass extends BaseClass {
  // inherits BaseClass's constructor 
}


// in baseclass constructor 
$obj = new BaseClass();
print_r($obj);

// in BaseClass constructor and subclass constructor 
$obj = new subclass();
print_r($obj);

// in baseclass constructor 
$obj = new OtherSubClass();
print_r($obj);


// using constructor arguements 

class Point {
  protected int $x;
  protected int $y;

  public function __construct(int $x, int $y = 0)
  {
    $this->x = $x;
    $this->y = $y;
  }
}

// pass both params 
$p1 = new Point(4, 5);
$p2 = new Point(4);
$p3 = new Point(y: 5, x: 4);


// new in initializers


static $x = new foo;

const C = new Foo;

function test($param = new Foo) {}
/*
#[AnAttribute(new Foo)]
class Test {
  public function __construct(public $prop = new Foo)
  {
    
  }
}
 */

// static creation methods 


/*
class Product {
  private ?int $id;
  private ?string $name;
  
  private function __construct(int $id = null, ?string $name = null) 
  {
    $this->id = $id; 
    $this->name = $name; 
  }

  public static function fromBasicData(int $id, string $name) : static {
    $new = new static($id, $name);
    return $new;
  }

  public static function fromJson(string $json) : static {
      $data = json_decode($json, true);
      return new static($data["id"], $data["name"]);
  }

  public static function fromXml(string $xml) : static {
    // custom logic here.
    $data = convert_xml_to_array($xml);
    $new = new static();
    $new->id = $data["id"];
    $new->name = $data["name"];
    return $new;
  }
}

$p1 = product::fromBasicData(4, "Widget");
$p2 = product::fromJson($some_json_string);
$p3 = product::fromXml($some_xml_string);
 */


// DESTRUCTOR

class MyDestructableClass {
  function __construct() 
  {
    print "in constructor\n"; 
  }

  function __destruct()
  {
    print "Destroying " .__CLASS__."\n";
  }
}

$obj = new MyDestructableClass();

// parent destructors are not called implicitly
// explicit call to parent::__destruct()
// instances may inherit parent's destructor if they dont
// implement one themselves



// visibility 
// public, protected, private
// defualt is public if not declared

// example 1

class myClassV {
  public $public = "public";
  private $private = "private";
  protected $protected = "protected";

  function printHello() {
    echo $this->public;
    echo $this->private;
    echo $this->protected;
  }
}

$obj = new myClassV();
echo $obj->public;
//echo $obj->private;
//echo $obj->protected;

$obj->printHello();


class myClassV2 extends myClassV {
  // we can redeclare the public and protected 
  // properties but not private
  public $public = "public2";
  protected $protected = "protected2";
  // private $private = "private2";

  function printHello()
  {
    echo $this->public;
    echo $this->protected;
    echo $this->private;
  }
}

/*
$obj = new myClassV2();
echo $obj2->public;
echo $obj2->protected; // fatal error
echo $obj2->private; // undefined
$obj2->printHello(); // shows public2, protected2, undefined
 */


// asymmetric property visiblity

// php 8.4 syntax on set and get
/*
class Book {
  public function __construct(
    public private(set) string $title,
      public protected(set) string $author,
      protected private(set) int $pubYear,
  ){}
}

class SpecialBook extends Book {
  public function update(string $author, int $year) : void {
    $this->author = $author; // ok
    $this->pubYear = $year; // fatal error
  }
}

echo $b->title; // works
echo $b->author; // works
echo $b->pubYear; // fatal error

$b->title = "How not to PHP"; // fatal error
$b->author = "Pedro H. Peterson"; // fatal error
$b->pubYear = 2023; // fatal error

// assymetric propert inheritance 

class Book2 {
  protected string $title;
  public protected(set) string $author;
  public private(set) int $pubYear;
}

class specialbook extends Book2 {
  public protected(set) $title; // ok, as reading is wider 
  // and writing the same.

  public string $author; // ok, as reading and writing is wider.
  public protected(set) int $pubYear // fatal error. private(set) 
    // properties are final
}
*/

// METHOD VISIBILITY

class myClassM {
  // delclare a public constructor 
  public function __construct()
  {
    
  }

  // declare a public method
  public function myPublic() {
  }

  // declare a protected method
  protected function myProtected() {
  }

  // declare a private method
  private function myPrivate(){
  }

  // this is public
  function foo() {
    $this->myPrivate();
    $this->myProtected();
    $this->myPrivate();
  }
}

$myClass = new myClassM();
$myClass->myPublic();
//$myClass->myProtected();
//$myClass->myPrivate();
$myClass->foo();


class myClassM1 extends myClassM {
  // this is public
  function foo2() {
    $this->myPublic();
    $this->myProtected();
    //$this->myPrivate(); // fatal error
  }
}

$myclass2 = new myClassM1;
$myclass2->myPublic(); // works
$myclass2->foo2(); // public and protected work, not private

class Bar {
  public function test() {
    $this->testPrivate();
    $this->testPublic();
  }

  public function testPublic() {
    echo "Bar::testPublic\n";
  }

  private function testPrivate() {
    echo "Bar::testPrivate\n";
  }
}

class Foom extends Bar {
  public function testPublic(){
    echo "Foo1:testPublic\n";
  }

  private function testPrivate() {
    echo "Foom:testPrivate\n";
  }
}

echo "start here______" . PHP_EOL;

$myFoo = new Foom();
$myFoo->test(); //


// constant visibility
/*
class MyClass {
  public const MY_PUBLIC = "public";

  // declare a protected constant
  protected const MY_PROTECTED = "protected";

  // declare a private constant 
  private const MY_PRIVATE = "private";
  
  public function foo() {
    echo self::MY_PRIVATE;
    echo self::MY_PUBLIC;
    echo self::MY_PROTECTED;
  }
}

$myclass = new MyClass();
MyClass::MY_PUBLIC; // works 
MyClass::MY_PROTECTED; // fatal error
MyClass::MY_PRIVATE; // fatal error

$myclass->foo(); // public, protected and private works
 */

// visiblity from other objects


// accessing private members of the same object type

class TestM {
  private $foo;
  public function __construct($foo)
  {
    $this->foo = $foo;
  }

  private function bar(){
    echo "accessed the private method.";
  }

  public function baz(TestM $other) {
    // we can change the private property
    $other->foo = "hello";
    var_dump($other->foo);

    // we can also call the private method
    $other->bar();
  }
}

$test = new TestM("test");
$test->baz(new TestM("other"));

// object inheritance
// when extending a class, a subclass will iherit all the classes publicand protected methods, props and consts

/*
class A {
  public int $prop;
}

class B extends A {
  //illegal :read-write >readonly;
  // public readonly int $prop;
}


class Foo {
  public function printItem($string) {
    echo "Foo: " . $string . PHP_EOL;
  }

  public function printPHP() {
    echo "PHP is great." . PHP_EOL;
  }
}

class Bar extends Foo {
  public function printItem($string)
  {
    echo "Bar: " . $string . PHP_EOL;
  }
}

$foo = new Foo();
$bar = new Bar();
$foo->printItem("baz"); // output: "Foo: baz";
$foo->printPHP(); // output: "Php is great;
$bar->printItem("baz"); // output: Bar:baz;
$bar->printPHP();
 */


// the return type of methods should be compatible with the parent being executed, otherwise depracted method


// if return type cannot be declared for an overiding method, returntypewillchange attribute should be used to silcence the depracted notice



class myDateTime extends DateTime {
  #[\ReturnTypeWillChange]
  public function modify(string $modifier): DateTime|false
  {
    return false;
  }
}

//scope resolution operator(::) - Paamayim Nekudotayim
// used to call static methods
// :: - allows access to a const, stat prop or method of a class or parent

/*
class MyClass {
  const CONST_VALUE = "A constant value";
}

$classname = "MyClass";
echo $classname::CONST_VALUE;

echo MyClass::CONST_VALUE;

//self, parent and static - used to access props and methods from 
// inside the class def;

class OtherClass extends MyClass {
  public static $my_static = "static var";

  public static function doubleColon() {
    echo parent::CONST_VALUE . "\n";
    echo self::$my_static . "\n";
  }
}

$classname = "OtherClass";
$classname::doubleColon();

OtherClass::doubleColon();
 */



class MyClassI {
  protected function myFunc() {
    echo "MyClass::myFunc()\n";
  }
}


class otherClassI extends MyClassI {
  // overide parent's def
  public function myFun() {
    // but still call the parent fun 
    parent::myFunc();
    echo "OtherClassI::myFunc()\n";
  }
}

$class = new otherClassI();
$class->myFun();

// static keyword
// static props
class FooS {
  public static $my_static = "foo";

  public function staticValue() {
    return self::$my_static;
  }
}

class Bars extends FooS {
  public function fooStatic() {
    return parent::$my_static;
  }
}

print Foos::$my_static . "\n";

$foo = new FooS();
print $foo->staticValue();
// print $foo->my_static . PHP_EOL;

print $foo::$my_static . PHP_EOL;
$bar = new Bars();
$bar->fooStatic(). PHP_EOL;


//static methods
// because static methods are called without an instance of the objecte created, the $this is not available inside method declared as static
class Fun {
  public static function aStaticFunction() {
    // do something 
    echo "this is a static function";
  }
}

Fun::aStaticFunction();
$className = "Fun";
// $className::aStaticMethod();


// class abstraction
// abstract classes can't be instantiated
// any class with atleast one abstract method or prop should be
// abstract

// inheriting from an abstract class must define all methods 
// marked abstract in parent scope


abstract class AbstractClass {
  // force extneding class to define this method
  abstract protected function getvalue();
  abstract protected function prefixValue($prefix);

  // common method 
  public function printOut() {
    print $this->getvalue() . "\n";
  }
}

class ConcreteClass1 extends AbstractClass {
  protected function getValue() {
  return "ConcreteClass1";
  }

  public function prefixValue($prefix) {
    return "{$prefix}ConcreteClass1";
  }
}

class ConcreteClass2 extends AbstractClass {
  public function getvalue() {
    return "ConcreteClass2";
  }

  public function prefixValue($prefix) {
    return "{$prefix}ConcreteClass2";
  }
}

$class1 = new ConcreteClass1();
$class1->printOut();
echo $class1->prefixValue("Foo_"), "\n";

$class2 = new ConcreteClass2();
$class2->printOut();
echo $class2->prefixValue("Foo_"), "\n";

// abstract method example

abstract class abstractClass1 {
  // an abstract method only needs to define the 
  // required arguments

  abstract protected function prefixName($name);
}

class ConcreteClass extends AbstractClass1 {
  // a child class may define optional params 
  // wich aren't present in the parent's signature 
  
  public function prefixName($name, $seperator = ".") {
    if ($name == "Pacman") {
      $prefix = "Mr";
    }
    elseif ($name == "Pacwoman") {
      $prefix = "Mrs";
    }
    else {
      $prefix = "";
    }
    return "{$prefix}{$seperator}{$name}";
  }
}

$class = new ConcreteClass();
echo $class->prefixName("Pacman"), "\n";
echo $class->prefixName("Pacwoman"), "\n";


# abstract property example
/*
abstract class A {
// extending classes must have public gettable prop
  abstract public string $readable {
    get;
  }

  // extending classes must have a prot or publi wri prop
  abstract protected string $writeable {
    set;
  }

  // extending classes must have a protected or pub symmetric prop
  abstract protected string $both {
    get;
    set;
  }
}

class C extends A {
  // this satisfies the requirement and makes is settable,
  // which is valid
  public string $readable;

  // this wouldn't satisfy the requirement, as its not public readable
  protected string $readable;

  // this satisfies the requirement exactly, so is sufficient
  // it may only be written to, and only from protected scope

  protected string $writeable {
    set => $value;
  }

  // this expands the visiblity from protected to public, 
  // which is fine

  public string $both;
}
 */
  

// OBJECT INTERFACES
// allow one to create code which specifies which methods and props a class must implement
// all methods declared must be public

interface I {
  public string $readable { get; }
  public string $writeable { set; }
  public string $both { get; set; }

}
















?>
