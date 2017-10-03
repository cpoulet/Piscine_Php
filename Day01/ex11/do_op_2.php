#!/usr/bin/php
<?PHP
$argc == 2 or die("Incorrect Parameters\n");
$arg = sscanf($argv[1], "%d %c %d %s");
if (is_numeric($arg[0]) == false || is_numeric($arg[2]) == false || $arg[3] != false)
    die("Syntax Error\n");
switch (trim($arg[1]))
{
    case "+":
        print($arg[0] + $arg[2])."\n";
        break;
    case "-":
        print($arg[0] - $arg[2])."\n";
        break;
    case "*":
        print($arg[0] * $arg[2])."\n";
        break;
    case "/":
        print($arg[0] / $arg[2])."\n";
        break;
    case "%":
        print($arg[0] % $arg[2])."\n";
        break;
    default:
        print("Syntax Error\n");
}
?>
