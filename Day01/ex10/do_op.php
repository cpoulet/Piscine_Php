#!/usr/bin/php
<?PHP
$argc == 4 or die ("Incorrect Parameters\n");
switch (trim($argv[2]))
{
    case "+":
        print(trim($argv[1]) + trim($argv[3])."\n");
        break;
    case "-":
        print(trim($argv[1]) - trim($argv[3])."\n");
        break;
    case "*":
        print(trim($argv[1]) * trim($argv[3])."\n");
        break;
    case "/":
        print(trim($argv[1]) / trim($argv[3])."\n");
        break;
    case "%":
        print(trim($argv[1]) % trim($argv[3])."\n");
        break;
    default:
        print("Incorrect Parameters\n");
}
?>
