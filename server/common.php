<?php
date_default_timezone_set("Asia/Shanghai");
error_reporting(0);

function getOrDefault($key, $value) {
    return isset($_GET[$key]) ? $_GET[$key] : $value;
}
