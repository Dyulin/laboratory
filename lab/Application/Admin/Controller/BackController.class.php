<?php 
namespace Admin\Controller;
use Admin\Common\ApiController;
class BackController extends ApiController {
	public function delete(){
		$account=(int)I('post.account','');
		$user = D('user');
		if($user->_delete($account))
		{	
			$this->add_record($account,'被'.session('account').'删除');
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
			$this->add_record($account,'被'.session('account').'设置为管理员');
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
			$this->add_record($account,'新增项目'.$pno);
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
			$this->add_record($account,'修改项目'.$pno);
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
			$this->add_record($account,'删除项目'.$pno);
			$this->apiReturn();
		}
		else 
		{
			$this->apiReturn($project->getError(), false);
		}
	}
	public function rec_show()
	{  
		$all=D('Record');
		if($all->recshow())
		{	
			$data=$all->recshow();
			$this->apiReturn($data);
		}
		else 
		{
			$this->apiReturn($all->getError(), false);
		}
	} 
}

 ?>