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
// | Remarks: 全局基础控制器(Common-GlobalController)
// +----------------------------------------------------------------------

namespace Common\Controller;
use Think\Controller;

	class GlobalController extends Controller {

		// 设置主题
		/* 空操作，用于输出404页面 */
		public function _empty(){
			$this->redirect('NIMWeb/Index/index');
		}

		protected function _initialize(){
			// 设置主题
			set_theme();
		}
	}
?>