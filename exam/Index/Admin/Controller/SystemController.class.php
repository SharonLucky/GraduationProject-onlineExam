<?php
namespace Admin\Controller;
use Think\Controller;
/*
 * 系统设置控制器*/
class SystemController extends CommonController {
  /**
   * 网站设置
   */
  Public function index()
  {
    $config = include './Index/Home/Conf/system.php';
    $this->assign('webname',$config['WEBNAME']);
    $this->assign('copy',$config['COPY']);
    $this->assign('REGIS_ON',$config['REGIS_ON']);
    $this->display();
  }

  /**
   * 修改网站设置
   */
  Public function runEdit()
  {
    $path = './Index/Home/Conf/system.php';
    $config = include $path;
    $config['WEBNAME'] = $_POST['webname'];
    $config['COPY'] = $_POST['copy'];
    $config['REGIS_ON'] = $_POST['regis_on'];

    $data = "<?php\r\nreturn " . var_export($config, true) . ";\r\n?>";

    if (file_put_contents($path, $data)) {
      $this->success('修改成功', U('index'));
    } else {
      $this->error('修改失败， 请修改' . $path . '的写入权限');
    }
  }
}