<?php
/**
 * Created by JetBrains PhpStorm.
 * User: zhangbin
 * Date: 2015-02-12
 * Time: 下午4:28
 * To change this template use File | Settings | File Templates.
 */
//require('test/test1.php');
test1::test();
//$test = new test1();
//$test->test();

function __autoload($class)
{
    require('./test/'.$class.'.php');
}