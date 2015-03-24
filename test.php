<?php 
# http://segmentfault.com/blog/tony/1190000000395951
# sublime text 2下直接运行php，前提是必须增加“环境变量到path中”
# phpstorm中//TODO的重要性，地图标记的作用
# todo(php.javascript),htmltodo(html)
include 'function.php';
set_time_limit(0);
echo '<pre>';
$Infos = viewtablefieldcomment('haiyou','bh_knowled_standard');
print_r($Infos);
die;
$directory = 'f:\www\yunketang';
//$files = scandirallfiles($directory);

//print_r($files);die;

//$result = copyfilestodist('f:/www/yunketang',$files);

//var_dump($result);

viewtablecomment();