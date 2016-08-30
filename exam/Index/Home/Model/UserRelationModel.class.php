<?php
/**
 * 用户与用户信息表关联模型
 */
namespace Home\Model;
use Think\Model\RelationModel;
Class UserRelationModel extends RelationModel {
  //定义主表名称
  Protected $tableName = 'user';

  //定义用户与用户信处表关联关系属性
  Protected $_link = array(
    'userinfo' => array(
      'mapping_type' => self::HAS_ONE,
      'foreign_key' => 'uid'
      //'foreign_key' => 'id'
    )
  );
  /**
   * 自动插入的方法
   */
  Public function insert ($data=NULL) {
    $data = is_null($data) ? $_POST : $data;
    return $this->relation(true)->data($data)->add();
  }

}
?>