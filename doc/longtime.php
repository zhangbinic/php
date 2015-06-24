<?php 
/*
 1.truncate table奇妙的不起作用了？
 解决方式：
 刚才truncate onethink_goods失败后goods_id不从1开始的原因是：add数据时，默认把goods_id的值带进来了，unset($v['goods_id'])后再进行add就好了，以为是truncate不起作用了呢，还特意百度了一下呢！
 
 2.asp连接sqlserver2008时，始终提示数据库连接失败！
 解决方式：
 1）数据库写错了，而且端口默认是3306的话，还不用加端口号
 2）表名或字段名写错，视图表也是一样的查询方式，没有区别

 3.asp连接mysql数据库写数据！
 1）软件的支持：MYSQL ODBC的32位或64位
 2）连接代码有一点绕，最后还是踏入了ASP的大门

 4.php30秒的执行时间只能处理1万条数据的查询，否则就会超时，导致崩溃

 5.

 */






















































 ?>