$(function () {
  // 初始化 传入dom id
  var victor = new Victor("container", "output");
  
  //得到焦点
  $("#password,#password2,#passwordagain").focus(function () {
    $("#left_hand").animate({
      left: "150",
      top: " -38"
    }, {
      step: function () {
        if (parseInt($("#left_hand").css("left")) > 140) {
          $("#left_hand").attr("class", "left_hand");
        }
      }
    }, 3000);
    $("#right_hand").animate({
      right: "-64",
      top: "-38px"
    }, {
      step: function () {
        if (parseInt($("#right_hand").css("right")) > -70) {
          $("#right_hand").attr("class", "right_hand");
        }
      }
    }, 2000);
  });
  //失去焦点
  $("#password,#password2,#passwordagain").blur(function () {
    $("#left_hand").attr("class", "initial_left_hand");
    $("#left_hand").attr("style", "left:100px;top:-12px;");
    $("#right_hand").attr("class", "initial_right_hand");
    $("#right_hand").attr("style", "right:-112px;top:-12px");
  });


  //点击刷新验证码
  var verifyUrl = $('#verify-img').attr('src');
  $('#verify-img').click(function () {
    $(this).attr('src', verifyUrl);
  });

  //jQuery Validate 表单验证

  /**
   * 添加验证方法
   * 以字母开头，5-17 字母、数字、下划线"_"
   */
  jQuery.validator.addMethod("user", function(value, element) {
    var tel = /^[a-zA-Z][\w]{4,16}$/;
    return this.optional(element) || (tel.test(value));
  }, "以字母开头，5-17 字母、数字、下划线'_'");

  $('form[name=register]').validate({
    errorElement : 'h5',
    success : function (label) {
      label.removeClass('error');
      label.addClass('success');
    },
    rules : {
      account : {
        required : true,
        user : true,
        remote : {
          url : checkAccount,
          type : 'post',
          dataType : 'json',
          data : {
            account : function () {
              return $('#account').val();
            }
          }
        }
      },
      password : {
        required : true,
        user : true
      },
      passwordagain : {
        required : true,
        equalTo : "#password"
      },
      uname : {
        required : true,
        rangelength : [2,10],
        remote : {
          url : checkUname,
          type : 'post',
          dataType : 'json',
          data : {
            uname : function () {
              return $('#uname').val();
            }
          }
        }
      },
      verify : {
        required : true,
        remote : {
          url : checkVerify,
          type : 'post',
          dataType : 'json',
          data : {
            verify : function () {
              return $('#verify').val();
            }
          }
        }
      }
    },
    messages : {
      account : {
        required : '账号不能为空',
        remote : '账号已存在'
      },
      password : {
        required : '密码不能为空'
      },
      passwordagain : {
        required : '请确认密码',
        equalTo : '两次密码不一致'
      },
      uname : {
        required : '请填写您的昵称',
        rangelength : '昵称在2-10个字之间',
        remote : '昵称已存在'
      },
      verify : {
        required : ' ',
        remote : ' '
      }
    }
  });

});