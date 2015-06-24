<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Admin\Controller;
use User\Api\UserApi as UserApi;

/**
 * 后台首页控制器
 * @author 麦当苗儿 <zuojiazi@vip.qq.com>
 */
class IndexController extends AdminController {

    /**
     * 后台首页
     * @author 麦当苗儿 <zuojiazi@vip.qq.com>
     */
    public function index()
    {

        $this->meta_title = '管理首页';
        $this->display();

        /*
         * 1.插件的目录找到了：/Addons\EditorForAdmin
         * 2.钩子就是把插件组合起来，更丰富的使用它
         * 3.后台插件的更新会更新配置文件的，说错了，不更新插件目录，这些更新记录到数据表了。
         * 4.为什么钩子还不能乱用，必须相应的控制器解析吗？它是怎么解析的？
         * 5.目前没来路，找不到思路，看不懂。
         */

    }

}
