<?php

namespace UnitTestFiles\Test;

use Date;
use PHPUnit\Framework\TestCase;

require_once (__DIR__ .'/../../../vendor/autoload.php');

class dateFormatTest extends TestCase
{
    public function testDate(){
        $date = new \date_format;
        $this->assertEquals($date->get_formatted_date('January 08, 2021'), '2021-01-08');
        $this->assertEquals($date->get_formatted_date1('January 08, 2021'), 'January 08, 2021');
        $this->assertEquals($date->get_formatted_date2('January 08, 2021'), '01/08/2021');
        $this->assertTrue($date->validate_date('2021-01-08', 'Y-m-d'));
        $this->assertTrue($date->validate_date('January 08, 2021', 'F d, Y'));
        $this->assertTrue($date->validate_date('01/08/2021', 'm/d/Y'));
    }
}
?>