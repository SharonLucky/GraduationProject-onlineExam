<?php
namespace Admin\Controller;

use Think\Controller;

/**
 * 共用控制器
 */
Class CommonController extends Controller
{

  /**
   *  自动运行的方法
   */
  Public function _initialize()
  {
    //判断用户是否已登录
    if (!isset($_SESSION['uid']) || !isset($_SESSION['username'])) {
      redirect(U('Login/index'));
    } 
      /*$where = array('id' => session('uid'));
      $user = M('userinfo')->field('id,username')->where($where)->find();
      $username = $user['username'];
      $this->assign('loginName', $username);*/
    
  }

}

?>