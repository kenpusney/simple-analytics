<?php
require_once("common.php");

$date = getOrDefault("date", date("Y-m-d"));
$limit = getOrDefault("limit", 100);
$skip = getOrDefault("skip", 0);
$skipped = 0;

$data = array();

$source = dba_open("../data/". $date .".db", "rl", "flatfile");

if ($source) {

    $key = dba_firstkey($source);

    if ($key) {
        $data[] = array(key => $key, detail => json_decode(dba_fetch($key, $source)));
    }

    while(($skip--) > 0 && ($key = dba_nextkey($source))) { 
        $skipped ++;
    }

    while((--$limit) > 0 && ($key = dba_nextkey($source))) {
        $data[] = array(key => $key, detail => json_decode(dba_fetch($key, $source)));
    }
}

dba_close($source);
header("Content-Type: application/json");
echo json_encode(array(
        "size" => count($data),
        "data" => $data,
        "skip" => $skipped
    ));
