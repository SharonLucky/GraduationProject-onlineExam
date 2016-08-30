<?php
namespace Home\Model;
use Think\Model;
class NoticeModel extends Model{
  public function logNotice($title,$content,$admin,$number){
    /*时间格式*/
    $time = Date('Y-m-d') ;
    $this->execute('INSERT INTO '.C('DB_PREFIX')."notice (title,content,admin,time,number) VALUES ('".$title."','".$content."','".$admin."','".$time."','".$number."')");
  }

  public function getNotice(){
    $res = $this->getAll('SELECT * FROM '.C('DB_PREFIX')."notice".'ORDER BY time desc');

    return $res;
  }
}