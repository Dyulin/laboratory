<?php 
namespace Admin\Controller;
use Admin\Common\ApiController;
class FileController extends ApiController
{
public function upload(){
  #foreach ($variable as $key => $value) {
    # code...
  #}
      $_account=session('account');
      echo $_account;
      $upload = new \Think\Upload();// 实例化上传类
      $upload->maxSize   =    10*1024*1024 ;// 设置附件上传大小
      $upload->exts      =     array('doc', 'docx', 'xls', 'txt','png','jpg');// 设置附件上传类型
      $upload->rootPath  =     './Public/'; // 设置附件上传根目录  
      $upload->savePath  =     'test1/'.$_account.'/'; // 设置附件上传（子）目录 后续可利用个人session来创建个人目录
      $upload->autoSub   =  false; //不生成时间目录
      $upload->saveName  = '';
      // 上传文件
      $info  =   $upload->upload();
      $path  =   'F:/XAMPP/htdocs/dyl/lab/Public/'.$info['file']['savepath'];
      $name=$info['file']['savename'];
      $time=date("Y/m/d"); 
      $file= D('File');
      $file->up($name,$path,$time);
      if(!$info) {
        $this->apiReturn($this->getError(),false);
      }else{
        $this->apiReturn();
      }
    }  
/*public function download(){
  //path='F:\XAMPP\htdocs\dyl\lab\Public\test1\';
  $http=new \Org\Net\Http();
  $http->download($path);
  }*/
public function see(){
  $filepath='./Public/' ;
  print_r(readDirectory($filepath));
}

/*public function uploadd(){
  print_r($_FILES);
  $filename=$_FILES['file']['name'];
  $tmp_name=$_FILES['file']['tmp_name'];
  move_uploaded_file($tmp_name, "./Public/test2/".$filename);

}*/

}  
?>