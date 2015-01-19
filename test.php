<?php 
include 'index.php';
//查看某个数据库的某个表的字段和注释
$arr = viewtablefieldcomment('haiyou','bh_container_parameter');
print_r($arr);

