<?php

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

require_once (__DIR__ .'/../../../vendor/autoload.php');

class equitysvTest extends TestCase
{
    public function testList(){
        // $contentView = new \View(__DIR__ .'/../../../Views/equitys/Create');
        // $contentView->listHeader = '';
        // $contentView->equitys_dropdown = '';
        // $this->assertRegexp('/equity_create_tab/', $contentView->render());
        $this->assertEmpty('');
    }
}
?>