<?php
namespace Home\Controller;

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
    //处理自动登录
    if (isset($_COOKIE['auto']) && !isset($_SESSION['uid'])) {
      $value = explode('|', encryption($_COOKIE['auto'], 1));
      $ip = get_client_ip();

      //本次登录IP与上一次登录IP一致时
      if ($ip == $value[1]) {
        $account = $value[0];
        $where = array('account' => $account);

        $user = M('user')->where($where)->field(array('id', 'lock'))->find();

        //检索出用户信息并且该用户没有被锁定时，保存登录状态
        if ($user && !$user['lock']) {
          session('uid', $user['id']);
        }
      }
    }


    //判断用户是否已登录
    if (!isset($_SESSION['uid'])) {
      redirect(U('Login/index'));
    }else{
      $where = array('id' => session('uid'));
      $user = M('userinfo')->field('id,username')->where($where)->find();
      $username=$user['username'];
      $this->assign('loginName',$username);
    }
  }


  /**
   * 头像上传
   */
  Public function uploadFace()
  {
    if (!IS_POST) {
      $this->error('页面不存在');
    }
    //自定义upload方法
    $upload = $this->_upload('Face', '220', '220');
    //echo json_encode($upload);
    $data = json_encode($upload);
    //$this->ajaxReturn(json_encode($upload),'JSON');
    $this->ajaxReturn($data, 'JSON');
  }

  /**
   * 图片上传处理
   * @param  [String] $path   [保存文件夹名称]
   * @param  [String] $Width  [缩略图宽度多个用，号分隔]
   * @param  [String] $Height [缩略图高度多个用，号分隔(要与宽度一一对应)]
   * @return [Array]         [图片上传信息]
   */

  Private function _upload($path, $width = '', $height = '')
  {
    $obj = new \Think\Upload();// 实例化上传类
    $obj->maxSize = C('UPLOAD_MAX_SIZE');  //图片最大上传大小
    $obj->exts = array('png', 'jpeg');// 设置附件上传类型
    //$obj->rootPath = C('UPLOAD_PATH');//文件上传根路径
    //$obj->savePath = C('UPLOAD_PATH') . $path . '/';  //文件上传的保存路径（相对于根路径）
    $obj->savePath = $path . '/';  //文件上传的保存路径（相对于根路径）
    $obj->saveName = array('uniqid', '');  //保存文件名,上传文件的保存规则，支持数组和字符串方式定义
    //$obj->saveExt = C('UPLOAD_EXTS');  //允许上传文件的后缀名
    $obj->replace = true;  //覆盖同名文件
    $obj->exts = array('png', 'jpeg');//允许上传的文件后缀（留空为不限制）
    $obj->subName = array('date', 'Ymd');//子目录创建方式，采用数组或者字符串方式定义
    $obj->autoSub = true;  //使用子目录保存文件,默认为true

    $info = $obj->upload();
    if (!$info) {
      return array(
        'status' => 0,
        'msg' => $obj->getError()
      );
    } else {
      $image = new \Think\Image();

      foreach ($info as $file) {
        // echo $file['savepath'] . $file['savename'];
        $thumb_file = C('UPLOAD_PATH') . $file['savepath'] . $file['savename'];
        $save_path = C('UPLOAD_PATH') . $file['savepath'] . 'mini_' . $file['savename'];
        $image->open($thumb_file)->thumb($width, $height, \Think\Image::IMAGE_THUMB_SCALE)->save($save_path);

        return array(
          'status' => 1,
          'savepath' => $file['savepath'],
          'savename' => $file['savename'],
          'pic_path' => $file['savepath'] . $file['savename'],
          'mini_pic' => $file['savepath'] . 'mini_' . $file['savename']
        );
        //@unlink($thumb_file); //上传生成缩略图以后删除源文件
      }
      /*$info = $obj->getUploadFileInfo();
      $pic = explode('/', $info[0]['savename']);
      return array(
        'status' => 1,
        'path' => array(
          'max' => $pic[0] . '/max_' . $pic[1],
          'medium' => $pic[0] . '/medium_' . $pic[1],
          'mini' => $pic[0] . '/mini_' . $pic[1]
        )
      );*/
    }
  }
}

?>