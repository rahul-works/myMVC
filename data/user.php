<?php
namespace data;

class User {
    private $mysqli;

    function __construct() {
        try {
            $this->mysqli = new \mysqli ("localhost", "php", "access", "bikestores");
            if ($this->mysqli->connect_errno) {
                printf("Connect failed: %s\n", $this->mysqli->connect_error);
                exit();
            }
        } catch (\mysqli_sql_exception $e) {
            throw $e->getTrace();
        }        
    }

    public function get($username, $password = '', $encrpt_key = '') {
        try {

            // call the stored procedure
            $result = $this->mysqli->query("CALL login('$username', '$password', '$encrpt_key')");//$username, $password, $encrpt_key)");
            // echo "CALL login('$username', '$password', '$encrpt_key')";
            $data = array();
            while ($row = $result->fetch_object()) {                
                $data[] = get_object_vars($row);
            } 
            $result->close();
            return $data;
        } catch (\mysqli_sql_exception $e) {
            throw $e->getTrace();
        }
    }

    function post($username, $password, $encrpt_key) {
        try {
            $result = $this->mysqli->query("CALL user('$username', '$password', 'I')");
            if ($result) {
                $returnResponse = 'inserted';
            } else {
                // $result[0]['error']
                $returnResponse = 'already_existed';
            }
            mysqli_free_result($result);
            return $returnResponse;
        } catch (\mysqli_sql_exception $e) {
            print_r($e);
            throw $e;
        }
    }

    function put() {
        
    }

    function delete() {
        
    }

    function __destruct() {
        mysqli_close($this->mysqli);
    }

    // read, create, update, delete

    // getUser (<id-data>) -> <complete-data>

    // createUser (<data>) 

    // updateUser(id, <data>)

    // deleteUser(id)

}
?>