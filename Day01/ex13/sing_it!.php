#!/usr/bin/php
<?PHP
if ($argc != 2)
    return (1);
switch($argv[1])
{
    case "mais pourquoi cette demo ?":
        print("Tout simplement pour qu'en feuilletant le sujet\n");
        print("on ne s'apercoive pas de la nature de l'exo\n");
        break;
    case "mais pourquoi cette chanson ?":
        print("Parce que Kwame a des enfants\n");
        break;
    case "vraiment ?":
        $arr = ["Oui il a vraiment des enfants\n","Nan c'est parce que c'est le premier avril\n"];
        print($arr[array_rand($arr)]);
        break;
}
?>
