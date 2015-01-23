<?php 
include 'index.php';
//查看某个数据库的某个表的字段和注释
$arr = viewtablefieldcomment('haiyou','bh_pipe_parameter');
$keys = array_keys($arr);
$values = array_values($arr);
foreach($keys as $v)
{
	echo "'{$v}',<br>";
}
foreach($values as $v)
{
	echo "'{$v}',<br>";
}
die;
//print_r($keys);die;
print_r($values);die;
print_r($arr);die;

$str = array();
foreach($arr as $k=>$v)
{
	//echo substr($v['type'],0,6);
	if(substr($v['type'],0,6)=='double' || substr($v['type'],0,6)=='smalli')
	{
		//echo 1;
		$keys = array_keys($v);
		$str[$k] = $keys[0];
		//$str[$k] = $v;
	}
}
//print_r($str);die;
$str = array_values($str);
//$str = join(',',$str);
//echo count($str);die;
$strs = '';
foreach($str as $v)
{
	$strs.="'{$v}',";
}
echo $strs;die;
//print_r($str);
