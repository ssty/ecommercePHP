<?php
class Validation 
{
    public function check_empty($data, $fields)
    {
        $msg = null;
        foreach ($fields as $value) {
            if (empty($data[$value])) {
                $msg .= "$value field empty <br />";
            }
        } 
        return $msg;
    }
    public function is_currency($price)
    {
        if (preg_match("/^[0-9]+(?:\.[0-9]{0,2})?$/", $price)) {    
            return true;
        } 
        return false;
    }
}
?>