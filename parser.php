<?php
/**
 * Created by PhpStorm.
 * User: obinna
 * Date: 11/11/18
 * Time: 19:06
 */



include_once("src/Controllers/ProcessCSV.php");

## Pass commandline arguements
parse_str(implode('&', array_slice($argv, 1)), $_GET);

## Call process csv class
$dump = new ProcessCSV();
$data = $dump->readCSV($_GET);

## convert retruned array into object
$object = json_decode(json_encode($data), FALSE);

## print product object
print_r($object);
