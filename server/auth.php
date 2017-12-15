<?php
require_once("common.php");

function auth() {
    $auth_key = getOrDefault("auth_key", "fuck");
    $hash = '$2y$10$K1mb470L30Pla7sS53amGOUSYAa5cy/8O39zf5bFydAWfSHGAapGe';
    return  password_verify($auth_key, $hash);
}

function registered($id) {
    return in_array(hash("sha256", $id), array(
        'ecbb571eb2aec2083477637345c9a9f2e953307b4af6ca2c51aa9ec246988eaf'
    ));
}