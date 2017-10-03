#!/usr/bin/php
<?PHP
function ft_rostring($str)
{
    foreach(explode(" ", $str) as $item)
        if ($item != "")
			$my_arr[] = $item;
	if (!empty($my_arr)) {
    	foreach(array_slice($my_arr, 1) as $item)
        	echo trim($item)." ";
    	echo trim($my_arr[0])."\n";
	}
}
if ($argc > 1)
    ft_rostring(trim($argv[1]));
?>
