<?php
date_default_timezone_set("Asia/Shanghai");
error_reporting(0);

define('DBA_HANDLER', 'ndbm'); // see #> print_r(dba_handlers());

function getOrDefault($key, $value) {
    return isset($_GET[$key]) ? $_GET[$key] : $value;
}

function error($message, $code = 400) {
    http_response_code($code);
    header("Content-Type: application/json");
    echo json_encode(array(
        "error" => $message,
        "code" => $code
    ));
}