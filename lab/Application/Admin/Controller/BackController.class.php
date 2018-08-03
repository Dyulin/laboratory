<?php 
namespace Admin\Controller;
use Admin\Common\ApiController;
class BackController extends ApiController {
	public function delete(){
		$account=(int)I('post.account','');
		$user = D('user');
		if($user->_delete($account))
		{
			$this->apiReturn();
		}else
		{
			$this->apiReturn($user->getError(),false);
		}
	}
	public function ins_admin(){
		$account=(int)I('post.account','');
		$user = D('user');
		if($user->insadmin($account))
		{
			$this->apiReturn();
		}else
		{
			$this->apiReturn($user->getError(),false);
		}
	}
	public function addpro()
	{	
		$arr=$this->get_content();
		//print_r($arr);die;
		$pno=$arr['pno'];
		$name=$arr['name'];
		$photo=$arr['photo'];  //应为上传fe片地址
		$content=$arr['content'];
		$member=$arr['member'];
		//print_r($arr['member']);die;
		$pro=D('Project');
		//print_r($pno);die;
		if($pro->add_pro($pno,$name,$photo,$content,$member))
		{	

			$this->apiReturn();
		}
		else 
		{
			$this->apiReturn($pro->getError(), false);
		}
	}
	public function changepro()
	{
		$arr=$this->get_content();
		$pno=$arr['pno'];
		$name=$arr['name'];
		$photo=$arr['photo'];  //应为上传fe片地址
		$content=$arr['content'];
		$member=$arr['member'];
		$pro=D('Project');
		if($pro->change_pro($pno,$name,$photo,$content,$member))
		{	

			$this->apiReturn();
		}
		else 
		{
			$this->apiReturn($pro->getError(), false);
		}
	}
	public function delpro()
	{
		$pno=(int)I('post.pno','');
		$project=D('Project');
		if($project->del_pro($pno))
		{
			$this->apiReturn();
		}
		else 
		{
			$this->apiReturn($project->getError(), false);
		}
	}
}

 ?>