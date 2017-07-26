#!/usr/bin/php
<?php
function callback($matches)
{
    $matches[0] = preg_replace_callback('/".*"/',
    function ($m)
    {
        return strtoupper($m[0]);
    }, $matches[0]);
    $matches[0] = preg_replace_callback('/>(.+?)</',
    function ($m)
    {
        return strtoupper($m[0]);
    }, $matches[0]);
    return $matches[0];
}
if ($argc != 2)
    return (1);
file_exists($argv[1]) or die("$argv[1] not found\n");   
$file = file_get_contents($argv[1]) or die("Failed to open file\n");
$file = preg_replace_callback('/<a.*<\/a>/', "callback", $file);
echo $file;
?>
