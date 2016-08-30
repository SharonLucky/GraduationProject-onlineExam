<?php
namespace Admin\Model;
use Think\Model\ViewModel;
/*
 * 系统用户模型*/

Class UserViewModel extends ViewModel {

	Protected $viewFields = array(
		'user' => array(
			'id', '`lock`', 'registime', //lock是关键字 所以要用``
			'_type' => 'LEFT' //这里的_type定义对下一个表有效
			),
		'userinfo' => array(
			'username', 'face180' => 'face', 'sex', 'location', 'intro',
			'_on' => 'user.id = userinfo.uid' //关联条件
			)
		);
}
?>