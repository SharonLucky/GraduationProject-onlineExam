<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 后台登录控制器
 */
Class LoginController extends Controller {
  
  /*登录页面视图*/
  Public function index(){
    $this->display();
  }
  
  /*登录表单处理*/
  Public function login(){
    if(!IS_POST){
      $this->error("页面不存在");
    }

    $name = $_POST['adminname'];
    $pwd = $_POST['password'];
    $db = M('admin');
    $user = $db->where(array('username' => $name))->find();

    if (!user || $user['password'] != $pwd) {
      $this->error('账号或密码错误');
    }

    if ($user['lock']) {
      $this->error('账号被锁定');
    }
  
    $data = array(
      'id' => $user['id'],
      'logintime' => time(),
      'loginip' => get_client_ip()
    );
    $db->save($data);

    session('uid', $user['id']);
    session('username', $user['username']);
    session('logintime', Date('Y-m-d H:i', $user['logintime']));
    session('now', Date('Y-m-d H:i', time()));
    session('loginip', $user['loginip']);
    session('admin', $user['admin']);
    $this->success('正在登录...', __APP__);
  }
}
?>