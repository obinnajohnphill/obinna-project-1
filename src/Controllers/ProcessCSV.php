<?php
/**
 * Created by PhpStorm.
 * User: obinna
 * Date: 11/11/18
 * Time: 19:11
 */

class ProcessCSV
{
    public $filename;
    public  $combination_count;
    public $data = array();

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
            ## Call create file function
            $this->CreateFile($this->combination_count);

           return $this->data;
        } else {
            echo "The file $this->filename does not exist";
        }
    }


    public function CreateFile($filename){
        $fp = fopen($filename, 'w');
        foreach ($this->data as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }

}