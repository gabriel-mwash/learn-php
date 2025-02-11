<?php


$juice = "apple";

echo "He drank some $juice juice." . PHP_EOL;


$juices = array("apple", "orange", "string_key" => "purple");

echo "He drank some $juices[0] juice." . PHP_EOL;
echo "He drank some $juices[1] juice." . PHP_EOL;
echo "He drank some $juices[string_key] juice.";
echo PHP_EOL;


class A {
  public $s = "string";
}

$o = new A();

echo "Object value: $o->s.";

$string = "string";
echo "the character at index -2 is $string[-2].", PHP_EOL;
$string[-3] = "o";
echo "Changing the character at index -3 to o gives $string.", PHP_EOL;

//get the first character of a string
$str = "this is a test.";
$first = $str[0];
echo $first . PHP_EOL;

//get the third character of a string
$third = $str[2];
echo $third . PHP_EOL;

// get the last character of a string.
$str = "this is still a test.";
$last = $str[strlen($str)-1];
echo $last . PHP_EOL;

// modify the last character of a string.
$str = "Look at the sea";
$str[strlen($str)-1] = "e";
echo $str;














?>
