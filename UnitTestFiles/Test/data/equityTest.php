<?php

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

require_once (__DIR__ .'/../../../vendor/autoload.php');

class equityTest extends TestCase
{
    public function testRead(){
        $equity = new \EquityR;
        $equity_data = $equity->get(T_USER_ID);
        $this->assertEquals($equity_data[0]['user_id'], T_USER_ID);
    }

    public function testUpdate() {
        $equity_w = new \EquityW;
        $equity_r = new \EquityR;
        $data = array();
        $data['sector_id'] = 1;
        $data['is_full'] = '1';
        $data['name'] = 'tcs1133';
        $data['number'] = 'TCS';
        $data['start_date'] = '2010-11-11';
        $data['finish_date'] = '2010-11-11';
        $data['notes'] = 'notes';
        $data['initial_price'] = 123;
        $data['current_price'] = 22;
        $data['future_price'] = 233;
        $data['current_invest_year'] = 11;
        $data['future_invest_year'] = 11;
        $data['current_cagr'] = 11;
        $data['future_cagr'] = 11;

        
        $result = $equity_w->update(T_EQUITY_ID, T_USER_ID, $data);
        $this->assertEquals($result, 1);
        echo T_USER_ID, T_EQUITY_ID;
        $equity_data = $equity_r->get(T_USER_ID, T_EQUITY_ID);
        $this->assertEquals($equity_data[0]['name'], 'tcs1133');
    }
}
