#!/usr/bin/php
<?PHP
echo "Entrez un nombre: ";
while(($in = fgets(STDIN)))
{
    $num = trim($in);
    if (is_numeric($num))
    {
        echo "Le chiffre $num est ";
        if ($num & 1)
            echo "Impair\n";
        else
            echo "Pair\n";
    }
    else
        echo "'$num' n'est pas un chiffre\n";
    echo "Entrez un nombre: ";
}
echo "\n";
?>
