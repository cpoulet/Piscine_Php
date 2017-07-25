#!/usr/bin/php
<?PHP
function ft_epur($str)
{
    for($i = 0; $i < strlen($str); $i++)
        if ($str[$i] != ' ' or $str[$i + 1] != ' ')
            $my_str .= $str[$i];
    return $my_str;
}

if ($argc != 2)
    return;
echo ft_epur(trim($argv[1]))."\n";
?>
