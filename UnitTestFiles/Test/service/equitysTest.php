<?php

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

require_once (__DIR__ .'/../../../vendor/autoload.php');

class equitysTest extends TestCase
{
    public function testRead()
    {
        $_SESSION['user_id'] = T_USER_ID;
        $_GET['equity_id'] = T_EQUITY_ID;
        $equity = new \EquityS;
        
        $equity_data = $equity->get(); 
        $this->assertEquals($equity_data[0]['user_id'], T_USER_ID);
    }

    public function testUpdate() {
        $equity = new \EquityS;
        $_POST['sector_id'] = 1;
        $_POST['is_full'] = '1';
        $_POST['name'] = 'tcs';
        $_POST['number'] = 'TCS';
        $_POST['start_date'] = '2010-11-11';
        $_POST['finish_date'] = '2010-11-11';
        $_POST['notes'] = 'notes';
        $_POST['initial_price'] = 123;
        $_POST['current_price'] = 22;
        $_POST['future_price'] = 233;
        $_POST['current_invest_year'] = 11;
        $_POST['future_invest_year'] = 11;
        $_POST['current_cagr'] = 11;
        $_POST['future_cagr'] = 11;
        $_POST['user_id'] = T_USER_ID;
        $_POST['equity_id'] = T_EQUITY_ID;

        $result = $equity->put();
        
        $this->assertEquals($result, T_EQUITY_ID);
        $equity_data = $equity->get();
        $this->assertEquals($equity_data[0]['name'], 'tcs');
    }
}
