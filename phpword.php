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
<table border="1" cellspacing="0" cellpadding="0" width="600">
  <tr>
    <td width="19%"><p align="center">注册登记机构 </p></td>
    <td width="42%" colspan="6"></td>
    <td width="16%"><p align="center">注册登记日期 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">单位内部编号 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">使用证编号 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">注册登记人员 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">使用单位 </p></td>
    <td width="80%" colspan="8"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">使用单位地址 </p></td>
    <td width="42%" colspan="6"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">邮政编码 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">安全管理部门 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">安全管理人员 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">联系电话 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">容器名称 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">容器类别 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">容器分类 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">设计单位 </p></td>
    <td width="42%" colspan="6"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">设计单位代码 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">制造单位 </p></td>
    <td width="42%" colspan="6"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">制造单位代码 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">制造国(地区)</p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">制造日期 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">出厂编号 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">产品监检单位 </p></td>
    <td width="42%" colspan="6"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">监检单位代码 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">安装单位 </p></td>
    <td width="42%" colspan="6"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">安装单位代码 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">安装竣工日期 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">投用日期 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">所在区域 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">容器内径 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">筒体材料 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">封头材料 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">内衬材料 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">夹套材料 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">筒体厚度 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">封头厚度 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">内衬壁厚 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">夹套厚度 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">容器容积 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">容器高(长)</p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">壳体重量 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">内件重量 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">充装重量 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">有无保温绝热 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">壳程设计压力 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">壳程设计温度 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">壳程最高压力 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">管程设计压力 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">管程设计温度 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">管程最高压力 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">夹套设计压力 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">夹套设计温度 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">夹套最高压力 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">壳程介质 </p></td>
    <td width="14%"><p align="center">&nbsp;</p></td>
    <td width="15%" colspan="3"><p align="center">管程介质 </p></td>
    <td width="11%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">夹套介质 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">产权单位 </p></td>
    <td width="42%" colspan="6"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">产权单位代码 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="100%" colspan="9"><p align="center">安全附件及有关装置 </p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">&nbsp; </p>
      <div>
        <p>安全附件 </p>
      </div>
      &nbsp;名称
      </p></td>
    <td width="15%" colspan="2"><p align="center">型号 </p></td>
    <td width="19%" colspan="3"><p align="center">规格 </p></td>
    <td width="7%"><p align="center">数量 </p></td>
    <td width="38%" colspan="2"><p align="center">制造单位 </p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">安全阀 </p></td>
    <td width="15%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="19%" colspan="3"><p align="center">&nbsp;</p></td>
    <td width="7%"><p align="center">&nbsp;</p></td>
    <td width="38%" colspan="2"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">压力表 </p></td>
    <td width="15%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="19%" colspan="3"><p align="center">&nbsp;</p></td>
    <td width="7%"><p align="center">&nbsp;</p></td>
    <td width="38%" colspan="2"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">液位计 </p></td>
    <td width="15%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="19%" colspan="3"><p align="center">&nbsp;</p></td>
    <td width="7%"><p align="center">&nbsp;</p></td>
    <td width="38%" colspan="2"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">温度计 </p></td>
    <td width="15%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="19%" colspan="3"><p align="center">&nbsp;</p></td>
    <td width="7%"><p align="center">&nbsp;</p></td>
    <td width="38%" colspan="2"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">紧急切断阀 </p></td>
    <td width="15%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="19%" colspan="3"><p align="center">&nbsp;</p></td>
    <td width="7%"><p align="center">&nbsp;</p></td>
    <td width="38%" colspan="2"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">&nbsp;</p>
      <div>
        <p>检验记录档案 </p>
      </div>
      &nbsp;检验单位
      </p></td>
    <td width="42%" colspan="6"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">检验单位代码 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">检验日期 </p></td>
    <td width="15%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="19%" colspan="3"><p align="center">检验类别 </p></td>
    <td width="7%"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">主要问题 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">安全状况等级 </p></td>
    <td width="15%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="19%" colspan="3"><p align="center">检验报告编号 </p></td>
    <td width="7%"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">下次检验日期 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">&nbsp;</p>
      <div>
        <p>事故记录档案 </p>
      </div>
      &nbsp;事故类别
      </p></td>
    <td width="15%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="19%" colspan="3"><p align="center">事故发生日期 </p></td>
    <td width="7%"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">事故处理 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">设备变动方式 </p></td>
    <td width="15%" colspan="2"><p align="center">&nbsp;</p></td>
    <td width="19%" colspan="3"><p align="center">变动主要项目 </p></td>
    <td width="7%"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">设备变动日期 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="19%"><p align="center">变动承担单位 </p></td>
    <td width="42%" colspan="6"><p align="center">&nbsp;</p></td>
    <td width="16%"><p align="center">承担单位代码 </p></td>
    <td width="22%"><p align="center">&nbsp;</p></td>
  </tr>
  <tr>
    <td width="100%" colspan="9" valign="top"><p>其他情况： <br />
      &nbsp;</p>
      <p>&nbsp;</p>
<img src="http://www.php100.com/statics/images//php100/logo.gif">
      </td>
  </tr>
  <tr>
    <td width="45%" colspan="4" valign="top"><br clear="all" />
      <p>使用单位(章)： </p>
      <p>&nbsp;</p>
      <p align="right">年月日 </p></td>
    <td width="54%" colspan="5" valign="top"><p>安全监察机构(章)： </p>
      <p>&nbsp;</p>
      <p align="right">年月日 </p></td>
  </tr>
</table>
';
//$html = file_get_contents('http://www.php100.com/');

//批量生成 
for($i=1;$i<=1;$i++){ 
    $word = new word(); 
    $word->start(); 
    //$html = "aaa".$i; 
    // $wordname = 'PHP淮北的个人网站--PHP10086.com'.$i.".doc";
    $wordname = 'PHP10086.com'.$i.".doc";  
    //echo $html;die;
    $html = iconv('utf-8', 'gbk', $html);
    $word->save($wordname,$html); 
    ob_flush();//每次执行前刷新缓存 
    flush(); 
}