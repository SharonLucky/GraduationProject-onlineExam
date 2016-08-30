<?php
namespace Home\Controller;
use Think\Controller;
/**
 * 首页控制器
 */
class IndexController extends CommonController
{
    public function index()
    {
        //首页视图
        $this->display();
        // header('Content-Type:text/html;Charset=UTF-8');
        //echo '这里是首页,不登录的用户不能进入这里';
        // dump($_SESSION);
    }
    /**
     * 退出登录处理
     */
    Public function loginOut () {

        //卸载SESSION
        session_unset();
        session_destroy();

        //删除用于自动登录的COOKIE
        @setcookie('auto', '', time() - 3600, '/');

        //跳转致登录页
        redirect(U('Login/index'));

    }
}