<?php
namespace Admin\Controller;
use Think\Controller;
/*
 * 用户列表控制器*/
class UserController extends CommonController {

  /*系统用户列表*/
  public function index(){
    $count = M('user')->count();
    $page =new \Think\Page($count, 4);
    $limit = $page->firstRow . ',' . $page->listRows;

    $this->users = D('UserView')->limit($limit)->select();
    $this->page = $page->show();

    $this->display();

  }

  /**
   * 系统用户检索
   */
  Public function sechUser()
  {
    if (isset($_GET['sech']) && isset($_GET['type'])) {
      $where = $_GET['type'] ? array('id' => intval($_GET['sech'])) : array('username' => array('LIKE', '%' . $_GET['sech'].'%'));

      $user = D('UserView')->where($where)->select();
      $this->user = $user ? $user : false;
    }
    $this->display();
  }

  /**
   * 锁定用户
   */
  Public function lockUser()
  {
    $data = array(
      'id' => intval($_GET['id']),
      'lock' => intval($_GET['lock'])
    );

    $msg = $data['lock'] ? '锁定' : '解锁';
    if (M('user')->save($data)) {
      $this->success($msg . '成功', $_SERVER['HTTP_REFERER']);
    } else {
      $this->error($msg . '失败，请重试...');
    }
  }

  /**
   * 后台管理员列表
   */
  Public function admin () {
    $this->admin = M('admin')->select();
    $this->display();
  }

  /**
   * 添加后台管理员
   */
  Public function addAdmin () {
    $this->display();
  }

  
  /**
   * 锁定后台管理员
   */
  Public function lockAdmin () {
    $data = array(
      'id' => intval($_GET['id']),
      'lock' => intval($_GET['lock'])
    );
    
    $msg = $data['lock'] ? '锁定' : '解锁';
    if (M('admin')->save($data)) {
      $this->success($msg . '成功', U('admin'));
    } else {
      $this->error($msg . '失败，请重试...');
    }
  }

  /**
   * 删除后台管理员
   */
  Public function delAdmin()
  {
    $id = intval($_GET['id']);

    if (M('admin')->delete($id)) {
      $this->success('删除成功', U('admin'));
    } else {
      $this->error('删除失败，请重试...');
    }
  }
  /**
   * 执行添加管理员操作
   */
  Public function runAddAdmin()
  {
    if ($_POST['pwd'] != $_POST['pwded']) {
      $this->error('两次密码不一致');
    }
    
    $data = array(
      'username' => $_POST['username'],
      'password' => $_POST['pwd'],
      'logintime' => time(),
      'loginip' => get_client_ip(),
      'admin' => intval($_POST['admin'])
    );
    
    if (M('admin')->data($data)->add()) {
      $this->success('添加成功', U('admin'));
    } else {
      $this->error('添加失败，请重试...');
    }
  }
  /**
   * 修改密码视图
   */
  Public function editPwd()
  {
    $this->display();
  }
  
  /**
   * 修改密码操作
   */
  Public function runEditPwd()
  {
    $db = M('admin');
    $old = $db->where(array('id' => session('uid')))->getField('password');

    if ($old != $_POST['old']) {
      $this->error('旧密码错误');
    }

    if ($_POST['pwd'] != $_POST['pwded']) {
      $this->error('两次密码不一致');
    }

    $data = array(
      'id' => session('uid'),
      'password' => $_POST['pwd']
    );

    if ($db->save($data)) {
      $this->success('修改成功', U('Index/copy'));
    } else {
      $this->error('修改失败，请重试...');
    }
  }
  
}