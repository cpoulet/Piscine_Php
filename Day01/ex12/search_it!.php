#!/usr/bin/php
<?PHP
if ($argc <= 2)
    return (1);
$key = $argv[1];
foreach(array_reverse(array_slice($argv, 2)) as $c)
{
    $arr = explode(":",$c);
    if ($arr[0] == $key)
    {
        echo $arr[1]."\n";
        return 0;
    }
}
?>
