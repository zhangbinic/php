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

