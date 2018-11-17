<?php
/**
 * Created by PhpStorm.
 * User: obinna
 * Date: 11/11/18
 * Time: 19:11
 */
include_once "CreateFile.php";

class ProcessData
{
    public $filename;
    public  $combination_count;
    public $data = array();

    public function __construct($data)
    {
        $this->readCSV($data);
    }

    function readCSV($get){

        $value = (array_values($get));

        if (!empty($value[0])){
            $this->filename = $value[0];
        }if (!empty($value[0])) {
            $this->combination_count = $value[1];
        }

        $delimiter=',';

        if (file_exists($this->filename)) {
            if(!file_exists($this->filename) || !is_readable($this->filename))
                return FALSE;

            $header = NULL;
            if (($handle = fopen($this->filename, 'r')) !== FALSE)
            {
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
                {
                    if(!$header){
                        $header = $row;
                    }else{

                       ## Create the product Object
                       $this->data[] =   array_combine($header, $row);
                    }
                }
                fclose($handle);
            }
            new  DumpData($this->data);
            new CreateFile($this->combination_count, $this->data); ## Instantiate Create File class
        } else {
            echo "The file $this->filename does not exist";
        }
    }

}