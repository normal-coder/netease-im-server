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
// | Remarks: 云信服务端公开模块
// +----------------------------------------------------------------------
namespace NIM\Controller;
use Common\Controller\GlobalController;
use Com\NIM;

class PublicController extends GlobalController {


	public function index(){
		// 已登陆，跳转后台
			dump($_SESSION);
			echo "Index/index";
			die();
		
	}

	public function login()
	{
		// 判断是否已经登录

		if (isset($_SESSION['username'])) {
			// 已登陆，跳转后台
			$this->redirect('User/index');
		}else{
			// 未登录
		
			if (IS_POST) {
				$data['username']=I('post.username');
				$data['password']=md5(I('post.password'));
				$user=M('users')->where($data)->find();
				if ($user) {
					// 登录成功
					$_SESSION=$user;
					$this->redirect('User/index');
				}else{
					$this->error('用户名错误或密码错误，请检查您的输入');
				}
			}else{
				$this->display();
			}
		}
	}





	public function passwd()
	{
		
	}

	public function logout()
	{
		session_destroy();
		$this->success('注销成功，跳转回前台', U("Index/index"));
	}
}