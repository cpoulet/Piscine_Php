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

function comp($str1, $str2)
{
    $order = "abcdefghijklmnopqrstuvwxyz0123456789";
    $i = 0;
    $str1 = strtolower($str1);
    $str2 = strtolower($str2);
    if ($str1 == $str2)
        return 0;
    while ($str1[$i] == $str2[$i])
		$i++;
	if ($str1[$i] == '')
		return 1;
	if ($str2[$i] == '')
		return -1;
    if (strpos($order, $str1[$i]) !== False and strpos($order, $str2[$i]) !== False)
    	return strpos($order, $str1[$i]) - strpos($order, $str2[$i]);
    if (strpos($order, $str1[$i]) === False)
        return 1;
    if (strpos($order, $str2[$i]) === False)
        return -1;
	return (ord($str1[$i]) - ord($str2[$i]));
}

$tab = [];
foreach(array_slice($argv, 1) as $param)
    $tab = array_merge($tab, ft_split(ft_epur($param)));
usort($tab, "comp");
foreach($tab as $elem)
    echo $elem."\n";
?>
