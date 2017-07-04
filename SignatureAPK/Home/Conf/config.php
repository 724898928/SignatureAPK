<?php
return array(
	//'配置项'=>'配置值'
    'DEFAULT_MODULE'     => 'Index', //默认模块
    'URL_MODEL'          => '1', //URL模式
    'SESSION_AUTO_START' => true, //是否开启session
    'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'config',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  '',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  '',    // 数据库表前缀
    'DB_FIELDTYPE_CHECK'    =>  false,       // 是否进行字段类型检查
    'DB_FIELDS_CACHE'       =>  true,        // 启用字段缓存
    'DB_CHARSET'            =>  'utf8',      // 数据库编码默认采用utf8
    
    'DEFAULT_CHARSET'       =>  'utf-8', // 默认输出编码
    'SHOW_PAGE_TRACE' =>true,// 显示页面Trace信息
    'TMPL_CACHE_ON'   => false,  // 默认开启模板编译缓存 false 的话每次都重新编译模板
    'ACTION_CACHE_ON'  => false,  // 默认关闭Action 缓存
    'HTML_CACHE_ON'   => false,   // 默认关闭静态缓存
);