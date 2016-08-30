<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>查看试题</title>
  <link rel="stylesheet" href="/exam/Public/css/commonadmin.css"/>
  <script type="text/javascript" src='/exam/Public/js/jquery-1.9.1.min.js'></script>
</head>
<body>
<div class='status'>
  <span>题库列表</span>
</div>
<div class="chooseWrap">
  <span>请选择试卷类型:</span>
  <select name="testType" id="testType">
    <option value="all">全部试题类型</option>
    <?php if(is_array($typeAll)): foreach($typeAll as $key=>$vo): if($type == $vo['type']): ?><option value="<?php echo ($vo["type"]); ?>" selected="selected"><?php echo ($vo["type"]); ?></option>
        <?php else: ?>
        <option value="<?php echo ($vo["type"]); ?>"><?php echo ($vo["type"]); ?></option><?php endif; endforeach; endif; ?>
  </select>
</div>

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
    <th>随机数</th>
    <th>操作</th>

  </tr>
  <?php if(is_array($testAll)): foreach($testAll as $key=>$v): ?><tr id="getTestData">
      <td width='10' align='center'><?php echo ($v["id"]); ?></td>
      <td width='100' align='center'><?php echo ($v["question"]); ?></td>
      <td width='60' align='center'><?php echo ($v["answer_A"]); ?></td>
      <td width='60' align='center'><?php echo ($v["answer_B"]); ?></td>
      <td width='60' align='center'><?php echo ($v["answer_C"]); ?></td>
      <td width='60' align='center'><?php echo ($v["answer_D"]); ?></td>
      <td width='10' align='center'><?php echo ($v["right_answer"]); ?></td>
      <td width='10' align='center'><?php echo ($v["type"]); ?></td>
      <td width='10' align='center'><?php echo ($v["randomNum"]); ?></td>
      <td width='10'>
        <a href='<?php echo U("delItem", array("id" => $v["id"]));?>' class='add lock'>删除</a>
      </td>
    </tr><?php endforeach; endif; ?>
  <tr height='50'>
    <td align='center' colspan='10' class="yeshu">
      <?php echo ($page); ?>
    </td>
  </tr>
</table>

<script>

  $("#testType").change(function() {
    //获取下拉框选中项的text属性值
    var selectText = $("#testType").find("option:selected").text();
    console.log(selectText);
    //获取下拉框选中项的value属性值
    var selectValue = $("#testType").val();
    console.log(selectValue);
    //获取下拉框选中项的index属性值
    var selectIndex = $("#testType").get(0).selectedIndex;
    console.log(selectIndex);
    ////获取下拉框最大的index属性值
    //var selectMaxIndex = $("#testType option:last").attr("index");
    // console.log(selectMaxIndex);

    $.ajax({
      type: "POST",
      url: "/exam/admin.php/Test/getType",
      data: "type=" + selectText,
      dataType: 'JSON',
      success: function (data) {
        console.log(data);

         $('html').html(data);
      }
    });


  });




</script>
</body>
</html>