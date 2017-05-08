<?php
// Brainfuck Source Code
$code = file_get_contents('program.b');
// Brainfuck Interpreter
require 'interpreter/function.brainfuck.php';
// PHPTester Testing Framework (v3.1.0)
require 'PHPTester/class.phptester.php';
$test = new PHPTester;

$test->describe("program.b", function () use ($test, $code) {
  $test->it("should output \"Y\" when the input string is \"red\"", function () use ($test, $code) {
    $test->assert_equals(brainfuck($code, "red"), "Y");
  });
  $test->it("should be case sensitive and output \"N\" for \"Red\" in ALLCAPS and mIxeDCaSe", function () use ($test, $code) {
    $test->assert_equals(brainfuck($code, "Red"), "N");
    $test->assert_equals(brainfuck($code, "RED"), "N");
    $test->assert_equals(brainfuck($code, "rED"), "N");
    $test->assert_equals(brainfuck($code, "rEd"), "N");
    $test->assert_equals(brainfuck($code, "ReD"), "N");
  });
  $test->it("should output \"N\" for input strings other than \"red\"", function () use ($test, $code) {
    $test->assert_equals(brainfuck($code, "green"), "N");
    $test->assert_equals(brainfuck($code, "blue"), "N");
    $test->assert_equals(brainfuck($code, "orange"), "N");
    $test->assert_equals(brainfuck($code, "cyan"), "N");
    $test->assert_equals(brainfuck($code, "pink"), "N");
    $test->assert_equals(brainfuck($code, "magenta"), "N");
    $test->assert_equals(brainfuck($code, "yellow"), "N");
  });
  $test->it("should output \"N\" when the 3 letters in \"red\" are in the wrong order", function () use ($test, $code) {
    $test->assert_equals(brainfuck($code, "erd"), "N");
    $test->assert_equals(brainfuck($code, "edr"), "N");
    $test->assert_equals(brainfuck($code, "dre"), "N");
    $test->assert_equals(brainfuck($code, "der"), "N");
    $test->assert_equals(brainfuck($code, "rde"), "N");
  });
  $test->it("should output \"N\" for substrings of \"red\"", function () use ($code, $test) {
    $test->assert_equals(brainfuck($code, "re"), "N");
    $test->assert_equals(brainfuck($code, "r"), "N");
    $test->assert_equals(brainfuck($code, "ed"), "N");
    $test->assert_equals(brainfuck($code, "e"), "N");
    $test->assert_equals(brainfuck($code, "d"), "N");
  });
  $test->it("should output \"N\" when no input is provided", function () use ($test, $code) {
    $test->assert_equals(brainfuck($code), "N");
  });
  $test->it("should output \"N\" when the input contains the substring \"red\"", function () use ($test, $code) {
    $test->assert_equals(brainfuck($code, "bred"), "N");
    $test->assert_equals(brainfuck($code, "redis"), "N");
    $test->assert_equals(brainfuck($code, "Human blood is visibly red."), "N");
    $test->assert_equals(brainfuck($code, "red is not my favorite color"), "N");
    $test->assert_equals(brainfuck($code, "Black is my favourite color; red is not my favorite color."), "N");
    $test->assert_equals(brainfuck($code, "sdklfjsdweioruREDslkdjdskljfsdkljfsdredsldkjdfslkdfsjkrEdsdlkjsdlkdfsjfsdklREdklsdfjsdfkljsdfklfsdjlkfdsreDsdflkjdsf"), "N");
  });
  $test->it("should output \"N\" for other edge cases", function () use ($test, $code) {
    $test->assert_equals(brainfuck($code, "rcf"), "N");
    $test->assert_equals(brainfuck($code, "sfb"), "N");
    $test->assert_equals(brainfuck($code, "ngf"), "N");
  });
  $test->it("should work for random tests, tested against a reference PHP function", function () use ($test, $code) {
    $is_red = function ($input) {
      if ($input === "red") {
        return "Y";
      }
      return "N";
    };
    for ($i = 0; $i < 100; $i++) {
      $input = lcg_value() < 0.2 ? "red" : implode(array_map(function () {return range("a", "z")[rand(0, 25)];}, range(1, rand(1, 5))));
      $expected = $is_red($input);
      $actual = brainfuck($code, $input);
      $test->assert_equals($actual, $expected, "The Brainfuck program failed with the input string \"$input\"");
    }
  });
});
?>
