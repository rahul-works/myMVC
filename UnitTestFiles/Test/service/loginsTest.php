<?php

namespace UnitTestFiles\Test;

use PHPUnit\Framework\TestCase;

require_once (__DIR__ .'/../../../vendor/autoload.php');

class loginsTest extends TestCase
{
    public function testLogin()
    {
        $login = new \LoginS;
        
        $_POST['email'] = 'rahul.thakur9985@gmail.com';
        $_POST['password'] = '111111';
        $user_data = $login->post();
        $this->assertSame($user_data[0]['email'], 'rahul.thakur9985@gmail.com');
    }
}
