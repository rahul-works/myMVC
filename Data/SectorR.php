<?php
if(!class_exists("DATABASE"))
{
    require_once('mysqli.inc.php');
}
use ConnectDb AS DB;

class SectorR {
    public function get($search = '') {
        try {
            // call the stored procedure
            $sql = "CALL s_sector('".$search."')";
            $data = DB::query(DATABASE::SELECT, $sql);
            return $data;
        } catch (mysqli_sql_exception $e) {
            throw $e->getTrace();
        }
    }
}

// $sector = new SectorR;
// print_r($sector->get());
// print_r($sector->get('IT'));
?>