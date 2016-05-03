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
// | Remarks: 模块基础控制器(Module-BaseController)
// +----------------------------------------------------------------------

namespace NIM\Controller;
use Common\Controller\GlobalController;
use Com\NIM;
class BaseController extends GlobalController {
	public function _initialize()
	{
		// 设置主题
		set_theme();
		if (isset($_SESSION['username'])) {
			// 已经登陆，跳过
		}else{
			// 未登录，强制转到登陆
			$this->redirect('Public/login');
		}
	}


	// ============ NIM 自定义函数 ============
	// 生成accid
	public function createAccid($username)
	{
		return $username;  // 生成用户名
	}

	// 生成token
	public function createToken($username,$password)
	{
		return $password;  // 生成用户名
	}

	public function InitNIM()
	{
		$AppKey = C('AppKey');
		$AppSecret = C('AppSecret');
		$NIM = new Nim($AppKey,$AppSecret,'curl');//php curl库
		return $NIM;
	}

}	


