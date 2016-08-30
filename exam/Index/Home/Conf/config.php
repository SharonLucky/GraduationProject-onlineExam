<?php
return array(
	//'配置项'=>'配置值'
  
  //数据库配置
  'DB_TYPE' => 'mysql',
  'DB_HOST' => '127.0.0.1',	//数据库服务器地址
  'DB_USER' => 'root',	//数据库连接用户名
  'DB_PWD' => '1688',	//数据库连接密码
  'DB_NAME' => 'exam', //使用数据库名称
  'DB_PREFIX' => 'hd_',	//数据库表前缀
  'DB_CHARSET'=> 'utf8', // 字符集

  //'DEFAULT_THEME' => 'default',	//默认主题模版

  //'URL_MODEL' => 1,

  'TOKEN_ON' => false,	//关闭令牌功能

  //用于异位或加密的KEY
  'ENCTYPTION_KEY' => 'www.gongrui.com',
  //自动登录保存时间
  'AUTO_LOGIN_TIME' => time() + 3600 * 24 * 7,	//一个星期

  //图片上传
  'UPLOAD_MAX_SIZE' => 2000000,	//最大上传大小
  'UPLOAD_PATH' => './Uploads/',	//文件上传保存路径
  'UPLOAD_EXTS' => array( 'jpeg', 'png'),	//允许上传文件的后缀

  //加载扩展配置
  'LOAD_EXT_CONFIG' => 'system',
);