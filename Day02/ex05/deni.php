#!/usr/bin/php
<?php
$labels = ['nom' => 0, 'prenom' => 1, 'mail' => 2, 'IP' => 3, 'pseudo' => 4];
if ($argc != 3 or !array_key_exists($argv[2], $labels))
    return (1);
$index = $labels[$argv[2]];
file_exists($argv[1]) or exit();
$file = fopen($argv[1], 'r') or exit();
$nom = [];
$prenom = [];
$mail = [];
$IP = [];
$pseudo = [];
while ($csv = fgetcsv($file, 1024, ";"))
    if ($csv[0] != 'nom')
    {
        $nom[$csv[$index]] = $csv[0];
        $prenom[$csv[$index]] = $csv[1];
        $mail[$csv[$index]] = $csv[2];
        $IP[$csv[$index]] = $csv[3];
        $pseudo[$csv[$index]] = $csv[4];
    }
echo "Entrez votre commande: ";
while(($cmd = fgets(STDIN)))
{
    eval($cmd);
    echo "Entrez votre commande: ";
}
echo "\n";
?>
