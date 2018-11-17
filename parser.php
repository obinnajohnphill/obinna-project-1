<?php
/**
 * Created by PhpStorm.
 * User: obinna
 * Date: 11/11/18
 * Time: 19:06
 */


include_once("src/Controllers/ProcessData.php");

## Pass commandline arguements
parse_str(implode('&', array_slice($argv, 1)), $_GET);

## Instatiate Process Data Class
$dump = new ProcessData($_GET);

class DumpData{

    public function __construct( array $data)
    {
        $this->dumpData($data);
    }

    function dumpData($data){
    ## Dump the processed content of the csv file onto the terminal
    foreach ($data as $fields){
        if(empty($fields['brand_name']) or empty($fields['model_name'])){
            throw new Exception("Required field is not set");
        }
        echo "\n";
        echo "make: ".$fields['brand_name']."(string, required)"."- Brand name"."\n";
        echo "model: ".$fields['model_name']."(string, required)"."- Model name"."\n";
        echo "colour: ".$fields['colour_name']."(string)"."- Colour name"."\n";
        echo "capacity: ".$fields['gb_spec_name']."(string)"."- GB Spec name"."\n";
        echo "network: ".$fields['network_name']."(string)"."- Network name"."\n";
        echo "grade: ".$fields['grade_name']."(string)"." - Grade Name"."\n";
        echo "condition: ".$fields['condition_name']."(string)"."- Condition name"."\n";
        echo "\n";
    };

    }
}

