<?php

if(!class_exists("DATABASE"))
{
    require_once('mysqli.inc.php');
}
use ConnectDb AS DB;

class EquityW {
    public function create($user_id, $data) {
        try {
            // call the stored procedure
            $sql = "CALL i_equity(
                $user_id, 
            '".$data['sector_id']."',
            '".$data['is_full']."',
            '".$data['name']."',
            '".$data['number']."',
            '".$data['start_date']."',
            '".$data['finish_date']."',
            '".$data['notes']."',
            '".$data['initial_price']."',
            '".$data['current_price']."',
            '".$data['future_price']."',
            '".$data['current_invest_year']."',
            '".$data['future_invest_year']."',
            '".$data['current_cagr']."',
            '".$data['future_cagr']."')";
            $data = DB::query(DATABASE::INSERT, $sql);
            if (isset($data[0]['Level'])  && $data[0]['Level'] === 'Error') {
                // handle DB error in global page 
                // display $data in dev & 404 in live
                print_r($data); die;
                // die;
            } else {
                return isset($data[0])?$data[0]:false;
            }
        } catch (mysqli_sql_exception $e) {
            throw $e->getTrace();
        }
    }

    public function update($id, $user_id, $data) {
        try {
            // call the stored procedure
            $sql = "CALL u_equity($id,
            $user_id, 
            '".$data['sector_id']."',
            '".$data['is_full']."',
            '".$data['name']."',
            '".$data['number']."',
            '".$data['start_date']."',
            '".$data['finish_date']."',
            '".$data['notes']."',
            '".$data['initial_price']."',
            '".$data['current_price']."',
            '".$data['future_price']."',
            '".$data['current_invest_year']."',
            '".$data['future_invest_year']."',
            '".$data['current_cagr']."',
            '".$data['future_cagr']."')";
            $data = DB::query(DATABASE::UPDATE, $sql);
            return $data;
        } catch (mysqli_sql_exception $e) {
            throw $e->getTrace();
        }
    }

    public function delete($id, $user_id) {
        try {
            // call the stored procedure
            $sql = "CALL d_equity($id,
            $user_id)";
            $data = DB::query(DATABASE::DELETE, $sql);
            return $data;
        } catch (mysqli_sql_exception $e) {
            throw $e->getTrace();
        }
    }
}
// $equity = new equityW;
// $data = array();
// $data['sector_id'] = 1;
// $data['is_full'] = '1';
// $data['name'] = 'tcs1133';
// $data['number'] = 'TCS';
// $data['start_date'] = '2010-11-11';
// $data['finish_date'] = '2010-11-11';
// $data['notes'] = 'notes';
// $data['initial_price'] = 123;
// $data['current_price'] = 22;
// $data['future_price'] = 233;
// $data['current_invest_year'] = 11;
// $data['future_invest_year'] = 11;
// $data['current_cagr'] = 11;
// $data['future_cagr'] = 11;

// print_r($equity->create(2185, $data));
// print_r($equity->update(4, 2185, $data));
// print_r($equity->delete(2, 2185));
?>