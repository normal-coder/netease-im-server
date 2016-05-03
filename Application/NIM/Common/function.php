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
// | Remarks: 服务端模板函数库
// +----------------------------------------------------------------------
function getUserStauts($userid,$status,$username)
{
	$config = 'data-am-switch data-size="xs" data-on-text="ON" data-off-text="OFF"  data-off-color="default"  data-on-color="success"';
	$onclick = 'onchange="javascript:userstatus(\''.$userid.'\',\''.$username.'\')"';
	if ($status == 1) {
		// 启用
		return '<input type="checkbox"'.$config.'value="1"'.$onclick.'checked>';
	}else {
		// 禁用
		return '<input type="checkbox"'.$config.'value="0"'.$onclick.'">';
	}
}

function getIMStauts($userid,$status,$username)
{
	$config = 'data-am-switch data-size="xs" data-on-text="ON" data-off-text="OFF"  data-off-color="default"  data-on-color="success"';
	$onclick = 'onchange="javascript:imstatus(\''.$userid.'\',\''.$username.'\')"';
	if ($status == 1) {
		// 启用
		return '<input type="checkbox"'.$config.'value="1"'.$onclick.'checked>';
	}else {
		// 禁用
		return '<input type="checkbox"'.$config.'value="0"'.$onclick.'">';
	}
}
?>