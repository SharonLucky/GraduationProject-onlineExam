<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 联系我们控制器
 */
class ContactController extends CommonController
{
  public function index()
  {
    //联系我们视图
    $this->display();
    // header('Content-Type:text/html;Charset=UTF-8');
  }
  
  public function  contactSend(){
    if (!IS_POST) {
      $this->error('页面不存在');
    }

    $where = array('id' => session('uid'));
    $user = M('userinfo')->field('id,username')->where($where)->find();
    $username=$user['username'];

    $info=array(
      'username'=>$username,
      'truename'=>$_POST['contactName'],
      'email'=>$_POST['contactEmail'],
      'message'=>$_POST['message']
    );
    if(M('contact')->add($info)){
      redirect(__APP__, 2, '<div style="margin:18% auto;text-align: center;font-size: 19px;">谢谢您的反馈，我们会努力改进。loading……</div>');
    }else{
      $this->error('反馈提交失败');
    }

  }

}