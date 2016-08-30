<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 账号设置控制器
 */
Class UserSettingController extends CommonController
{

  /**
   * 用户基本信息设置视图
   */
  Public function index()
  {
    $where = array('uid' => session('uid'));
    $field = array('username',  'sex', 'location',  'intro',  'face180');
    $user = M('userinfo')->field($field)->where($where)->find();
    //$this->user = $user;
    $this->assign('user',$user);
    $this->display();
  }

  /**
   * 修改用户基本信息
   */
  Public function editBasic()
  {
    if (!IS_POST) {
      $this->error('页面不存在');
    }
    header('Content-Type:text/html;Charset=UTF-8');
    $data = array(
      'username' => $_POST['nickname'],
      'sex' => (int)$_POST['sex'],
      'location' => $_POST['province'] . ' ' . $_POST['city'],
      'intro' => $_POST['intro']
    );
    $where = array('id' => session('uid'));
    if (M('userinfo')->where($where)->save($data)) {
      $this->success('修改成功', U('index'));
    } else {
      $this->error('修改失败');
    }
  }

  /**
   * 修改用户头像
   */
  Public function editFace()
  {
    if (!IS_POST) {
      $this->error('页面不存在');
    }
    $db = M('userinfo');
    $where = array('uid' => session('uid'));
    //$field = array('face50', 'face80', 'face180');
    $field = array('face180');
    $old = $db->where($where)->field($field)->find();
    if ($db->where($where)->save($_POST)) {
      if (!empty($old['face180'])) {
        @unlink('./Uploads/' . $old['face180']);//删除之前的缩略图
        // @unlink('./Uploads/Face/' . $old['face80']);
        // @unlink('./Uploads/Face/' . $old['face50']);
      }
      $this->success('修改成功', U('index'));
    } else {
      $this->error('修改失败，请重试...');
    }
  }
  /**
   * 修改密码
   */
  Public function editPwd()
  {
    if(!IS_POST){
      $this->error("页面不存在");
    }

    $db=M('user');
    //验证旧密码
    $where=array('id'=>session('uid'));
    $old=$db->where($where)->getField('password');

    if($_POST['old']!=$old){
      $this->error("旧密码错误");
    }
    if($_POST['new']!=$_POST['newed']){
      $this->error("两次密码不一致");
    }
    //$newPwd = $this->_post('new', 'md5');
    $newPwd=$_POST['new'];

    $data=array(
      'id'=>session('uid'),
      'password'=>$newPwd
    );
    if($db->save($data)){
      $this->success('修改成功', U('index'));
    } else {
      $this->error('修改失败，请重试...');
    }
  }
}

