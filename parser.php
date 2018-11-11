<?php
/**
 * Created by PhpStorm.
 * User: obinna
 * Date: 11/11/18
 * Time: 19:06
 */




include_once("src/Controllers/ProcessCSV.php");

parse_str(implode('&', array_slice($argv, 1)), $_GET);

$dump = new ProcessCSV();
$data = $dump->readCSV($_GET);

print_r($data);
