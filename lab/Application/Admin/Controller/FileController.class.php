<?php 
namespace Admin\Controller;
use Admin\Common\ApiController;
class FileController extends ApiController
{
public function upload(){
      $upload = new \Think\Upload();// 实例化上传类
      $upload->maxSize   =    10*1024*1024 ;// 设置附件上传大小
      $upload->exts      =     array('doc', 'docx', 'xls', 'txt','png');// 设置附件上传类型
      $upload->rootPath  =     './Public/'; // 设置附件上传根目录  
      $upload->savePath  =     './test1/'; // 设置附件上传（子）目录 后续可利用个人session来创建个人目录
      $upload->autoSub   =  false; //不生成时间目录
      $upload->SaveName  =  '';
      // 上传文件 
      $info   =   $upload->upload();
      if(!$info) {// 上传错误提示错误信息
        $this->error($upload->getError());
      }else{// 上传成功
        $this->success('上传成功！');
      }
    }  
}
?>