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
// | Remarks: 云信服务端用户模型
// +----------------------------------------------------------------------
namespace Home\Model;
use Think\Model;
class UsersModel extends Model {

	protected $_auto = array ( 
		array('accid',''), // 对name字段在新增和编辑的时候回调getName方法
		array('username',''),
		array('password',''),// 对password字段在新增和编辑的时候使md5函数处理
		array('name',''),
		array('icon',''),
		array('sign',''),
		array('email',''),
		array('birthday',''),
		array('mobile',''),
		array('gender',''),
		array('qq',''),
		array('weibo',''),
		array('intro',''),
		array('token',''),
		array('status',''),
		array('imstatus',''),
		array('createtime',''),
		array('upeatetime',''),


	);
}


