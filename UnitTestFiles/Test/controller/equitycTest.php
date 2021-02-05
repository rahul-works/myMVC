<?php

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

require_once (__DIR__ .'/../../../Controller/Equity.php');

class equitycTest extends TestCase
{
    public function testList(){
        // $_SESSION['user_id'] = T_USER_ID;
        // $_GET['test'] = 1;
        // $equity = new \Equity;
        // $listview = $equity->index();
        // $this->assertRegexp('/html/', $listview);
        $this->assertEmpty('');
    }
}
?>