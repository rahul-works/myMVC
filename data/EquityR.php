<?php

if(!class_exists("DATABASE"))
{
    require_once('mysqli.inc.php');
}
use ConnectDb AS DB;

class EquityR {
    public function get($user_id, $equity_id = -1, $full = '-1') {
        try {
            // call the stored procedure
            $sql = "CALL s_equity($user_id, $equity_id, '".$full."')";
            $data = DB::query(DATABASE::SELECT, $sql);
            return $data;
        } catch (mysqli_sql_exception $e) {
            throw $e->getTrace();
        }
    }
}

// $equity = new EquityR;
// print_r($equity->get(2185, 2, '-1'));
// print_r($equity->get(2185, 2, '1'));
// print_r($equity->get(2185, 2, '0'));
?>