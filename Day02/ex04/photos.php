#!/usr/bin/php
<?php
if ($argc != 2)
    die ("I need one and only one argument... tard.\n");
$dir = explode("/", $argv[1])[2]."/";
if ($dir == '')
    die ("This is not an url. Dummy.\n");
$html = file_get_contents($argv[1]) or die("Page not found.\n");
if(!file_exists($dir))
    mkdir($dir, 0777, true) or die("Failed to create folder.\n"); 
preg_match_all('/<img(.*?)>/', $html, $img);
foreach ($img[1] as $i)
{
    preg_match('/src="(.*?)"/', $i, $matches);
    if ($matches[1])
        copy((($matches[1][0] === '/') ? $argv[1].$matches[1] : $matches[1]), $dir.basename($matches[1]));
}
?>
