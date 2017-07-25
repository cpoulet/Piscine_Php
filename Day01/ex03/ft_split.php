<?PHP
function ft_split($str)
{
    foreach( explode(" ", $str) as $item)
        if ($item != "")
            $my_arr[] = $item;
    sort($my_arr);
    return $my_arr;
}
?>
