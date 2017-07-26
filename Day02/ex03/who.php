#!/usr/bin/php
<?php
function stod($sec)
{
    date_default_timezone_set('Europe/Berlin');
    return date("M  j H:i",$sec);
}
if ($argc != 1)
    return (1);
$file = fopen("/var/run/utmpx","r") or die ("utmpx file not found\n");
while ($data = fread($file, 628))
{
    $u = unpack('a256login/a4id/a32tty/ipid/itype/i2time/a256host/i16pad',$data);
    if ($u['type'] == 7)
        echo $u['login']."   ".$u['tty']."  ".stod($u['time1'])."\n";
}
?>
