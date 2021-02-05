<?php

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

require_once (__DIR__ .'/../../../vendor/autoload.php');

class loginTest extends TestCase
{
    public function testLogin(){
        $read_user = new \UserR;
        $user_data = $read_user->get('rahul.thakur9985@gmail.com', '111111');
        $this->assertSame($user_data[0]['email'], 'rahul.thakur9985@gmail.com');
    }
}
