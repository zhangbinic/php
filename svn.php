<?php 
/*
* 2014-6-6 15:54
* 把svn日志用数组处理下，方便写入数据库和查看
* 用表格形式看开发日期和开发的提交文件和描述
*/
echo '<pre>';
header('Content-Type:text/html;charset=utf-8');
// $filecontent = file_get_contents('svn.txt');
$filecontent = file('svn3.txt');
// $filecontent = explode('版本:',$filecontent);
// rsort($filecontent);
// echo count($filecontent);
// exit;
$i=1;
$a = '';
foreach($filecontent as $k=>$v){
	// echo $v;die;
	if($a==""){
		$a = trim($v).',';
	}else{
		if(trim($v)==""){
			$a .= trim($v).'{}';
		}else{
			$a .= trim($v).',';
		}
	}
}
$a = str_replace('----,','',$a);
$a = explode('{}',$a);
// print_r($a);
// foreach($a as $v){
// 	$c = explode(',',$v);
// 	array_pop($c);
// 	print_r($c);
// 	echo '<pre>';
// }
// die;
// print_r($filecontent);
 ?>
<table border="1" width="100%">
	<tr style="display:none;">
		<th style="display:none;">版本</th>
		<th style="display:block;">作者</th>
		<th>开发日期</th>
		<th>开发文件提交备注</th>
	</tr>
	<?php 
		foreach($a as $v){
			$info = '';
			$line = explode(',',$v);
			array_pop($line);

			$count = count($line);
			// print_r($line);die;
			$beta = str_replace('版本:','',$line[0]);
			$author = str_replace('作者:','',$line[1]);
			$date = str_replace('日期:','',$line[2]);
			for($i=3;$i<$count;$i++){
				$info .= $line[$i].'<br/>';
			}
			$info = rtrim($info,'');
			// echo $info;
	 ?>	
	<tr>
		<td style="display:block;"><?php echo $beta ?></td>
		<td style="display:none;"><?php echo $author ?></td>
		<td style="display:none;"><?php echo $date ?></td>
		<td><?php echo $info ?><div style="overflow:auto;width:100px;height:100px;display:none;"></div></td>
	</tr>
	<?php 
	// die;
		}
	 ?>
</table>