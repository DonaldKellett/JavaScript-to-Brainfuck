# Is It Red?

A brainfuck program that checks whether the given input string is `"red"` and outputs `"Y"` if the stated condition is true; `"N"` otherwise.

## Details

Program: `program.b` - The Brainfuck program with comments to explain what happens at each stage

Interpreter: `interpreter/function.brainfuck.php` - A basic brainfuck interpreter implemented in PHP as per standard guidelines - `30000` wrapping 8-bit cells in memory tape, reads in `0` when EOF reached etc.  [MIT License](https://github.com/DonaldKellett/Brainfuck/blob/master/LICENSE)

Testing Framework: [PHPTester](https://github.com/DonaldKellett/PHPTester) (version 3.1.0) - A simple, easy to use, minimalistic testing framework authored by [@DonaldKellett](https://github.com/DonaldKellett).  MIT License

Test Cases: `proof.php` - A comprehensive set of test cases, written using PHPTester, that confirms that `program.b` behaves as expected in a standard interpreter.  Execute this in a local web server to view the passed tests.

## Equivalents

This section displays the logical equivalents of the Brainfuck program in various high-level Turing-complete programming languages.

### JavaScript

```javascript
function isRed(input) {
  if (input === "red") {
    return "Y";
  }
  return "N";
}
```

### PHP

```php
<?php
function is_red($input) {
  if ($input === "red") {
    return "Y";
  }
  return "N";
}
?>
```

### Python

```python
def is_red(stdin):
  if (stdin == "red"):
    return "Y"
  return "N"
```

### Ruby

```ruby
def is_red input
  return "Y" if input == "red"
  "N"
end
```
