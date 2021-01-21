<?php

require_once (__DIR__ .'/../vendor/autoload.php');

/*
 * @File : EquityS.php
 * @Class : Equity
 * @Description: Service file for equity
 * @Created:    04.12.2020
 */
class EquityS {
    public function get() {
        $user_id = $_SESSION['user_id'];
        $equity_id  = isset($_GET['equity_id'])?$_GET['equity_id']:-1;
        $full     = isset($_GET['full'])?$_GET['full']:'-1';
        $equity_r      = new EquityR();
        return $equity_r->get($user_id, $equity_id, $full);
        
    }

    public function post() {
        $dateUtils = new date_format();

        $user_id   = $_SESSION['user_id'];
        $equity_w = new EquityW();
        $data = array();
        
        $data['sector_id'] = isset($_POST['sector_id'])?$_POST['sector_id']:0;
        $data['is_full'] = isset($_POST['is_full'])?$_POST['is_full']:'1';
        $data['name'] = isset($_POST['name'])?$_POST['name']:'';
        $data['number'] = isset($_POST['number'])?$_POST['number']:'';
        $data['start_date'] = isset($_POST['start_date'])?$dateUtils->get_formatted_date($_POST['start_date']):'0000-00-00';
        $data['finish_date'] = isset($_POST['finish_date'])?$dateUtils->get_formatted_date($_POST['finish_date']):'0000-00-00';
        $data['notes'] = isset($_POST['notes'])?$_POST['notes']:'';
        $data['website'] = isset($_POST['website'])?$_POST['website']:'';
        $data['initial_price'] = isset($_POST['initial_price'])?$_POST['initial_price']:0;
        $data['current_price'] = isset($_POST['current_price'])?$_POST['current_price']:0;
        $data['future_price'] = isset($_POST['future_price'])?$_POST['future_price']:0;
        $data['current_invest_year'] = isset($_POST['current_invest_year'])?$_POST['current_invest_year']:0;
        $data['future_invest_year'] = isset($_POST['future_invest_year'])?$_POST['future_invest_year']:0;
        $data['current_cagr'] = isset($_POST['current_cagr'])?$_POST['current_cagr']:0;
        $data['future_cagr'] = isset($_POST['future_cagr'])?$_POST['future_cagr']:0;
        return $equity_w->create($user_id, $data);
    }

    public function put() {
        $dateUtils = new date_format();
        $user_id   = $_SESSION['user_id'];
        $equity_id   = $_POST['equity_id'];
        $equity_w = new EquityW();
        $data = array();
        $data['sector_id'] = isset($_POST['sector_id'])?$_POST['sector_id']:0;
        $data['is_full'] = isset($_POST['is_full'])?$_POST['is_full']:'1';
        $data['name'] = isset($_POST['name'])?$_POST['name']:'';
        $data['number'] = isset($_POST['number'])?$_POST['number']:'';
        $data['start_date'] = isset($_POST['start_date'])?$dateUtils->get_formatted_date($_POST['start_date']):'0000-00-00';
        $data['finish_date'] = isset($_POST['finish_date'])?$dateUtils->get_formatted_date($_POST['finish_date']):'0000-00-00';
        $data['notes'] = isset($_POST['notes'])?$_POST['notes']:'';
        $data['website'] = isset($_POST['website'])?$_POST['website']:'';
        $data['initial_price'] = isset($_POST['initial_price'])?$_POST['initial_price']:0;
        $data['current_price'] = isset($_POST['current_price'])?$_POST['current_price']:0;
        $data['future_price'] = isset($_POST['future_price'])?$_POST['future_price']:0;
        $data['current_invest_year'] = isset($_POST['current_invest_year'])?$_POST['current_invest_year']:0;
        $data['future_invest_year'] = isset($_POST['future_invest_year'])?$_POST['future_invest_year']:0;
        $data['current_cagr'] = isset($_POST['current_cagr'])?$_POST['current_cagr']:0;
        $data['future_cagr'] = isset($_POST['future_cagr'])?$_POST['future_cagr']:0;
        
        $equity_w->update($equity_id, $user_id, $data);
        return $equity_id;
    }

    public function delete() {
        $user_id   = $_SESSION['user_id'];
        $equity_id   = $_POST['equity_id'];
        $equity_w = new EquityW();
        return $equity_w->delete($equity_id, $user_id);
    }
}

$service = new EquityS();
$_SESSION['user_id'] = 2185;
// $_GET['equity_id'] = 4;
// var_dump($service->get());

// $_POST['sector_id'] = 1;
// $_POST['is_full'] = '1';
// $_POST['name'] = 'tcs';
// $_POST['number'] = 'TCS';
// $_POST['start_date'] = '2010-11-11';
// $_POST['finish_date'] = '2010-11-11';
// $_POST['notes'] = 'notes';
// $_POST['initial_price'] = 123;
// $_POST['current_price'] = 22;
// $_POST['future_price'] = 233;
// $_POST['current_invest_year'] = 11;
// $_POST['future_invest_year'] = 11;
// $_POST['current_cagr'] = 11;
// $_POST['future_cagr'] = 11;

// var_dump($service->post());


// $_POST['equity_id'] = 5;
// var_dump($service->put());
// var_dump($service->put());

// var_dump($service->delete());

