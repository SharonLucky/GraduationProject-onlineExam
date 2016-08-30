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

  //用于异位或加密的KEY
  'ENCTYPTION_KEY' => 'www.gongrui.com',
  //自动登录保存时间
  'AUTO_LOGIN_TIME' => time() + 3600 * 24 * 7,	//一个星期
  
);