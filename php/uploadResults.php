<?php

require_once('db.php');
require_once('ParamsValidator.php');

error_reporting(E_ALL);

$data = $_POST;

$db = new MysqliDb ('localhost', 'root', 'root', 'psychology');
$paramsValidator = new ParamsValidator();

if ($paramsValidator->validate($data) == false) {
    http_response_code(500);
}

$id = $db->insert('results', $_POST);
if ($id == false) {
    http_response_code(500);
}