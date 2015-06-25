<?php

set_time_limit(0);

// $conn = mysql_connect('localhost:3310','root','bhxz');

$database = "aikang";
$table = "dm_goods_copy";

//$database = "test";
//$table = "dm_goods";

//var_dump($conn);die;
mysql_select_db("{$database}");
mysql_set_charset('utf8');

$goodstempsql = "select * from dm_goods_temp limit 1000000";

$TempInfos = mysql_query($goodstempsql);

while($row = mysql_fetch_assoc($TempInfos))
{
  //var_dump($row);
  $goodssql = "select * from {$table} where goods_number='{$row['goods_number']}'";
  $result = mysql_query($goodssql);
  $goodsinfo = mysql_fetch_assoc($result);
  //var_dump($goodsinfo);die;
  if(!$goodsinfo)
  {
    unset($row['goods_id']);
    $addsql = "INSERT INTO {$table}(goods_name,goods_bc,goods_model,goods_series,goods_class,goods_number,goods_group) VALUES('{$row['goods_name']}','{$row['goods_bc']}','{$row['goods_model']}','{$row['goods_series']}','{$row['goods_class']}','{$row['goods_number']}','{$row['goods_group']}')";
    echo $addsql;
    mysql_query($addsql);
  }
  else
  {
    //echo 2;
  }
}
echo 'success';
die;