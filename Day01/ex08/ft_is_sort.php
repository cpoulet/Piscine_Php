<?PHP
function ft_is_sort($tab)
{
    $sorted = $tab;
    $rsorted = $tab;
    sort($sorted);
    rsort($rsorted);
    if (count(array_diff_assoc($tab, $sorted)) and count(array_diff_assoc($tab, $rsorted)))
        return False;
    else
        return True;
}
?>
