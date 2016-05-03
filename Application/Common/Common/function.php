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
// | Remarks: 公用函数库
// +----------------------------------------------------------------------
	function set_theme($theme=''){
		//判断是否存在设置的模板主题
		if(empty($theme)){
			$theme_name=C('DEFAULT_THEME');
		}else{
			if(is_dir (MODULE_PATH.'View/'.$theme )){
				$theme_name=$theme; 
			}else{
				$theme_name=C('DEFAULT_THEME');
			}
		}

		//替换COMMON模块中设置的模板值
		if(C('Current_Theme')){
			C('TMPL_PARSE_STRING',str_replace (C('Current_Theme') , $theme_name , C('TMPL_PARSE_STRING') ));
		}else{
			C('TMPL_PARSE_STRING',str_replace ( "MODULE_NAME" , MODULE_NAME , C('TMPL_PARSE_STRING') ));
			C('TMPL_PARSE_STRING',str_replace ( "DEFAULT_THEME" , $theme_name , C('TMPL_PARSE_STRING') ));
		}
		C('Current_Theme',$theme_name);
		C('DEFAULT_THEME', $theme_name);
	}