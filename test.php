<?php 
# http://segmentfault.com/blog/tony/1190000000395951
# sublime text 2下直接运行php，前提是必须增加“环境变量到path中”
# phpstorm中//TODO的重要性，地图标记的作用
# todo(php.javascript),htmltodo(html)
include 'function.php';

$host = '192.168.123.213:3310';
$user = 'haiyou';
$password = 'haiyou';

$database = 'haiyou';

// 0.连接数据库
connectdatabase($host,$user,$password);
// 1.根据标题计算excel的列显示
// exportexcelformat();

// 2.读取文本文件的内容格式化为数组
// catfilecontent();

// 3.显示文件内容
// cathtmlcontent('function.php');

// 4.显示数据表和表注释信息
// viewtablecomment($database);

// 5.显示数据表的字段和注释
viewtablefieldcomment($database,$table='bh_thickness_measurement_part');

// 6.扫描此目录下的文件列表
// scandirallfiles('D:\wamp\www\haiyou');

// 7.复制文件到某个目录下
// copyfilestodist('D:\\',array('D:\wamp\php100\1.txt'));

function urlcontent()
{
	$url = 'http://www.baidu.com/s?wd=cloga';
	$content = file_get_contents($url);
	$content = htmlspecialchars($content);
	echo $content;	
}


//echo '<pre>';

//print_r($Infos);die;

// $path = "D:/Program Files/Foxmail 7.1/Foxmail.exe";
//echo file_exists($path);die;
//system($path);

//die;
// $directory = 'f:\www\yunketang';
//$files = scandirallfiles($directory);
//

/*
'set_displayname' => $infos[$k]['set_displayname']

 */
//print_r($files);die;

//$result = copyfilestodist('f:/www/yunketang',$files);

//var_dump($result);


