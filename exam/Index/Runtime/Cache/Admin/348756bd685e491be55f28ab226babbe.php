<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>查看试题</title>
  <link rel="stylesheet" href="/exam/Public/css/bootstrap.min.css">
  <link rel="stylesheet" href="/exam/Public/css/commonadmin.css"/>
  <link rel="stylesheet" href="/exam/Public/css/testadmin.css"/>
  <script type="text/javascript" src='/exam/Public/js/jquery-1.9.1.min.js'></script>
</head>
<body>
<div class='status'>
  <span>题库列表</span>
</div>


<form method="get" action="/exam/admin.php/Test/index.html" name="form">
  <div class="chooseWrap">
    <span>请选择试卷类型:</span>
    <select name="testType" id="testType">
      <option value="all">全部类型</option>
      <?php if(is_array($typeAll)): foreach($typeAll as $key=>$vo): if($vo['type'] == $eqType): ?><option value="<?php echo ($vo["type"]); ?>" selected="selected"><?php echo ($vo["type"]); ?></option>
          <?php else: ?>
          <option value="<?php echo ($vo["type"]); ?>"><?php echo ($vo["type"]); ?></option><?php endif; endforeach; endif; ?>
    </select>
    <!--<button type="submit" value='' class='see'>查找</button>-->
  </div>
</form>


<table class="table">
  <tr>
    <th>ID</th>
    <th>题目</th>
    <th>选项A</th>
    <th>选项B</th>
    <th>选项C</th>
    <th>选项D</th>
    <th>答案</th>
    <th>类型</th>
    <th>操作</th>
  </tr>
  <?php if($testAll): if(is_array($testAll)): foreach($testAll as $key=>$v): ?><tr class="getTestData">
        <td width='10' align='center'><?php echo ($v["id"]); ?></td>
        <td width='100' align='center'><?php echo ($v["question"]); ?></td>
        <td width='60' align='center'><?php echo ($v["answer_A"]); ?></td>
        <td width='60' align='center'><?php echo ($v["answer_B"]); ?></td>
        <td width='60' align='center'><?php echo ($v["answer_C"]); ?></td>
        <td width='60' align='center'><?php echo ($v["answer_D"]); ?></td>
        <td width='10' align='center'><?php echo ($v["right_answer"]); ?></td>
        <td width='10' align='center'><?php echo ($v["type"]); ?></td>
        <td width='10' align='center'>
          <button type="button" class="btn btn-success" style="margin: 5px 0;">
            <span class="glyphicon glyphicon-pencil"></span>
            <a href='<?php echo U("modifyItem", array("id" => $v["id"]));?>' class='add'>修改</a>
          </button>
          <button type="button" class="btn btn-warning" style="margin: 5px 0;">
            <span class="glyphicon glyphicon-cog"></span>
            <a href='<?php echo U("delItem", array("id" => $v["id"]));?>' class='add'>删除</a>
          </button>
        </td>
      </tr><?php endforeach; endif; endif; ?>
  <tr height='50'>
    <td align='center' colspan='10'>
      <div class="page"><?php echo ($page); ?></div>
    </td>
  </tr>

</table>

<script>

  $("#testType").change(function () {
    document.form.submit();
    //获取下拉框选中项的text属性值
    var selectText = $("#testType").find("option:selected").text();
    console.log(selectText);
    //获取下拉框选中项的value属性值
    var selectValue = $("#testType").val();
    console.log(selectValue);
    //获取下拉框选中项的index属性值
    var selectIndex = $("#testType").get(0).selectedIndex;
    console.log(selectIndex);

    /* $.ajax({
     type: "POST",
     url: "/exam/admin.php/Test/getType",
     data: "type=" + selectText,
     dataType: 'JSON',
     success: function (data) {
     console.log(data);
     //console.log(data[0].id);
     var str='';
     for(var i=0;i<data.length;i++){
     str+="<td width='10' align='center'>"+data[i].id+"</td>";
     str+="<td width='100' align='center'>"+data[i].question+"</td>";
     str+="<td width='60' align='center'>"+data[i].answer_A+"</td>";
     str+="<td width='60' align='center'>"+data[i].answer_B+"</td>";
     str+="<td width='60' align='center'>"+data[i].answer_C+"</td>";
     str+="<td width='60' align='center'>"+data[i].answer_D+"</td>";
     str+="<td width='10' align='center'>"+data[i].right_answer+"</td>";
     str+="<td width='10' align='center'>"+data[i].type+"</td>";
     str+="<td width='10' align='center'>"+data[i].randomNum+"</td>";
     str+="<td width='10'><a href='<?php echo U('delItem', array('id' =>"+data[i].id+"));?>' class='add lock'>"+data[i].randomNum+"</td>";

     }
     $('.getTestData1').html(str);
     }

     });*/

    // $('.getTestData').css('display','none');
    //$('.getTestData1').css('display','block');
  });


</script>
</body>
</html>