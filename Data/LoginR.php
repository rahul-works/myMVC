<?php
if(!class_exists("DATABASE"))
{
    require_once('mysqli.inc.php');
}

use ConnectDb AS DB;
class UserR {

    public function get($username, $password = '') {
        try {
            // call the stored procedure
            $sql = "CALL login('$username', '$password')";
            $conn = DB::getInstance()->getConnection();
            $result = mysqli_query($conn, $sql);
            $data = array();
            while ($result && $row = $result->fetch_object()) {                
                $data[] = get_object_vars($row);
            } 
            if($result) {
                $result->close();
            }
            return $data;
        } catch (mysqli_sql_exception $e) {
            throw $e->getTrace();
        }
    }
}

// $login = new UserR;
// print_r($login->get('rahul.thakur9985@gmail.com', '111111'));
?>