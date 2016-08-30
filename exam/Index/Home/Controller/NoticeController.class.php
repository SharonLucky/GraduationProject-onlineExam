<?php
namespace Home\Controller;

use Think\Controller;

/**
 *  系统公告控制器
 */
class NoticeController extends CommonController
{
  //查看题库控制器
  public function Index()
  {
    $notice=M('Notice')->select();
    //$notice=D('Notice')->getNotice();

    $this->assign('noticeInfo',$notice);
    $this->display();
    
  }
  
}