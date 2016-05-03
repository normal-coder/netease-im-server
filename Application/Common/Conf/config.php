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
// | Remarks: 全局配置文件 (Module-BaseController)
// +----------------------------------------------------------------------
	return array(

		// ＝＝系统主题设置＝＝
		// 设置默认的模板主题
		'DEFAULT_THEME'  => 'Base',//当模块中没有设置主题，则模块主题会设置为此处设置的主题,主题名和模块名不能重复，如不能采用“Home”
		'DEFAULT_MODULE'        =>  'NIMWeb',  // 默认模块
		/* 模板相关配置 */
		//此处只做模板使用，具体替换在COMMON模块中的set_theme函数,该函数替换MODULE_NAME,DEFAULT_THEME两个值为设置值
		'TMPL_PARSE_STRING' => array(
			'__STATIC__' => __ROOT__ . '/Public/static',
			'__IMG__'    => __ROOT__ . '/Public/MODULE_NAME/DEFAULT_THEME/images',
			'__CSS__'    => __ROOT__ . '/Public/MODULE_NAME/DEFAULT_THEME/css',
			'__JS__'     => __ROOT__ . '/Public/MODULE_NAME/DEFAULT_THEME/js',
			'__Theme__'  => __ROOT__ . '/Public/MODULE_NAME/DEFAULT_THEME',
		),

		// ＝＝系统日志设置＝＝
		'LOG_RECORD' => true, // 开启日志记录
		// 'LOG_LEVEL'  =>'EMERG,ALERT,CRIT,ERR', // 只记录EMERG ALERT CRIT ERR 错误
		'LOG_TYPE' =>  'File', // 日志记录类型 默认为文件方式

		//数据库配置信息
		'DB_TYPE'   => 'mysql', // 数据库类型
		'DB_HOST'   => 'localhost', // 服务器地址
		'DB_NAME'   => 'NIM', // 数据库名
		'DB_USER'   => 'root', // 用户名
		'DB_PWD'    => '123456', // 密码
		'DB_PORT'   => 3306, // 端口
		'DB_PREFIX' => 'tp_', // 数据库表前缀 
		'DB_CHARSET'=> 'utf8', // 字符集
		'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增


		// 关闭字段缓存
		'DB_FIELDS_CACHE'=>false,

		// 云信密钥设置
		'AppKey' => 'ddb5c997ed9e59eac630c8c1df134d7c',
		'AppSecret' => '42459770aeb5',
	);

