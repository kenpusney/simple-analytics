<?php
require_once("common.php");
$id = getOrDefault("id", "default");
$host = $_SERVER["HTTP_HOST"];
?>
(function (global) {
    fetch("http://<?= $host ?>/ka.php?id=<?= $id ?>&origin=" +
        encodeURIComponent(location.href));
}(this));