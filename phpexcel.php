<?php 
/**
 * 引入excel类，读取excel模版中的数据
 * 2015-3-13
 */
header('Content-Type:text/html;charset=utf-8');
include 'PHPExcel/PHPExcel.php';
include 'PHPExcel/PHPExcel/IOFactory.php';
echo '<pre>';
$filename = '021999990189_2015-02.xls';
// $content = file($filename);
$objexcel = PHPExcel_IOFactory::load($filename);
$content = $objexcel->getSheet(0)->toArray(null);

print_r($content);