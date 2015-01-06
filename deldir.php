<?php
/**
* 删除指定目录下的所有文件及目录
* 优势：文件量很大的情况下，脚本删除比windows自带的删除快很多，在18423个文件的情况下删除，脚本删除很快，也就20秒左右，用windows删除至少3分钟
* 美中不足的是：提示删除文件夹失败，需加@符号屏蔽错误
* 2014-6-14 21:37
* update:2014-7-3 10:28 删除TP3.2的Runtime目录下的目录及文件
* zhangbin
* E:\360PhoneInfo\phpstorm\seasky\php\log\下面还有很多小工具
*/
$path = 'D:\wamp\www\huayou\Runtime\Logs';
// $path = 'D:\wamp\www\huayou\Runtime';
$path = 'D:\wamp\www\api\BHApi\Runtime\Logs';
$path = str_replace('\\','/',$path);
// echo $path;die;
function delfile($path){
	$filearr = scandir($path);
	foreach($filearr as $file){
		if($file!='.' && $file!='..'){
			$newpath = $path.'/'.$file;
			if(is_dir($newpath)){
					delfile($newpath);
					deldir($newpath);
			}else{
					echo $newpath.'<br>';
					unlink($newpath);
					deldir($newpath);
			}
		}
	}
}
//递归删除级联目录
function deldir($delpath){
    
    if(is_dir(dirname($delpath))){
        return rmdir($delpath);
    }
    deldir(dirname($delpath));
    return rmdir($delpath);
}
delfile($path);
 ?>