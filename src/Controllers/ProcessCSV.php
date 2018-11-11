<?php
/**
 * Created by PhpStorm.
 * User: obinna
 * Date: 11/11/18
 * Time: 19:11
 */

class ProcessCSV
{
    function readCSV($get){

        $value = (array_values($get));
        $filename = $value[0];
        $combination_count = $value[1];
        $delimiter=',';

        if (file_exists($filename)) {

            if(!file_exists($filename) || !is_readable($filename))
                return FALSE;

            $header = NULL;
            $data = array();
            $sent = array();
            if (($handle = fopen($filename, 'r')) !== FALSE)
            {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
                {
                    if(!$header){
                        $header = $row;
                    }else{
                        $data[] = array_combine($header, $row);
                    }

                }
                fclose($handle);
            }
           ##First we convert the array to a json string
           $json = json_encode($data);
           ## Then we convert the json string to a stdClass()
           $object = json_decode($json);
           return $object;
        } else {
            echo "The file $filename does not exist";
        }



    }

}