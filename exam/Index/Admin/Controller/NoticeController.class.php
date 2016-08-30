<?php
namespace Admin\Controller;
use Think\Controller;

/*
 * 公告管理控制器*/

class NoticeController extends CommonController
{
  /**
   * 系统公告显示
   */
  Public function index()
  {
    $count = M('notice')->count();
    $page =new \Think\Page($count, 4);
    $limit = $page->firstRow . ',' . $page->listRows;
  
    $this->notice = M('notice')->limit($limit)->select();
    $this->page = $page->show();
    
    $this->display();
    
  }
  /*
   * 删除系统公告*/
  Public function delNotice(){
    $id = intval($_GET['id']);

    if (M('notice')->delete($id)) {
      $this->success('删除成功', U('index'));
    } else {
      $this->error('删除失败，请重试...');
    }
  }

  /*
   * 添加系统公告显示*/
  Public function  addNotice(){
    $this->display();
  }

  /*
   * 添加系统公告处理*/
  Public function runAddNotice(){
    $data = array(
      'title' => $_POST['title'],
      'content' => $_POST['content'],
      'admin'=>session('username'),
      'time' => Date('Y-m-d'),
    );

    if (M('notice')->data($data)->add()) {
      $this->success('添加成功', U('index'));
    } else {
      $this->error('添加失败，请重试...');
    }
  }
}