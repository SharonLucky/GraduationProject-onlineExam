<?php
namespace Home\Model;
use Think\Model;
class ScoreModel extends Model{
  public function logScore($username,$type,$total_score,$usetime){
    /*时间格式*/
    $time = Date('Y-m-d H:i:s') ;
    //$time = time();

    $this->execute('INSERT INTO '.C('DB_PREFIX')."score (username,type,total_score,exam_time,usetime) VALUES ('".$username."','".$type."','".$total_score."','".$time."','".$usetime."')");
  }

  public function getUserScore($username){
   // $res = $this->getAll('SELECT *,FROM_UNIXTIME(exam_time) as exam_time FROM '.C('DB_PREFIX')."score WHERE username='".$username."'");
    $res = $this->getAll('SELECT * FROM '.C('DB_PREFIX')."score WHERE username='".$username."'".'ORDER BY exam_time desc');
  
    
    return $res;
  }
}