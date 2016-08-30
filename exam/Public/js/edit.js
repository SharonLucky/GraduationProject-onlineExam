$(function () {

  //修改资料选项卡切换
  $('.per_slider ul li>a').eq(0).css('color', '#F01400');
  $('.per_slider ul li').each(function () {
    $(this).click(function () {
      $(this).children('a').css('color', '#F01400');
      $(this).siblings().children('a').css('color', '#3e4145');
    });
  });


  //城市联动
  var province = '';
  $.each(city, function (i, k) {
    province += '<option value="' + k.name + '" index="' + i + '">' + k.name + '</option>';
  });
  $('select[name=province]').append(province).change(function () {
    var option = '';
    if ($(this).val() == '') {
      option += '<option value="">请选择</option>';
    } else {
      var index = $(':selected', this).attr('index');
      var data = city[index].child;
      for (var i = 0; i < data.length; i++) {
        option += '<option value="' + data[i] + '">' + data[i] + '</option>';
      }
    }

    $('select[name=city]').html(option);
  });

  //所在地默认选项
  address = address.split(' ');
  $('select[name=province]').val(address[0]);
  $.each(city, function (i, k) {
    if (k.name == address[0]) {
      var str = '';
      for (var j in k.child) {
        str += '<option value="' + k.child[j] + '" ';
        if (k.child[j] == address[1]) {
          str += 'selected="selected"';
        }
        str += '>' + k.child[j] + '</option>';
      }
      $('select[name=city]').html(str);
    }
  });


  //头像上传 Uploadify 插件
  $('#face').uploadify({
    swf : PUBLIC + '/Uploadify/uploadify.swf',	//引入Uploadify核心Flash文件
    uploader : uploadUrl,	//PHP处理脚本地址
    width : 120,	//上传按钮宽度
    height : 30,	//上传按钮高度
    buttonImage : PUBLIC + '/Uploadify/browse-btn.png',	//上传按钮背景图地址
    fileTypeDesc : 'Image File',	//选择文件提示文字
    fileTypeExts : '*.jpeg; *.png;',	//允许选择的文件类型
    formData : {'session_id' : sid},
    //上传成功后的回调函数
    onUploadSuccess : function (file, data, response) {
      eval('var data = ' + data);
      var data = JSON.parse(data); //由JSON字符串转换为JSON对象，json转成object
      console.log(data);
      if (data.status) {
        $('#face-img').attr('src', ROOT + '/Uploads/' + data.mini_pic);
        $('input[name=face180]').val(data.mini_pic);
        //$('input[name=face80]').val(data.path.medium);
        //$('input[name=face50]').val(data.path.mini);
      } else {
        alert(msg.info);
      }
    }
  });

  //jQuery Validate 表单验证

  /**
   * 添加验证方法
   * 以字母开头，5-17 字母、数字、下划线"_"
   */
  jQuery.validator.addMethod("user", function (value, element) {
    var tel = /^[a-zA-Z][\w]{4,16}$/;
    return this.optional(element) || (tel.test(value));
  }, "以字母开头，5-17 字母、数字、下划线'_'");

  $('form[name=editPwd]').validate({
    errorElement: 'div',
    success: function (label) {
      label.removeClass('error');
      label.addClass('success');
    },
    rules: {
      old: {
        required: true,
        user: true
      },
      new: {
        required: true,
        user: true
      },
      newed: {
        required: true,
        equalTo: "#new"
      }
    },
    messages: {
      old: {
        required: '请填写旧密码',
      },
      new: {
        required: '请设置新密码'
      },
      newed: {
        required: '请确认密码',
        equalTo: '两次密码不一致'
      }
    }
  });
});


function changeRight(value) {
  /*利用bootstrap的.show和.hide类*/
  if (value == 1) {
    $("#set_personal").removeClass('hide').addClass('show');
    $("#set_pic,#set_ps,#set_account").removeClass('show').addClass('hide');

  } else if (value == 2) {
    $("#set_pic").removeClass('hide').addClass('show')
    $("#set_personal,#set_ps,#set_account").removeClass('show').addClass('hide');

  } else if (value == 3) {
    $("#set_ps").removeClass('hide').addClass('show')
    $("#set_personal,#set_pic,#set_account").removeClass('show').addClass('hide');

  } else if (value == 4) {
    $("#set_account").removeClass('hide').addClass('show')
    $("#set_personal,#set_pic,#set_ps").removeClass('show').addClass('hide');

  }

}