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
// | Remarks: 云信服务端UI组件模块
// +----------------------------------------------------------------------
namespace NIM\Widget;
use Think\Controller;
class UserWidget extends Controller {

	// 新建用户
	public function add()
	{
		$this->display('UserWidget:add');
	}

	// 编辑用户
	public function edit($user)
	{
		$this->display('UserWidget:edit');
	}

	// 删除用户
	public function del()
	{
		$this->display('UserWidget:del');
	}

	// 编辑用户状态
	public function status()
	{
		$this->display('UserWidget:status');
	}

	public function status_im()
	{
		$this->display('UserWidget:status_im');
	}

	// 重置密码
	public function password()
	{
		$this->display('UserWidget:password');
	}

	// 重置token
	public function token()
	{
		$this->display('UserWidget:token');
	}
}






?>
