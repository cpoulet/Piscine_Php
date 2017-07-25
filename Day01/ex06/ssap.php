#!/usr/bin/php
<?PHP
function ft_epur($str)
{
    for($i = 0; $i < strlen($str); $i++)
        if ($str[$i] != ' ' or $str[$i + 1] != ' ')
            $my_str .= $str[$i];
    return $my_str;
}
function ft_split($str)
{
    foreach( explode(" ", $str) as $item)
        if ($item != "")
            $my_arr[] = $item;
    return $my_arr;
}
$my_out = array();
foreach(array_slice($argv, 1) as $param)
    $my_out = array_merge($my_out, ft_split(ft_epur($param)));
sort($my_out);
foreach($my_out as $elem)
    echo $elem."\n";
?>
