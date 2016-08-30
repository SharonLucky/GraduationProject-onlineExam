<?php
namespace Admin\Controller;
use Think\Controller;
/*
 * 后台首页控制器*/
class IndexController extends CommonController {
  /*后台首页视图*/
    public function index(){
      $this->display();
    }
  
  /*后台信息页*/
  public function copy(){
    $db=M('user');
    $this->user = $db->count();
    $this->lock = $db->where(array('lock' => 1))->count();

    $this->type=M('paperinfo')->count();
    $this->people=count(M('score')->distinct(true)->field('username')->select());
    $this->notice=M('notice')->count();
    $this->display();
  }

  /**
   * 退出登录
   */
  Public function loginOut () {
    session_unset();
    session_destroy();
    redirect(U('Login/index'));
  }
}