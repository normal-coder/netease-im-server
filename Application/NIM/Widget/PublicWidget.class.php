<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://normalcoder.com All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 诺墨 <normal@normalcoder.com>
// +----------------------------------------------------------------------
// | Remarks: 云信服务端公开模块UI组件
// +----------------------------------------------------------------------
namespace NIM\Widget;
use Think\Controller;
class PublicWidget extends Controller {
	public function nav($array){
		$this->assign('Bigger',$array);
		$this->display('PublicWidget:nav');
	}


	// 模态窗口-alert
	public function amalert()
	{
		$this->display('PublicWidget:amalert');
	}
}





?>