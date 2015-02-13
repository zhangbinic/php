<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhangbin
 * Date: 2015-02-12
 * Time: 下午4:28
 * To change this template use File | Settings | File Templates.
 */
require('test/test1.php');
require('test/test2.php');
//namespace test;

class testa{

    public function test()
    {

    }

}

testa::test();

//$test = new test1();
//$test->test();

/*
function __autoload($class)
{
//    echo __DIR__.'test/'.$class.'.php';
    require(__DIR__.'test/'.$class.'.php');
}
*/