<?php
header('Content-Type:text/html;charset=utf-8;');

class word
{ 
	function start()
	{
		ob_start();
		echo '<html xmlns:o="urn:schemas-microsoft-com:office:office"
		xmlns:w="urn:schemas-microsoft-com:office:word"
		xmlns="http://www.w3.org/TR/REC-html40">';
	}
	function save($path,$html)
	{
		echo "</html>";
		$data = ob_get_contents();
		$data = $html;
		ob_end_clean();
		//echo $data;die;
		file_put_contents($path, $data);
		$this->wirtefile($path,$data);
	}
	 
	function wirtefile ($fn,$data)
	{
		
		$fp=fopen($fn,"wb");
		//echo $fp;die;
		fwrite($fp,$data);
		fclose($fp);
	}
}

$html = ' 
<table width=600 cellpadding="6" cellspacing="1" bgcolor="#336699"> 
<tr bgcolor="White"> 
  <td>PHP10086</td> 
  <td><a href="http://www.php10086.com" target="_blank" >http://www.php10086.com</a></td> 
</tr> 
<tr bgcolor="red"> 
  <td>PHP10086</td> 
  <td><a href="http://www.php10086.com" target="_blank" >http://www.php10086.com</a></td> 
</tr> 
<tr bgcolor="White"> 
  <td colspan=2 > 
  PHP10086<br> 
  最靠谱的PHP技术博客分享网站 
  <img src="http://www.php10086.com/wp-content/themes/WPortal-Blue/images/logo.gif"> 
  </td> 
</tr> 
</table> 
';
$html = file_get_contents('http://www.php100.com/');

//批量生成 
for($i=1;$i<=3;$i++){ 
    $word = new word(); 
    $word->start(); 
    //$html = "aaa".$i; 
    // $wordname = 'PHP淮北的个人网站--PHP10086.com'.$i.".doc";
    $wordname = 'PHP10086.com'.$i.".doc";  
    //echo $html;die;
    //$html = iconv('utf-8', 'gbk', $html);
    $word->save($wordname,$html); 
    ob_flush();//每次执行前刷新缓存 
    flush(); 
}