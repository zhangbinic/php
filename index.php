<?php 
/**
 * 308964132@qq.com
 * zhangbin135
 * 开始书写自己的工具函数,也叫方法。
 */
function p($result,$stop=false)
{
	echo '<pre>';
	print_r($result);
	if($stop)
	{
		die();
	}
}

/**
 * guitar songs
 * 红雪莲
 */



/** 
* 处理指定的多列标题，减少代码量 
* @param $str 
* @return array 
* 2014-12-25 上午11:18 
*/ 
function exportexcelformat($str) 
{ 
/********输入部分********/ 
$e = array(); 
$str = '油田名称	平台名称	系统名称	设备类型	压力容器编号	压力容器名称	资产编码	压力容器类别	大小尺寸	登记表编号	注册登记机构	注册登记日期	使用证编号	注册登记人员	产权单位	产权单位代码	使用单位	使用单位地址	邮政编码	安全管理部门	安全管理人员	联系电话	设计单位	设计单位代码	制造单位	制造单位代码	制造国(地区)	设计/建造标准	制造日期	出厂编号	产品监检单位	监检单位代码	安装单位	安装单位代码	安装竣工日期	投用日期	购置日期	所在区域	型号	设计寿命	设备内径mm	筒体材料	封头材料	内衬材料	夹套材料	筒体厚度mm	封头厚度mm	内衬壁厚mm	夹套厚度mm	容积m3	设备高(长)mm	壳体重量kg	内件重量kg	充装重量kg	有无保温绝热mm	壳程设计压力MPa	壳程设计温度℃	壳程最高压力MPa	管程设计压力MPa	管程设计温度℃	管程最高压力Mpa	夹套设计压力MPa	夹套设计温度℃	夹套最高压力Mpa	壳程操作压力Mpa	壳程操作温度℃	管程操作压力Mpa	管程操作温度℃	壳程介质	管程介质	夹套介质	下次检验日期'; 
$arr = explode('	',$str); 
$k = 1; 
$c = 64; 
$offset = 26; 

/********执行部分********/ 
foreach($arr as $a) 
{ 
if($k<=$offset) 
{ 
$e[chr($c+$k).'1'] = $a; 
} 
elseif($k>$offset && $k<=$offset*2) 
{ 
$e[chr($c+1).chr($c+$k-$offset).'1'] = $a; 
} 
elseif($k>$offset*2 && $k<=$offset*3) 
{ 
$e[chr($c+2).chr($c+$k-$offset*2).'1'] = $a; 
} 
$k++; 
} 
/********输出部分********/ 
return $e; 
} 

/**
 * [catfilecontent description]
 * @param  [type] $filepath [description]
 * @return [type]           [description]
 */
function catfilecontent($filepath)
{
	$d = array();
	header('Content-Type:text/html;charset=utf-8');
	// $content = file_get_contents('1.xlsx');
	// $content = file_get_contents('1.txt');
	$content = file('1.txt');
	// echo $content;
	echo '<pre>';
	// print_r($content);
	foreach($content as $v)
	{
		$arr[] = str_replace('	','*',htmlspecialchars($v));
		// echo htmlspecialchars($v);
		// echo '<br>';
	}
	// print_r($arr);
	foreach($arr as $a)
	{
		$b = explode('**',$a);
		foreach($b as $c)
		{
			$d[] = $c;
		}
	}
	$d = array_unique($d);
	$d = array_values($d);

	return $d;
}

/**
 * [viewtablefieldcomment description]
 * @param  [type] $database [description]
 * @param  [type] $table    [description]
 * @return [type]           [description]
 */
function viewtablefieldcomment($database,$tables)
{
	header('Content-Type:text/html;charset=utf-8');
	echo '<pre>';
	mysql_connect('192.168.123.213:3310','haiyou','haiyou');
	mysql_query('set names utf8');
	mysql_select_db($database);

	/******************************************************************/
	//自动化取出表结构的字段和字段的注释，还能用于表格数据显示标题使用。
	//2014-9-2
	$sql = "SHOW FULL COLUMNS FROM {$tables}";
	$result = mysql_query($sql);
	//print_r($result);
	$fieldresult = mysql_fetch_assoc($result);
	//print_r($fieldresult);die;
	$i = 0;
	while($row = mysql_fetch_assoc($result)){
		//$infos[$i][$row['Field']] = $row['Comment'];
		//$infos[$i]['type'] = $row['Type'];
		//$i++;
		$infos[$row['Field']] = $row['Comment'];
	}
	return $infos;
	//print_r($infos);die;
}