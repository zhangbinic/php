<?php 
$newParameterfields = array(
      'place_name',
      'place_class',
      'use_time',
      'design_pressure',
      'design_warm',
      'operation_pressure',
      'operation_warm',
      'diameter',
      'height',
      'make_thick',
      'min_thick',
      'corrosion_degree',
      'material',
      'material_num',
      'volume',
      'is_dispose',
      'weld_num',
      'steam_purge',
      'brinellhardness',
      'work_medium',
      'medium_status',
      'gas_ratio',
      'is_inside',
      'inside_class',
      'inside_material',
      'inside_status',
      'isupdate_inside',
      'inside_time',
      'inside_thick',
      'in_coating',
      'in_coating_time',
      'out_coating',
      'out_coating_time',
      'out_coating_year',
      'out_coating_status',
      'is_warm',
      'warm_status',
      'warm_water',
      'warm_time',
      'microbe_control',
      'is_manhole',
      'is_point',
      'point_num',
      'flow',
      'velocity',
      'plate_num',
      'change_pipe_num',
      'change_area'
  );

unset($ParameterinfoArr[0]);
unset($ParameterinfoArr[1]);
//dump($ParameterinfoArr);die;
foreach($ParameterinfoArr as $parameter)
{
    if($parameter[1]==$groupname && $parameter[2]==$companyname && $parameter[3]==$factoryname && $parameter[4]==$setname && $parameter[8]==$plantname)
    {
        for($p=9;$p<=56;$p++)
        {
            $newParameterArr[] = $parameter[$p];
        }

        $newParameterdata = array_combine($newParameterfields,$newParameterArr);
        $newParameterdata['plantmatchkey'] = $plantmatchkey;

        $place_name = $newParameterdata['place_name'];
        $place_class = $newParameterdata['place_class'];
        $ParameterWhere = array(
            'plantmatchkey'=>$plantmatchkey,
            'place_name'=>$place_name,
            'place_class'=>$place_class
        );
        //查出部位分类和部位名称的编码2个
        $PlaceClassWhere = array(
            'plant_type_desc'=>$machinetype,
            'place_type_desc'=>$place_class
        );
        $placeclassarr = $this->PlaceClassModel->field('place_type')->where($PlaceClassWhere)->find();
        $place_class_code = $placeclassarr['place_type'];
        //dump($place_class_code);die;
        $newParameterdata['place_num'] = $this->ContainerParameterModel->getPlaceNum($place_class_code);
        $newParameterdata['place_class_code'] = $place_class_code;
        //dump($newParameterdata['place_num']);die;
        //dump($newParameterdata);
        $ParameterFlag = $this->ContainerParameterModel->where($ParameterWhere)->count();
        //dump($ParameterFlag);die;
        if($ParameterFlag==1)
        {
            $newParameterdata['recorduserid'] = session('userid');
            $newParameterdata['recordusername'] = session('username');
            $newParameterdata['recordtime'] = formatTime();
            $newParameterdata['updatetime'] = formatTime();
            $this->ContainerParameterModel->where($ParameterWhere)->save($newParameterdata);
            //echo $this->ContainerParameterModel->_sql();die;
        }
        else
        {
            $newParameterdata['createuserid'] = session('userid');
            $newParameterdata['createusername'] = session('username');
            $newParameterdata['createtime'] = formatTime();
            $newParameterdata['recorduserid'] = session('userid');
            $newParameterdata['recordusername'] = session('username');
            $newParameterdata['recordtime'] = formatTime();
            $newParameterdata['updatetime'] = formatTime();
            $this->ContainerParameterModel->add($newParameterdata);
        }
    }
}



//设备基本信息存在情况下导入技术参数的信息
//1.筛选出该设备的技术参数信息
unset($ParameterinfoArr[0]);
unset($ParameterinfoArr[1]);
//dump($ParameterinfoArr);die;
foreach($ParameterinfoArr as $parameter)
{
    if($parameter[1]==$groupname && $parameter[2]==$companyname && $parameter[3]==$factoryname && $parameter[4]==$setname && $parameter[8]==$plantname)
    {
        for($p=9;$p<=56;$p++)
        {
            $newParameterArr[] = $parameter[$p];
        }

        $newParameterdata = array_combine($newParameterfields,$newParameterArr);
        $newParameterdata['plantmatchkey'] = $plantmatchkey;

        $place_class = $newParameterdata['place_class'];

        //查出部位分类和部位名称的编码2个
        $PlaceClassWhere = array(
            'plant_type_desc'=>$machinetype,
            'place_type_desc'=>$place_class
        );
        $placeclassarr = $this->PlaceClassModel->field('place_type')->where($PlaceClassWhere)->find();
        $place_class_code = $placeclassarr['place_type'];
        //dump($place_class_code);die;
        $newParameterdata['place_num'] = $this->ContainerParameterModel->getPlaceNum($place_class_code);
        $newParameterdata['place_class_code'] = $place_class_code;
        //dump($newParameterdata['place_num']);die;
        //dump($newParameterdata);
        $newParameterdata['createuserid'] = session('userid');
        $newParameterdata['createusername'] = session('username');
        $newParameterdata['createtime'] = formatTime();
        $newParameterdata['recorduserid'] = session('userid');
        $newParameterdata['recordusername'] = session('username');
        $newParameterdata['recordtime'] = formatTime();
        $newParameterdata['updatetime'] = formatTime();
        $this->ContainerParameterModel->add($newParameterdata);
    }
}
