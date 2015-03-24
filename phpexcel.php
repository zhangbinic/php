<?php 
/**
 * 引入excel类，读取excel模版中的数据
 * 2015-3-13,2015-3-24
 */
header('Content-Type:text/html;charset=utf-8');
include 'PHPExcel/PHPExcel.php';
include 'PHPExcel/PHPExcel/IOFactory.php';
echo '<pre>';
$excelTpl = '021999990189_2015-02.xls';
// $content = file($filename);
$objexcel = PHPExcel_IOFactory::load($excelTpl);

//读取所有的sheet名称
$ExcelReader = PHPExcel_IOFactory::createReader('excel5');
$sheetNames = $ExcelReader -> listWorksheetNames($excelTpl);
//print_r($sheetNames);die;


$OneArr = $objexcel->getSheet(0)->toArray(null);
//$TwoArr = $objExcel->getSheet(1)->toArray(null);
//$ThreeArr = $objExcel->getSheet(2)->toArray(null);
//$FourArr = $objExcel->getSheet(3)->toArray(null);
//$FiveArr = $objExcel->getSheet(4)->toArray(null);
//$SixArr = $objExcel->getSheet(5)->toArray(null);
//$SevenArr = $objExcel->getSheet(6)->toArray(null);
//$EightArr = $objExcel->getSheet(7)->toArray(null);
//unset($BasicUnitinfoArr[0],$BasicUnitinfoArr[2],$BasicUnitinfoArr[7],$BasicUnitinfoArr[9]);
//print_r($content);

//1.基本信息获取
for($i=0;$i<10;$i++)
{
    if(!empty($OneArr[$i]))
    {
        foreach($OneArr[$i] as $v)
        {
            if(!empty($v))
            {
                $newv[$i][] = $v;
            }
        }
    }
}
//print_r($newv);die;

//2.列表数据获取
for($i=10;$i<400;$i++)
{
    if(!empty($OneArr[$i]))
    {
        foreach($OneArr[$i] as $v)
        {
            if(!empty($v))
            {
                $listv[$i][] = $v;
            }
        }
    }

}
//print_r($listv);//die;

