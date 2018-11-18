<?php
/**
 * Created by PhpStorm.
 * User: obinna
 * Date: 17/11/18
 * Time: 17:32
 */

class CreateFile
{
    private $data;
    private $write;

    public function __construct($filename,$data){
        $this->data = $data;
        $this->CreateFile($filename);
    }

    public function CreateFile($filename){
        $result = array();
        $prev_value = array('Product' => null, 'Count' => null);

        ## Group unique products
        foreach ($this->data as $val) {
            if ($prev_value['Product'] != $val) {
                unset($prev_value);
                $prev_value = array('Product' => $val, 'Count' => 0);
                $result[] =& $prev_value;
            }

            $prev_value['Count']++;
        }

        ## Write product details to file
        foreach ($result as $fields){
            ob_start();
            echo "\n";
            echo "make: ".$fields['Product']['brand_name']."\n";
            echo "model: ".$fields['Product']['model_name']."\n";
            echo "colour: ".$fields['Product']['colour_name']."\n";
            echo "capacity: ".$fields['Product']['gb_spec_name']."\n";
            echo "network: ".$fields['Product']['network_name']."\n";
            echo "grade: ".$fields['Product']['grade_name']."\n";
            echo "condition: ".$fields['Product']['condition_name']."\n";
            echo "count: ".$fields['Count']."\n";

            $this->write[] = ob_get_contents();
        }
        ob_end_clean();
        file_put_contents($filename, $this->write);

    }

}