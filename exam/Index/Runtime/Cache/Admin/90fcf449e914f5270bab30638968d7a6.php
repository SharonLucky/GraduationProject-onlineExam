<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>系统用户列表</title>
  <link rel="stylesheet" href="/exam/Public/css/commonadmin.css"/>
  <script type="text/javascript" src='/exam/Public/js/jquery-1.9.1.min.js'></script>
  <style>
    input{
      width:96%;
      height:25px;
    }
  </style>
</head>
<body>
<div class='status'>
  <span>修改试题</span>
</div>
<form action="<?php echo U(modifyItemSave);?>" method='post'>
  <table class="table">
    <tr>
      <td width='10%' align='right'>所属ID：</td>
      <td>
        <input type="text" name='id' value="<?php echo ($item[0]['id']); ?>" readonly/>
      </td>
    </tr>
    <tr>
      <td width='10%' align='right'>试卷题目：</td>
      <td>
        <input type="text" name='question' value="<?php echo ($item[0]['question']); ?>" required/>
      </td>
    </tr>
    <tr>
      <td width='10%' align='right'>选项A：</td>
      <td width='80%'>
        <input type="text" name='answer_A' value="<?php echo ($item[0]['answer_A']); ?>" required/>
      </td>
    </tr>
    <tr>
      <td width='10%' align='right'>选项B：</td>
      <td>
        <input type="text" name='answer_B' value="<?php echo ($item[0]['answer_B']); ?>" required/>
      </td>
    </tr>
    <tr>
      <td width='10%' align='right'>选项C：</td>
      <td>
        <input type="text" name='answer_C' value="<?php echo ($item[0]['answer_C']); ?>"/>
      </td>
    </tr>
    <tr>
      <td width='10%' align='right'>选项D：</td>
      <td>
        <input type="text" name='answer_D' value="<?php echo ($item[0]['answer_D']); ?>"/>
      </td>
    </tr>
    <tr>
      <td width='10%' align='right'>正确答案：</td>
      <td>
        <input type="text" name='right_answer' value="<?php echo ($item[0]['right_answer']); ?>" required/>
      </td>
    </tr>
    <tr>
      <td align='right'>试题类型：</td>
      <td clasa="ee">
        <input type="text" name="postType" style="width:10%;height:20px" id="postType" value="<?php echo ($item[0]['type']); ?>" required>



        <input type="radio" name="radio" id="haveType" onclick="getType()" checked style="width:3%;height:20px">已有类型
        <select name="testType" id="selectHaveType">
          <?php if(is_array($typeAll)): foreach($typeAll as $key=>$vo): ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></option><?php endforeach; endif; ?>
        </select>
        <input type="radio" name="radio" id="noType" onclick="getType()" style="width:3%;height:20px">添加类型
        <input type="text" id="addNewType" style="width:10%;height:20px;display: none" onblur="byValue()">
      </td>
    </tr>
    <tr>
      <td width='10%' align='right'>类型随机数：</td>
      <td>
        <input type="text" name="randomNum" id="randomNum" style="width:10%;height:20px" value="<?php echo ($item[0]['randomNum']); ?>" required>
        <input type="radio" name='random' id="select" style="width:3%;height:20px" onclick="getNum()"/>选择题(1-100)
        <input type="radio" name='random' id="judge" style="width:3%;height:20px" onclick="getNum()"/>判断题(101-200)
      </td>
    </tr>
    <tr>
      <td colspan='2'>
        <input type="submit" value='修改试题' class='big-btn'/>
      </td>
    </tr>
  </table>
</form>
<script>

  $("#selectHaveType").change(function () {
    //获取下拉框选中项的text属性值
    var selectText = $("#selectHaveType").find("option:selected").text();
    console.log(selectText);
    $("#postType").val(selectText);
  })
  //失焦清空input
  function byValue() {
    $("#postType").val($("#addNewType").val());
  }
  function  getType() {
    //console.log($('#haveType').prop('checked'));
    $("#postType,#addNewType").val('');

    //已有类型选择
    if($('#haveType').prop('checked')){
      $("#selectHaveType").css('display','inline-block');
      $("#addNewType").css('display','none');
    }else{
      $("#addNewType").css('display','inline-block');
      $("#selectHaveType").css('display','none');
    }
  }

  function getNum() {
    if($("#select").prop("checked")){
      $("#randomNum").val(Math.floor(Math.random()*100+1));//1-100
    }else{
      $("#randomNum").val(Math.floor(Math.random()*100+100));//1-100
    }
  }
</script>
</body>
</html>