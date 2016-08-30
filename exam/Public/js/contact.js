//验证中文真实姓名
function is_trueName(value){
  var m =  value.val().match(/^[\u4e00-\u9fa5]{2,4}$/i);
  if(!m){
    return false;
  }else{
    return true;
  }
}

//验证邮箱格式
function is_email(value){
  var pattern=/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
  if(!pattern.test(value)){
    return false;
  }
  return true;
}

