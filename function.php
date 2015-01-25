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
 * 获取html的内容，然后进行正则替换
 * [cathtmlcontent description]
 * @param  [type] $filepath [description]
 * @return [type]           [description]
 */
function cathtmlcontent($filepath)
{
	/*
	2015-1-25
	$string = cathtmlcontent('sheet001.htm');
	//var_dump($string);die;第一次这打印出NULL值的原因是：函数必须有返回值，即return，研究了一会才搞清楚

	然后用这个字符串测试了下正则，正则表达式没问题！
	// $string = "<tr height=22 style='height:16.5pt'>
	//   <td height=22 class=xl75 style='height:16.5pt;border-top:none'>部位名称</td>
	//   <td colspan=8 class=xl100 style='border-right:.5pt dashed black'>　</td>
	//  </tr>
	// ";
	
	正则表达式有时候也不按照套路出牌，比如就意外的把该替换的东西给我漏了！
	// <tr height=22 style='height:16.5pt'>
	//   <td colspan=9 height=22 class=xl97 width=648 style='border-right:.5pt dashed black;
	//   border-bottom:.5pt dashed black;height:16.5pt;width:486pt'>外部腐蚀机理识别</td>****
	//  </tr>
	
	
	// <tr >
	//   <td colspan=9 >
	//   border-bottom:.5pt dashed black;height:16.5pt;width:486pt'>外部腐蚀机理识别</td>****
	//  </tr>
	

	$patterns = array();
	$patterns[0] = '/height=(.*)/';
	$patterns[1] = '/文本类型/';
	$patterns[2] = '/日期类型/';
	$patterns[3] = '/数字类型/';
	$patterns[4] = '/压力容器简图/';

	$replacements = array();
	$replacements[0] = '>';
	$replacements[1] = '<input title="" type="text" value="文本类型">';
	$replacements[2] = '<input title="" onclick="WdatePicker();" type="text" value="日期类型">';
	$replacements[3] = '<input title="" type="text" value="数字类型">';
	$replacements[4] = '<img src="__Public/image/plantdemo.jpg" alt="" width="300">';

	echo preg_replace($patterns, $replacements, $string);die;

	echo $string;die;																		

	 */
	$content = '';
	if(file_exists($filepath))
	{
		$content = file_get_contents($filepath);
		//$content = htmlspecialchars($content);
		//echo $content;
		return $content;
	}
	else
	{
		p('no file');
	}
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
	
	/*******************使用方法*********************/
	//查看某个数据库的某个表的字段和注释
	/*
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
	
	//通过字段类型决定出浮点型数据和整型数据的表单元素验证
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

	*/
}