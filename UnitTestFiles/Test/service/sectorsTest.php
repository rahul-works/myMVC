<?php

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

require_once (__DIR__ .'/../../../vendor/autoload.php');

class sectorsTest extends TestCase
{
    public function testRead()
    {
        $country = new \SectorS;
        $_GET['search'] = '';
        $sector_data = $country->get();
        $this->assertEquals($sector_data[0]['id'], 1);
    }
}
?>