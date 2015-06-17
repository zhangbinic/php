<?php

class IndexAction extends Action{
    /*
     * 登陆接口
     */
    public function login(){
        //接收用户名和密码 akywtz,123456
        $uname = I('UserName');
        $passw = sha1(I('UserPassword'));

        //模型类
        $userModel = M("User");
        $AdminModel = M("Admin");
        //查询条件
        $whereUser['username'] = $uname;
        $whereUser['password'] = $passw;

        $whereAdmin['admin_name'] = $uname;
        $whereAdmin['admin_password'] = $passw;

        //根据用户名和密码查出用户信息
        $resultUser = $userModel->where($whereUser)->find();
        $resultAdmin = $AdminModel->where($whereAdmin)->find();
        if($resultUser)
        {
            $result = $resultUser;
        }
        elseif($resultAdmin)
        {
            $result = $resultAdmin;
        }
        else
        {
            $result = array();
        }
        if($result)
        {
            echo json_encode(array('code'=>1,'result'=>$result));
            exit();
        }else{
            echo json_encode(array('code'=>2));
            exit();
        }
    }
    /*
     * 省份
     */
    public function province(){

        $province = M('province');

        $r = $province->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }
    }
    /*
     * 市
     */
    public function city(){
        $province_id = I('id');
        if($province_id=='' || $province_id<=0){
            echo json_encode(array('code'=>2));
            exit();
        }
        $city = M('city');
        $r = $city->where('province_id='.$province_id)->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }
    }

    /*
     * 查询商品
     */
    public function goods(){
        $page = I('page');
        $pagesize = I('pagesize');
        if($page<=1){
            $page = 1;
        }
        if($pagesize<=0){
            $pagesize = 10;
        }
        $goods_number = I('goods_number');
        $goodsModel = M("goods");
        $goodsList = $goodsModel->where("goods_number='{$goods_number}'")->limit(($page-1)*$pagesize,$pagesize)->select();
        if($goodsList){
            echo json_encode(array('code'=>1,'result'=>$goodsList));
        }else{
            echo json_encode(array('code'=>0));
        }
    }
    /*
     * 查询商品（二维码）
     */
    public function goodsss(){
        $page = I('page');
        $pagesize = I('pagesize');
        if($page<=1){
            $page = 1;
        }
        if($pagesize<=0){
            $pagesize = 10;
        }
        $goods_bc = I('goods_bc');
        $goodsModel = M("goods");
        $r = $goodsModel->where("goods_bc='{$goods_bc}'")->limit(($page-1)*$pagesize,$pagesize)->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }
    }
    /*
     * 新建报台单接口
     */
    // public function addkh(){
    //     $UserID = I('UserID');
    //     $isUserID = M('User')->where("UserID='".I("UserID")."'")->getField("UserID");

    //     if($UserID!=$isUserID){
    //         echo json_encode(array('code'=>2));
    //         exit();
    //     }
    //     $geti = M('geti');
    //     $hospital = M('hospital');
    //     if(IS_POST){
    //         $HospName = explode(",",I('HospName'));
    //         $HospProvince = explode(",",I('HospProvince'));
    //         $HospTown = explode(",",I('HospTown'));
    //         $HospDeaser = explode(",",I('HospDeaser'));
    //         $HospRemark = explode(",",I('HospRemark'));
    //         $HospProduct = explode(",",I('HospProduct'));
    //         $hospital_geti = explode(',',I('hospital_geti'));
    //         $user_name = explode(',',I('user_name'));
    //         $arr = array();
    //         for($i = 0; $i < count($HospProduct); $i++){
    //             $count = $geti->where("geti_ma='".$hospital_geti[$i]."'")->count();
    //             if($count > 0){
    //                 $arr[] = $hospital_geti[$i];
    //             }
    //         }
    //         if(count($arr) > 0){
    //             $str = implode(",", $arr);
    //             echo json_encode(array('code'=>6,'result'=>$str));
    //         }else{
    //             for($i = 0; $i < count($HospProduct); $i++){
    //                 $data1['geti_hospital'] = $HospName[$i];
    //                 $data1['geti_province'] = $HospProvince[$i];
    //                 $data1['geti_city'] = $HospTown[$i];
    //                 $data1['geti_deaser'] = $HospDeaser[$i];
    //                 $data1['user_name'] = $user_name[$i];
    //                 $data1['geti_remark'] = $HospRemark[$i];
    //                 $data1['geti_name'] = $HospProduct[$i];
    //                 $data1['geti_ma'] = $hospital_geti[$i];
    //                 // dump($data1);die;
    //                 $geti->add($data1);
    //             }

    //                 $data['HospTime'] = date("Y-m-d");
    //                 $data['HospName'] = I('HospName');
    //                 $data['HospProvince'] = I('HospProvince');
    //                 $data['HospTown'] = I('HospTown');
    //                 $data['HospCounty'] = I('HospCounty');
    //                 $data['HospDeaser'] = I('HospDeaser');
    //                 $data['HospDoctor'] = I('HospDoctor');
    //                 $data['HospAge'] = I('HospAge');
    //                 $data['HospSex'] = I('HospSex');
    //                 $data['HospSurgery'] = I('HospSurgery');
    //                 $data['HospProduct'] = I('HospProduct'); //产品
    //                 $data['HospRemark'] = I('HospRemark');
    //                 $data['HospSeries'] = I('HospSeries');
    //                 $data['hospital_geti'] = I('hospital_geti');//个体码
    //                 $data['hosp_packing_inner'] = I('hosp_packing_inner');
    //                 $data['hosp_packing_outer'] = I('hosp_packing_outer');
    //                 $data['hosp_matching_k'] = I('hosp_matching_k');
    //                 $data['hosp_matching_s'] = I('hosp_matching_s');
    //                 $data['hosp_pic'] = I('hosp_pic');
    //                 $data['user_id'] = I('user_id');
    //                 $data['user_name'] = I('user_name');
    //                 $r = $hospital->add($data);
    //             echo json_encode(array('code'=>1));
    //         }
    //     }else{
    //         echo json_encode(array('code'=>4));
    //     }
    // }
    public function addkh(){
        $UserID = I('UserID');
        $isUserID = M('User')->where("UserID='".I("UserID")."'")->getField("UserID");

        if($UserID!=$isUserID){
            echo json_encode(array('code'=>2));
            exit();
        }
        $geti = M('geti');
        $hospital = M('hospital');
        if(IS_POST){
            /**
            $HospName = explode(",",I('HospName'));
            $HospProvince = explode(",",I('HospProvince'));
            $HospTown = explode(",",I('HospTown'));
            $HospDeaser = explode(",",I('HospDeaser'));
            $HospRemark = explode(",",I('HospRemark'));
            $HospProduct = explode(",",I('HospProduct'));
            $hospital_geti = explode(',',I('hospital_geti'));
            $user_name = explode(',',I('user_name'));   
             **/
            $HospName = I('HospName')?I('HospName'):'';
            $HospProvince = I('HospProvince')?I('HospProvince'):'';
            $HospTown = I('HospTown')?I('HospTown'):'';
            $HospDeaser = I('HospDeaser')?I('HospDeaser'):'';
            $HospRemark = I('HospRemark')?I('HospRemark'):'';

            $HospProduct = explode(",",rtrim(I('HospProduct'),','));

            $hospital_geti =I('hospital_geti')?I('hospital_geti'):'';
            $user_name = I('user_name')?I('user_name'):'';
            $arr = array();
            for($i = 0; $i < count($HospProduct); $i++){
                $count = $geti->where("geti_ma='".$hospital_geti[$i]."'")->count();
                if($count > 0){
                    $arr[] = $hospital_geti[$i];
                }
            }
            if(count($arr) > 0){
                $str = implode(",", $arr);
                echo json_encode(array('code'=>6,'result'=>$str));
            }else{
                
                $goodsModel = M('goods');
                
                for($i = 0; $i < count($HospProduct); $i++)
                {
                    // 获取商品名称
                    $goodsname = $goodsModel->where('goods_id='.$HospProduct[$i])->getField('goods_name');
                    $goodsnames[] = $goodsname;
                }

                $data['HospTime'] = I('HospTime');
                $data['HospName'] = I('HospName');
                $data['HospProvince'] = I('HospProvince');
                $data['HospTown'] = I('HospTown');
                $data['HospCounty'] = I('HospCounty');
                $data['HospDeaser'] = I('HospDeaser');
                $data['HospDoctor'] = I('HospDoctor');
                $data['HospAge'] = I('HospAge');
                $data['HospSex'] = I('HospSex');
                $data['HospSurgery'] = I('HospSurgery');

                $data['HospProduct'] = join(',',$goodsnames); //产品

                $data['HospRemark'] = I('HospRemark');
                $data['HospSeries'] = I('HospSeries');
                $data['hospital_geti'] = I('hospital_geti');//个体码
                $data['hosp_distributor'] = I('hosp_distributor');
                $data['hosp_packing_inner'] = I('hosp_packing_inner');
                $data['hosp_packing_outer'] = I('hosp_packing_outer');
                $data['hosp_matching_k'] = I('hosp_matching_k');
                $data['hosp_matching_s'] = I('hosp_matching_s');
                $data['hosp_pic'] = I('hosp_pic');
                $data['user_id'] = I('user_id');
                $data['user_name'] = I('user_name');
                $r = $hospital->add($data);

                for($i = 0; $i < count($HospProduct); $i++)
                {
                    // 获取商品信息
                    $goodsinfo = $goodsModel->field('goods_name,goods_model,goods_jifen,goods_reward,goods_is_jinfen,goods_is_reward')->where('goods_id='.$HospProduct[$i])->find();
                    $goodsname = $goodsinfo['goods_name'];
                    $goodsmodel = $goodsinfo['goods_model'];
                    $goodsjifen = $goodsinfo['goods_jifen'];
                    $goodsreward = $goodsinfo['goods_reward'];
                    $goodsisjifen = $goodsinfo['goods_is_jifen'];
                    $goodsisreward = $goodsinfo['goods_is_reward'];

                    $userModel = M('user');
                    $adminModel = M('admin');
                    // 获取用户的所属经销商和用户类型
                    $userinfo = $userModel->where('UserID='.I('UserID'))->field('user_style_id,user_deaser');
                    $deasername = $userinfo['user_deaser'];
                    $usertype = $userinfo['user_style_id'];
                    
                    // 给业务员和经销商增加积分或奖励额
                    if($usertype=='经销商')
                    {
                        if($goodsisreward)
                        {
                            // 给经销商增加奖励额
                            $deaserwhere = array('username'=>$deasername);
                            $userModel->where($deaserwhere)->setInc('business_left',$goodsreward);
                            $userModel->where($deaserwhere)->setInc('business_total',$goodsreward);

                            $adminwhere = array('admin_name'=>$deasername);
                            $adminModel->where($adminwhere)->setInc('reward_left',$goodsreward);
                            $adminModel->where($adminwhere)->setInc('reward_total',$goodsreward);    
                        }                        
                    }
                    else
                    {
                        if($goodsisjifen)
                        {
                            // 给用户增加积分
                            $userwhere = array('username'=>$user_name);
                            $userModel->where($userwhere)->setInc('business_left',$jifen);
                            $userModel->where($userwhere)->setInc('business_total',$jifen);

                            if($goodsisreward)
                            {
                                // 给经销商增加奖励额
                                $deaserwhere = array('username'=>$deasername);
                                $userModel->where($deaserwhere)->setInc('business_left',$goodsreward);
                                $userModel->where($deaserwhere)->setInc('business_total',$goodsreward);

                                $adminwhere = array('admin_name'=>$deasername);
                                $adminModel->where($adminwhere)->setInc('reward_left',$goodsreward);
                                $adminModel->where($adminwhere)->setInc('reward_total',$goodsreward);    
                            }
                        }
                    }
                    


                    $data1['geti_hospital'] = $HospName;
                    $data1['geti_province'] = $HospProvince;
                    $data1['geti_city'] = $HospTown;
                    $data1['geti_deaser'] = $HospDeaser;
                    $data1['user_name'] = $user_name;
                    $data1['user_id'] = I('user_id');
                    $data1['geti_remark'] = $HospRemark;

                    $data1['geti_name'] = $goodsname;
                    $data1['geti_ma'] = $hospital_geti;

                    $data1['geti_time'] = I('HospTime');
                    $data1['geti_doctor'] = I('HospDoctor');
                    $data1['geti_series'] = I('HospSeries');//产品系列
                    $data1['geti_surgery'] = I('HospSurgery');//手术类型
                    $data1['HospID'] = $r;

                    // dump($data1);die;
                    $geti->add($data1);
                }
                echo json_encode(array('code'=>1));
            }
        }else{
            echo json_encode(array('code'=>4));
        }
    }
    /*
     * 查询已建报台单信息
     */
    public function hospital(){
        $page = I('page');
        $pagesize = I('pagesize');
        if($page<=1){
            $page = 1;
        }
        if($pagesize<=0){
            $pagesize = 10;
        }
        $HospTime = I('time')?I('time'):'';
        $HospName = I('name')?I('name'):'';
        $HospSeries = I('series')?I('series'):'';
        $HospDoctor = I('doctor')?I('doctor'):'';
        $user_id = I('UserID')?I('UserID'):'';

        if($HospTime){
            $data['HospTime'] = $HospTime;
        }
        if($HospName){
            $data['HospName'] = $HospName;
        }
        if($HospSeries){
            $data['HospSeries'] = $HospSeries;
        }
        if($HospDoctor){
            $data['HospDoctor'] = $HospDoctor;
        }
        if($user_id){
            $data['user_id'] = $user_id;
        }

        $hospital = M('hospital');
        if(IS_POST){
            $r = $hospital->where($data)->select();
            if($r){
                echo json_encode(array('code'=>1,'result'=>$r));
            }else{
                echo json_encode(array('code'=>0));
            }
        }else{
            echo json_encode(array('code'=>4));
        }
    }
    /*
     * 添加个人信息
     */
    public function addd(){
        $UserID = I('UserID');
        $isUserID = M('User')->where("UserID='".I("UserID")."'")->getField("UserID");
        if($UserID!=$isUserID){
            echo json_encode(array('code'=>2));
            exit();
        }
        $info = M('info');
        $data['info_time'] = time();
        $data['info_hospital'] = I('info_hospital');
        $data['info_province'] = I('info_province');
        $data['info_city'] = I('info_city');
        $data['info_dealer'] = I('info_dealer');
        $data['info_doctor'] = I('info_doctor');
        $data['user_id'] = I('user_id');
        $data['user_name'] = I('user_name');
        $r = $info->add($data);
        if($r){
            echo json_encode(array('code'=>1));
        }else{
            echo json_encode(array('code'=>0));
        }
    }
    /*
     * 类型接口
     */
    public function type(){
        $type = M('type');
        $r = $type->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }
    }
    /*
     * 产品系列
     */
    public function series(){
        $series = M('series');
        $r = $series->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }
    }
    /*
     * 删除个人信息
     */
    public function ggsc(){
        $infoModel = M('info');
        $id = I('get.id');
        $r = $infoModel->where("info_id='".$id."'")->delete();
        if($r){
            echo json_encode(array('code'=>1));
        }else{
            echo json_encode(array('code'=>0));
        }

    }
    /*
     * 查询个人信息
     */
    // public function info(){
    //     $UserID = I('UserID');    
    //     $isUserID = M('User')->where("UserID='".I("UserID")."'")->getField("UserID"); 
    //     if(!$isUserID){
    //         echo json_encode(array('code'=>2));
    //         exit();
    //     }
    //     $info = M('info');
    //     if(IS_POST){
    //         $data['info_id'] = I('info_id');
    //         $data['info_hospital'] = I('info_hospital');
    //         $data['info_province'] = I('info_province');
    //         $data['info_city'] = I('info_city');
    //         $data['info_dealer'] = I('info_dealer');
    //         $data['info_doctor'] = I('info_doctor');
    //         $data['user_id'] = $UserID;
    //         $r = $info->add($data);
    //         if($r){
    //             echo json_encode(array('code'=>3));
    //         }else{
    //             echo json_encode(array('code'=>0));
    //         }
    //     }else{
    //         $num = $info->where("user_id='".$UserID."'")->count();
    //         if($num>0){
    //             $lan = $info->where("user_id='".$UserID."'")->select();
    //             echo json_encode(array('code'=>1,'result'=>$lan,'user_id'=>$UserID)); 
    //         }
    //     }
    // }
    public function info(){
        $page = I('page');
        $pagesize = I('pagesize');
        if($page<=1){
            $page = 1;
        }
        if($pagesize<=0){
            $pagesize = 10;
        }
        $user_id = I('UserID')?I('UserID'):'';
        if($user_id){
            $data['user_id'] = $user_id;
        }

        $info = M('info');
        if(IS_GET){
            $r = $info->where($data)->select();
            if($r){
                echo json_encode(array('code'=>1,'result'=>$r));
            }else{
                echo json_encode(array('code'=>0));
            }
        }else{
            echo json_encode(array('code'=>4));
        }
    }
    /*
     * 修改个人信息
     */
    public function xg(){
        $info_id = I('id');
        $UserID = I('UserID');
        $isUserID = M('User')->where("UserID='".I("UserID")."'")->getField("UserID");
        if(!$isUserID){
            echo json_encode( array( 'code'=>2,'id'=>$info_id ,'UserID'=>$UserID , 'hosp'=>I('info_hospital') , 'province'=>I('info_province') , 'city'=>I('info_city') , 'dealer'=>I('info_dealer') , 'doctor'=>I('info_doctor')) );//Ã“ÃƒÂ»Â§Â²Â»Â´Ã¦Ã”Ãš
            exit();
        }
        $info = M('info');
        if(IS_POST){
            $data['info_hospital'] = I('info_hospital');
            $data['info_province'] = I('info_province');
            $data['info_city'] = I('info_city');
            $data['info_dealer'] = I('info_dealer');
            $data['info_doctor'] = I('info_doctor');
            $r = $info->where(array('info_id'=>$info_id))->save($data);
            if($r){
                echo json_encode(array('code'=>1));
            }else{
                echo json_encode(array('code'=>0));
            }
        }else{
            echo json_encode(array('code'=>4));
        }
    }
    /*
     * 修改密码
     */
    public function save(){
        $userModel = M('user');
        $UserID = I('id');
        $userInfo =  $userModel->where(array('UserID'=>$UserID))->find();
        if(!$userInfo){
            echo json_encode(array('code'=>2));
            exit();
        }
        $passw = I('pass');
        $data = array('password'=>$passw);
        $data['password'] = sha1($data['password']);
        $r = $userModel->where(array('UserID'=>$UserID))->setField($data);
        if($r){
            echo json_encode(array('code'=>1));
        }else{
            echo json_encode(array('code'=>0));
        }
    }
    /*
     * 查个体码
     */
    public function chageti(){
        //参数
        $geti_ma = I('geti_ma');//个体号
        $M = M('geti');
        $list = $M->where("goods_number='".$goods_number."'")->select();
        foreach($list as $v){
            $arr = explode(',',$v['geti_ma']);
            if(!in_array($geti_ma,$arr)){
                // //如果输入的个体号不存在
                // $arr[] = $goods_geti;
                // $data['goods_geti'] = implode(',',$arr);
                // $M->where("goods_number='".$goods_number."'")->save($data);
                // $this->ajaxReturn(1);
                echo json_encode(array('code'=>1));
            }else{
                //个体号存在
                // $this->ajaxReturn(-1);
                echo json_encode(array('code'=>0));
            }
        }
    }
    /*
     * 根据条形码查个体码
     */
    public function bcgeti(){
        //两个参数
        $goods_bc =  I('goods_bc');//条形码
        $goods_geti = I('goods_geti');//个体号
        $M = M('goods');
        $list = $M->where("goods_bc='".$goods_bc."'")->select();
        foreach($list as $v){
            $arr = explode(',',$v['goods_geti']);
            if(!in_array($goods_geti,$arr)){
                //如果输入的个体号不存在
                // $arr[] = $goods_geti;
                // $data['goods_geti'] = implode(',',$arr);
                // $M->where("goods_bc='".$goods_bc."'")->save($data);
                // $this->ajaxReturn(1);
                echo json_encode(array('code'=>1));
            }else{
                //个体号存在
                // $this->ajaxReturn(-1);
                echo json_encode(array('code'=>0));
            }
        }
    }
    /*
     * 查询个体码
     */
    public function gt(){
        $page = I('page');
        $pagesize = I('pagesize');
        if($page<=1){
            $page = 1;
        }
        if($pagesize<=0){
            $pagesize = 10;
        }
        $geti_ma = I('geti_ma');
        $getiModel = M("geti");
        $getiList = $getiModel->where("geti_ma='{$geti_ma}'")->limit(($page-1)*$pagesize,$pagesize)->select();
        // $geti = M('goods')->where(array('goods_geti'=>$data['goods_geti']))->count();
        if($getiList){
            echo json_encode(array('code'=>0)); //已有
        }else{
            echo json_encode(array('code'=>1)); //没有此个体码
        }
    }
    /*
     * 根据医院名搜索个人信息
     */
    public function souinfo(){
        $page = I('page');
        $pagesize = I('pagesize');
        if($page<=1){
            $page = 0;
        }
        if($pagesize<=0){
            $pagesize = 10;
        }

        $info_hospital = I('name');
        if($info_hospital==''){
            echo json_encode(array('code'=>2));
            exit();
        }
        $topics = D("info");
        $condition["info_hospital"] = array("like","%".trim($info_hospital)."%");
        $r = $topics->where($condition)->limit($page,$pagesize)->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));//查询成功
        }else{
            echo json_encode(array('code'=>0));//查询失败
        }
    }
    /*
     * 产品系列接口
     */
    public function xl(){
        $xl = M('xl');
        $r = $xl->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }
    }
    /*
     * 根据系列名查询系列类型接口
     */
    public function lx(){
        $lx_xl_id = I('name');
        if($lx_xl_id==''){
            echo json_encode(array('code'=>2));
            exit();
        }
        $lx = M('lx');
        $r = $lx->where(array('lx_xl_id'=>$lx_xl_id))->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }
    }
    /*
     * 根据类型名查询类型图片
     */
    public function tp(){
        $tp_lx_id = I('name');
        if($tp_lx_id==''){
            echo json_encode(array('code'=>2));
            exit();
        }
        $tp = M('tp');
        $r = $tp->where(array('tp_lx_id'=>$tp_lx_id))->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }
    }
    /*
     * 按月份查询接口
     */



    /*
    *经销商积分查询
    */
    public function jxs()
    {
        $jxs_id=I('id');
        if($jxs_id=="")
        {
            echo json_encode(array('code'=>2));
            exit();
        }
        $jxs = M('admin');
        $r=$jxs->field("admin_id,reward_has,reward_left,reward_total")->where(array('admin_id'=>$jxs_id))->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }

    }
    /*
    *积分查询
    */
    public function ywy()
    {
        $ywy_id=I('id');
        $ywy = M('user');
        $r=$ywy->field("UserID,business_has,business_left,business_total,user_type")->where(array('UserID'=>$ywy_id))->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }

    }

    /*
    *商品类型接口
    */
    public function product()
    {
        $product = M('product');
        $r = $product->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }
    }
    /*
     *领取奖励商品接口
    */

    public function taoge()
    {
        $username = I('username');
        $goodsid = I('goodsid');

        $userModel = M('user');
        $convertgoodsModel = M('convert_goods');

        $leftfen = $userModel->where("'username='{$username}'")->getField("business_left");
        $hasfen = $userModel->where("'username='{$username}'")->getField("business_has");

        $jiangpin = $convertgoodsModel->where('goods_id='.$goodsid)->getField("goods_jifen");

        if($leftfen<$jiangpin){

            $this->error("积分不足");
            echo json_encode(array('code'=>0,'result'=>'积分不足'));

        }else{

            $data['business_left'] = $leftfen-$jiangpin;
            $data['business_has'] =  $hasfen+$jiangpin;

            $userModel->where("'username='{$username}'")->save($data);
            echo json_encode(array('code'=>1,'result'=>'领取成功'));
        }
    }





    /*
    *奖励商品接口
    */
    public function ware()
    {
        $ware = M('convert_goods');
        $r=$ware->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }

    }




    /*
    *礼品接口
    */
    public function prize()
    {
        $prize = M('prize');
        $r = $prize->select();
        if($r){
            echo json_encode(array('code'=>1,'result'=>$r));
        }else{
            echo json_encode(array('code'=>0));
        }
    }

    /*
     * 领取礼品接口
     */
    public function prizeconvert()
    {
        $username = I('username');
        $prizeid = I('prizeid');

        $userModel = M('user');
        $prizeModel = M('prize');

        $leftfen = $userModel->where("'username='{$username}'")->getField("business_left");
        $hasfen = $userModel->where("'username='{$username}'")->getField("business_has");

        $jiangpin = $prizeModel->where('prize_id='.$prizeid)->getField("prize_integral");

        if($leftfen<$jiangpin){

            $this->error("积分不足");
            echo json_encode(array('code'=>0,'result'=>'积分不足'));

        }else{

            $data['business_left'] = $leftfen-$jiangpin;
            $data['business_has'] =  $hasfen+$jiangpin;

            $userModel->where("'username='{$username}'")->save($data);
            echo json_encode(array('code'=>1,'result'=>'领取成功'));
        }
    }

}