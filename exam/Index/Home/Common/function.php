<?php
/**
 * 格式化打印数组
 */
function p ($arr) {
  echo '<pre>';
  print_r($arr);
  echo '</pre>';
}


/**
 * 异位或加密字符串
 * @param  [String]  $value [需要加密的字符串]
 * @param  [integer] $type  [加密解密（0：加密，1：解密）]
 * @return [String]         [加密或解密后的字符串]
 */
function encryption ($value, $type=0) {
  $key = md5(C('ENCTYPTION_KEY'));

  //加密
  if (!$type) {
    return str_replace('=', '', base64_encode($value ^ $key));
  }

  //解密
  $value = base64_decode($value);
  return $value ^ $key;
}


function make_json_result($content, $message='', $append=array())
{
  make_json_response($content, 0, $message, $append);
}

function make_json_error($msg)
{
  make_json_response('', 1, $msg);
}

function make_json_response($content='', $error="0", $message='', $append=array())
{
  include_once(COMMON_PATH.'Util/Json.class.php');
  $json = new JSON;
  //$res = array('error' => $error, 'message' => $message, 'content' => $content);
  $res = array('success1' => $error, 'message' => $message, 'content' => $content);
  if (!empty($append))
  {
    foreach ($append AS $key => $val)
    {
      $res[$key] = $val;
    }
  }
  $val = $json->encode($res);
  exit(print($val));
}

function file_upload($file,$type,$file_name){
  include_once(COMMON_PATH.'Util/FileUpload.class.php');
  $upload=new FileUpload($file,0,$type);
  //获取上传信息
  $info=$upload->getUploadFileInfo();
  $path=rtrim('Public/upload',DIRECTORY_SEPARATOR).'/'.$file_name.".".$info['suffix'];
  $success=$upload->save($path);

  if($success){
    return array('info'=>$info,'path'=>$path);
  }
  return false;
}

function img_crop($src,$path,$x,$y,$w,$h,$width,$height){
  include_once(COMMON_PATH.'Util/ImgCrop.class.php');
  $crop=new ImgCrop();
  $crop->initialize($src,$path,$x,$y,$width,$height,$w,$h);
  $success = $crop->generate_shot();
  if($success){
    return true;
  }
  return false;
}

function str_place($string){
  $str_array = array('<'=>'&lt;','>'=>'&gt;','"'=>'&quot;');

  foreach($str_array as $key =>$value){
    $string = str_replace($key,$value,$string);
  }

  return $string;
}

function addslashes_array($array)
{
  foreach ($array as $key => $val) {
    if (is_array($val)) {
      $array[$key] = addslashes_array($array[$key]);
    } else {
      $array[$key] = addslashes($val);
    }
  }
  return $array;
}
