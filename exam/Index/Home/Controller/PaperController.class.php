<?php
namespace Home\Controller;

use Think\Controller;

/**
 *  考试数据库控制器
 */
class PaperController extends CommonController
{
  //查看题库控制器
  public function paper_list()
  {
    $this->display();
  }

  //查看所选类型的所有题
  public function paperList()
  {
    $type = $_GET['type'];
    $this->type = $type;
    if (!empty($type)) {
      $where = array('type' => $type);
      $count = M('paper')->where($where)->count();
      $this->count = $count;
      $page = new \Think\Page($count, 10);
      $limit = $page->firstRow . ',' . $page->listRows;

      $this->paper_list = M('paper')->where($where)->order('randomNum ')->limit($limit)->select();
      $this->page = $page->show();

      $this->display('paper_item');
    }

  }

  //考前必知-type time值传递
  public function paperGetType()
  {
    $type = $_GET['type'];
    $this->type = $type;
    $where = array('type' => $type);

    $paperinfo = M('paperinfo')->where($where)->find();
    $this->assign('paperinfo', $paperinfo);

    $this->display('beforeRead');
  }

  //在线考试页面显示
  public function paper_exam()
  {
    $this->display();
  }

  //在线考试题库抽取试题
  public function paperGet()
  {
    $type = $_REQUEST['type'];
    if (!empty($type)) {
      $this->assign('type', $type);
      $where = array('type' => $type);
      //抽取传入类型的试卷
     // $exam = M('paper')->where($where)->where('randomNum<100')->order('rand()')->limit(5)->select();
      $str="(select * from hd_paper where type='" .$type. "' and randomNum<100 ORDER BY rand() LIMIT 15) union (select * from hd_paper where type='" .$type."' and randomNum>100 ORDER BY rand() limit 5)";
      $Model=M()->query($str);
      $this->ajaxReturn($Model, 'JSON');
    }
  }
  
  //考试成绩获取显示
  public function paperCommit()
  {
    $type = $_REQUEST['type'];
    $total_score = $_REQUEST['total_score'];
    $usetime = $_REQUEST['usetime'];

    $where = array('id' => session('uid'));
    $user = M('userinfo')->field('id,username')->where($where)->find();
    //echo $user['username'];die;
    $username = $user['username'];
    //把用户昵称,考试类型,成绩,考试时间,所用时间存入数据库
    D('Score')->logScore($username, $type, $total_score,$usetime);
  }

  //成绩查询
  public function user_score()
  {
    $where = array('id' => session('uid'));
    $user = M('userinfo')->field('id,username')->where($where)->find();
    $username = $user['username'];

    $res = D('Score')->getUserScore($username);

    $times = count($res);
    $this->assign('times', $times);
    $this->assign('user_score', $res);
    
    $this->display('user_score');
  }


}