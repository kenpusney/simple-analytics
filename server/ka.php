<?php
require_once("common.php");
require_once("auth.php");

$id = trim(getOrDefault("id", "unknown"));

if (!registered($id)) {
    error("Fobbidden", 403);
    die;
}

$allowed = array(
    "REMOTE_ADDR", "REMOTE_PORT", 
    "REQUEST_URI", "QUERY_STRING","SCRIPT_NAME",
    "HTTP_HOST",
    "HTTP_ACCEPT", "HTTP_ACCEPT_LANGUAGE", "HTTP_ACCEPT_ENCODING",
    "HTTP_REFERER", "HTTP_ORIGIN", "HTTP_USER_AGENT",
    "REQUEST_TIME_FLOAT", "REQUEST_TIME"
);

$source = dba_open("../data/". date("Y-m-d") .".db", "cl", "flatfile");
$time = time();
$key = $id . "/" . $time . "/" . uniqid();
$data = json_encode(array("params"  => $_GET, 
        "details" => array_intersect_key($_SERVER, array_flip($allowed)),
        "time" => $time));
dba_insert($key, $data , $source);

dba_close($source);
header("Access-Control-Allow-Origin: *");
echo "success!";