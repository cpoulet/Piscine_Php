<?php

if (isset($_GET["action"]) && isset($_GET["name"])) {
    switch ($_GET['action']) {
        case "set":
            setcookie($_GET['name'], $_GET['value'], time() + 10);
            break;
        case "get":
            if(isset($_COOKIE[$_GET['name']]))
                echo $_COOKIE[$_GET['name']] . PHP_EOL;
            break;
        case "del":
            setcookie($_GET['name'], NULL, time() - 60);
            break;
        default:
            break;
    }
}

?>
