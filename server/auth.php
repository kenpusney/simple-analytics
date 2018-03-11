<?php
require_once("common.php");

function auth() {
    $auth_key = getOrDefault("auth_key", "fuck");
    $hash = '$2y$10$K1mb470L30Pla7sS53amGOUSYAa5cy/8O39zf5bFydAWfSHGAapGe';
    return  password_verify($auth_key, $hash);
}

function registered($id) {
    return in_array(hash("sha256", $id), array(
        'ecbb571eb2aec2083477637345c9a9f2e953307b4af6ca2c51aa9ec246988eaf', // net.kimleo.blank
        '221617b4ba1685e25c20fda2b686ed289fe25de82468ce357e72afe8e09966ef', // net.kimleo.wiki
        '113d35e1813375dd6b59393bb61cc5698498ecfece53b21c70a5fa738efd89c2', // net.kimleo.portal
        'd1e76c62d60e34e7401b9f57a313f9492d9a5b1ca51d5289ec4277dc3c2383fa', // net.kimleo.spec
        'c08aec1673d18bc9084cddf8744ed0cb3b4ff4351a1d89e6a9382fb3106b3fb7', // net.kimleo.badges
        '96b234540af30880fb68e0ffa3080a4119307580eccd272e4a0961a6e3fd3690', // net.kimleo.qunachi
    ));
}