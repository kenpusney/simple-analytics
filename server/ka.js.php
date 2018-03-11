<?php
require_once("common.php");
$id = getOrDefault("id", "default");
$host = $_SERVER["HTTP_HOST"];
?>
(function(g){
e=encodeURIComponent;f=fetch;b="http://<?= $host ?>/ka.php?id=<?= $id ?>&origin="+e(location.href);
f(b);
g.ka=function(o){p="";for(k in o){if(o.hasOwnProperty(k)&&k!=='id'&&k!=='origin'){p += ("&" + e(k) + "=" + e(o[k]));}};f(b + p);}
}(this));