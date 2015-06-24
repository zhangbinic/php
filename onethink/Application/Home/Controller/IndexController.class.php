<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi@vip.qq.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------

namespace Home\Controller;
use OT\DataDictionary;

/**
 * 前台首页控制器
 * 主要获取首页聚合数据
 */
class IndexController extends HomeController {

	//系统首页
    public function index()
    {

        // 在哪设置烦人的缓存呢？后台那设置吗？没找到，缓存是实时的吗？
        /*
        $category = D('Category')->getTree();
        $lists    = D('Document')->lists(null);// 指的是没传递categoryid的数据

        $this->assign('category',$category);//栏目
        $this->assign('lists',$lists);//列表
        $this->assign('page',D('Document')->page);//分页
        */
        // 屏蔽这3个竟然不起作用，什么原因呢?
        // 因为这个 /Application\Home\View\default\Index\index.html:19,从模版分析看，根本就没走首页代码！
        // 证明上面5行代码可以屏蔽啦
        $this->display();

    }

}