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
// | Remarks: 云信服务端用户模块
// +----------------------------------------------------------------------
namespace NIM\Controller;

use Com\NIM;
class UserController extends BaseController {
	// 用户管理列表
	public function index(){

		$User = D('Users');
		$userlist = $User -> select();
		$this -> assign('userlist',$userlist);
		$this  ->  display();
	}


	// 新增用户
	public function add(){
		if (IS_POST) {
			// 检查用户名
			$where['username'] = I('post.username');
			if ( M('users')->where($where)->find() ) {
				$this -> error('用户名已存在,请修改');
			}
			// 数据写入
			$User = D('Users');
			if (!$User  ->  create()){ // 创建数据对象
				exit($User  ->  getError()); // 如果创建失败 表示验证没有通过 输出错误提示信息
			}else{
				$User->accid      = $this->createAccid($User->username);  // 生成用户名
				$User->password   = md5($User->password);  // 密码加密
				$User->token      = $this->createToken($User->username,$User->password);  // 生成用户名
				$User->createtime = time();
				$AppKey = C('AppKey');
				$AppSecret = C('AppSecret');
				$NIM = new Nim($AppKey,$AppSecret,'curl');//php curl库
				$res = $NIM->createUserId($User->accid,$User->name,'','',$User->token);
				if ($res['code']==200) {
					$User->add(); // 验证通过 写入新增数据
					$this->success('新建用户成功',U('index')); // 新建用户成功
				}else{
					$this->error("新建用户失败:",U('index')); // 新建用户成功
				}			
			}
		}else{
			$this  ->  display();
		}
	}


	// 编辑用户资料
	public function edit()
	{
		if (IS_AJAX) {
			$where['id'] = I('post.id');
			$data['id'] = I('post.id');
			$data['name'] = I('post.name');
			$data['icon'] = I('post.icon');
			$data['sign'] = I('post.sign');
			$data['email'] = I('post.email');
			$data['birthday'] = I('post.birthday');
			$data['mobile'] = I('post.mobile');
			$data['name'] = I('post.name');
			$data['qq'] = I('post.qq');
			$data['weibo'] = I('post.weibo');
			$data['intro'] = I('post.intro');
			$res = M('users')->where($where)->save($data);
			if ($res){
				$userinfo = M('users')->where($where)->find();
				$NIM = $this -> InitNIM();
				$NIMResult = $NIM -> updateUinfo($userinfo['accid'],$userinfo['name'],$userinfo['icon'],$userinfo['sign'],$userinfo['email'],$userinfo['birthday'],$userinfo['mobile'],$userinfo[
					'gender'],'');
				if ($NIMResult['code'] = 200) {
					$this->success('更新用户资料成功',U('index'));
				}else{
					$this->error('用户资料更新异常');
				}
			}else{
				$this->error('更新用户资料失败');
			}
		}else{
			$this -> error('您的请求异常,请通过系统后台进行操作');
		}
	}
	
	// 删除用户
	public function delete()
	{
		if (IS_AJAX) {
			$user['id'] = I('post.id');
			$res = M('users') -> where($user) -> delete();
			if ($res) {
				$this -> success('删除用户成功');
			}else{
				$this -> error('删除用户失败');
			}
		}else{
			$this -> error('您的请求异常,请通过系统后台进行操作');
		}
	}

	// 修改密码
	public function password()
	{
		if (IS_AJAX) {
			$user['id'] = I('post.id');
			$userinfo = M('users') -> where($user) ->find();
			if($userinfo){
				$savedata['password'] = md5(I('post.password'));
				// 修改系统密码
				$res = M('users') -> where($user) -> save($savedata);
				// 更新IM授权
				$NIM = $this -> InitNIM();
				$NIMResult = $NIM -> updateUserId($userinfo['accid'],$userinfo['name'],'',$savedata['password']);
				if ($res && $NIMResult['code']) {
					$this -> success($userinfo['username'].'密码重置成功');
				}else{
					$this -> error($userinfo['username'].'密码重置失败');
				}
			}else{
				$this -> error('该用户不存在！');
			}
		}else{
			$this -> error('您的请求异常,请通过系统后台进行操作');
		}
	}

	// 启用/禁用用户  //此处仅仅处理基本的账号状态.暂不关联IM状态
	public function status()
	{
		if(IS_AJAX){
			$user['id'] = I('post.id');
			$userinfo = M('users') -> where($user) -> find();
			if( $userinfo['status'] == 1 ){
				$savedata['status'] = 0;
				$result = "账户".$userinfo['username']." (".$userinfo['name'].") 禁用";
			}else{
				$savedata['status'] = 1;
				$result = "账户".$userinfo['username']." (".$userinfo['name'].") 启用";
			}
			if ( M('users')->where($user)->save($savedata) ) {
				$this -> success( $result."成功" );
			}else{
				$this -> error( $result."失败" );
			}
		}else{
			$this -> error('您的请求异常,请通过系统后台进行操作');
		}
	}

	// 启用/禁用云信功能
	public function status_im()
	{
		if(IS_AJAX){
			$user['id'] = I('post.id');
			$userinfo = M('users') -> where($user) -> find();
			$NIM = $this -> InitNIM();
			if( $userinfo['imstatus'] == 1 ){
				$savedata['imstatus'] = 0;
				$result = "账户".$userinfo['username']." (".$userinfo['name'].") IM功能禁用";
				$NIMResult = $NIM -> blockUserId($userinfo['accid']);
			}else{
				$savedata['imstatus'] = 1;
				$result = "账户".$userinfo['username']." (".$userinfo['name'].") IM功能启用";
				$NIMResult = $NIM -> unblockUserId($userinfo['accid']);
			}
			$save = M('users')->where($user)->save($savedata);
			if ( $save && $NIMResult['code'] ==200 ) {
				$this -> success( $result."成功" );
			}else{
				$this -> error( $result."失败" );
			}
		}else{
			$this -> error('您的请求异常,请通过系统后台进行操作');
		}
	}

	// 重置云信token
	public function reset_token()
	{
		if (IS_AJAX) {
			$user['id'] = I('post.id');
			$userinfo = M('users') -> where($user) ->find();
			if($userinfo){
				// 生成新Token
				$savedata['token'] = $this -> createToken($userinfo['username'],$userinfo['password']);
				// 云信IM操作
				$AppKey = C('AppKey');
				$AppSecret = C('AppSecret');
				$NIM = new Nim($AppKey,$AppSecret,'curl');//php curl库

				$nimres = $NIM -> updateUserId($userinfo['accid'],$userinfo['name'],'',$savedata['token']);
				$res = M('users') -> where($user) -> save($savedata);
				// $code = $nimres['code'];
				if ($nimres['code']==200) {
					
					$this -> success($userinfo['username'].'云信授权重置成功'); 
				}else{
					$this -> error($userinfo['username'].'云信授权重置失败');
				}
			}else{
				$this -> error('该用户不存在！');
			}
		}else{
			$this -> error('您的请求异常,请通过系统后台进行操作');
		}
	}






}


