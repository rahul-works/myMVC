<?php

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

require_once (__DIR__ .'/../../../vendor/autoload.php');

class sectorTest extends TestCase
{
    public function testRead(){
        $sector = new \SectorR;
        $_GET['test'] = 1;
        $sector_data = $sector->get('');
        $this->assertEquals($sector_data[0]['id'], 1);
    }
}
?>