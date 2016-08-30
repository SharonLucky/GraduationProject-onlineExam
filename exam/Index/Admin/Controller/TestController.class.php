<?php
namespace Admin\Controller;

use Think\Controller;

/*
 * 试题管理设置控制器*/

class TestController extends CommonController
{
  /**
   * 试题管理设置
   */
  Public function index()
  {
    //获取试卷类型
    $this->typeAll = M('paperinfo')->field('type')->select();

    isset($_GET['p'])?$_GET['p']:1;
    if($_GET['testType']!='all'){
      $this->eqType=$_GET['testType'];
      $where =array('type' => $_GET['testType']);
      $count = M('paper')->where($where)->count();
      $page = new \Think\Page($count, 10);
      $page -> setConfig('header','共%TOTAL_ROW%条');
      $page -> setConfig('first','首页');
      $page -> setConfig('last','共%TOTAL_PAGE%页');
      $page -> setConfig('prev','上一页');
      $page -> setConfig('next','下一页');
      $page -> setConfig('nowPage','1');
      $page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
      $page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
      $limit = $page->firstRow . ',' . $page->listRows;
      $testAll=M('paper')->where($where)->limit($limit)->select();
      $this->page = $page->show();
      $this->testAll=$testAll?$testAll:false;
    }else{
      $count1 = M('paper')->count();
      $page = new \Think\Page($count1, 10);
      //$page -> setConfig('header','共%TOTAL_ROW%条');
      $page -> setConfig('first','首页');
      $page -> setConfig('last','共%TOTAL_PAGE%页');
      $page -> setConfig('prev','上一页');
      $page -> setConfig('next','下一页');
      $page -> setConfig('link','indexpagenumb');//pagenumb 会替换成页码
      $page -> setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
      $limit = $page->firstRow . ',' . $page->listRows;
      $testAll=M('paper')->limit($limit)->select();
      $this->page = $page->show();
      $this->testAll=$testAll?$testAll:false;
    }
    //p($_GET['p']);
    $this->display();
    
  }
  
  //添加试题页展示
  public function addItem()
  {
    //获取试卷类型
    $this->typeAll = M('paperinfo')->field('type')->select();
    $this->display();
  }
  
  //添加单个试题
  public function runAddTest()
  {
    if (!IS_POST) {
      $this->error("页面不存在");
      
    }
    $data = array(
      'question' => $_POST['question'],
      'answer_A' => $_POST['answer_A'],
      'answer_B' => $_POST['answer_B'],
      'answer_C' => $_POST['answer_C'],
      'answer_D' => $_POST['answer_D'],
      'right_answer' => $_POST['right_answer'],
      'type' => $_POST['postType'],
      'randomNum' => $_POST['randomNum']
    );
    
    if (M('paper')->data($data)->add()) {
      $this->success('添加试题成功', U('addItem'));
    } else {
      $this->error('添加试题失败，请重试...');
    }
    
  }
  
  //删除id对应试题
  public function delItem(){
    $id = intval($_GET['id']);
  
    if (M('paper')->delete($id)) {
      $this->success('删除成功', U('index'));
    } else {
      $this->error('删除失败，请重试...');
    }
  }
  
  //修改对应试题页面展示
  public function  modifyItem(){
    //获取试卷类型
    $this->typeAll = M('paperinfo')->field('type')->select();
    
    $id = intval($_GET['id']);
    $where=array('id'=>$id);
    $this->item=M('paper')->where($where)->select();
    //p($item[0]['question']);die;
    $this->display();
  }

  //修改试题数据保存
  public function modifyItemSave(){
    if (!IS_POST) {
      $this->error("页面不存在");

    }
    $data = array(
      'id'=>$_POST['id'],
      'question' => $_POST['question'],
      'answer_A' => $_POST['answer_A'],
      'answer_B' => $_POST['answer_B'],
      'answer_C' => $_POST['answer_C'],
      'answer_D' => $_POST['answer_D'],
      'right_answer' => $_POST['right_answer'],
      'type' => $_POST['postType'],
      'randomNum' => $_POST['randomNum']
    );
    if (M('paper')->save($data)) {
      $this->success('修改试题成功', U('Test/index'));
    } else {
      $this->error('修改试题失败，请重试...');
    }
  }
}