<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 注册与登录控制器
 */
Class LoginController extends Controller {

  /**
   * 登录页面
   */
  Public function index () {
    $this->display();
  }

  /**
   * 注册页面
   */
  Public function register () {
    if (!C('REGIS_ON')) {
      $this->error('网站暂停注册', U('index'));
    }
    $this->display();
  }

  /*注册表单处理*/
  Public function runRegis()
  {
    if (!IS_POST) {
      $this->error('页面不存在');
    }
    /*if ($_SESSION['verify'] != md5($_POST['verify'])) {
      $this->error('验证码错误');
    }*/
    if ($_POST['password'] != $_POST['passwordagain']) {
      $this->error('两次密码不一致');
    }

    //提取POST数据
    $data = array(
      'account' => $_POST['account'],
     // 'password' => $this->$_POST('pwd', 'md5'),
      'password' => $_POST['password'],
     // 'password' => md5($_POST['pwd']),
      'registime' => $_SERVER['REQUEST_TIME'],
      'userinfo' => array(
        'username' => $_POST['uname']
      )

    );
    
    $id = D('UserRelation')->insert($data);

    if ($id) {
      //插入数据成功后把用户ID写SESSION
      session('uid', $id);

      //跳转至首页
      header('Content-Type:text/html;Charset=UTF-8');
      redirect(__APP__, 3, '注册成功，正在为您跳转...');
    } else {
      $this->error('注册失败，请重试...');
    }
  }
  /*登录表单处理*/
  Public function login(){
    if (!IS_POST) {
      $this->error('页面不存在');
    }
    $account=$_POST['account'];
    $pwd=$_POST['password'];

    $where = array('account' => $account);
    $user=M('user')->where($where)->find();
   
   if (!$user || $user['password'] != $pwd) {
     $this->error('用户名或者密码不正确');
   }

    if ($user['lock']) {
      $this->error('用户被锁定');
    }

    //处理下一次自动登录
    if (isset($_POST['auto'])) {
      $account = $user['account'];
      $ip = get_client_ip();//在Thinkphp的Common的function.js
      $value = $account . '|' . $ip;
      $value = encryption($value);
      @setcookie('auto', $value, C('AUTO_LOGIN_TIME'), '/');
    }

    //登录成功写入SESSION并且跳转到首页
    session('uid', $user['id']);

    header('Content-Type:text/html;Charset=UTF-8');
    redirect(__APP__, 3, '登录成功，正在为您跳转...');
  }


  /**
   * 获取验证码
   */
  Public function verify () {
    //import('ORG.Util.Image');
    //Image::buildImageVerify(4, 1, 'png');
    $Verify = new \Think\Verify();
    $Verify->length=4;

    $Verify->codeSet = '0123456789';
    $Verify->entry();
  }

  /**
   * 异步验证账号是否已存在
   */
  Public function checkAccount () {
    if (!IS_AJAX) {
      $this->error("页面不存在");
  }
    $account =$_POST['account'];
    $where = array('account' => $account);
    if (M('user')->where($where)->getField('id')) {
      echo 'false';
    } else {
      echo 'true';
    }
  }
  /**
   * 异步验证昵称是否已存在
   */
  Public function checkUname () {
    if (!IS_AJAX) {
      $this->error("页面不存在");
    }
    $username = $_POST['uname'];
    $where = array('username' => $username);
    if (M('userinfo')->where($where)->getField('id')) {
      echo 'false';
    } else {
      echo 'true';
    }
  }
  /**
   * 异步验证验证码
   */
  Public function checkVerify () {
    if (!IS_AJAX) {
     $this->error('页面不存在');
    }
    /*$verify = $_POST['verify'];
    if ($_SESSION['verify'] != md5($verify)) {
      echo 'false';
    } else {
      echo 'true';
    }*/
    $verify = new \Think\Verify();

    if($verify->check(I('verify'))){
      echo 'true';
    } else {
      echo 'false';
    }
  }
}
?>