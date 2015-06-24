<?php

set_time_limit(0);

$goodsModel = M('Goods');
$goodsTempModel = M('GoodsTemp');

$TempInfos = $goodsTempModel->select();

foreach($TempInfos as $k=>$v)
{
    $info = $goodsModel->where("goods_number='{$v['goods_number']}'")->find();
    //dump($info);
    if($info)
    {


    }
    else
    {
        unset($v['goods_id']);
        $goodsModel->add($v);
        unset($TempInfos[$k]);
        //$TempInfos[$k] = $v;
    }
}
dump(count($TempInfos));die;

/*
 *
  'goods_geti' => string '001' (length=3)
  'goods_name' => string '内衬（生物ML型）54/32' (length=28)
  'goods_model' => string '54/32' (length=5)
  'goods_number' => string '1310-2454' (length=9)
  'goods_bc' => string '0369' (length=4)
  'goods_series' => null
  'goods_group' => string '0105产成品—耗材' (length=22)
  'goods_class' => null
  'goods_whether' => null
  'goods_jifen' => string '0' (length=1)
  'flag' => string '0' (length=1)
  'goods_is_jinfen' => string '0' (length=1)
  'goods_is_reward' => string '0' (length=1)
  'goods_reward' => string '0'
 */
//$TempInfos = array_unique($TempInfos);

dump(count($TempInfos));die;
