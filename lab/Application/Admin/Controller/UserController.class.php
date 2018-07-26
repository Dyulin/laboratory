<?php 
namespace Admin\Controller;
use Admin\Common\ApiController;
class UserController extends ApiController
{	
	/**
	 * @return 
	 * 加载登录页（ajax）登录
	 * 0--正常
	 * 1--失败
	 */
	public function login()
	{	
		$account = (int)I('post.account','');
		$password= I('post.password','');
		$password=md5($password);
		$user=D('User');
		if($user->log_in($account,$password))
		{
			$this->apiReturn();
		}
		else 
		{
			$this->apiReturn($user->getError(), false);
		}
	}

	public function register()
	{	
		$account = (int)I('param.account','');
		$password= I('param.password','');
		$password = md5($password);
		$user=D('User');
		if($user->check($account))
		{
			if($user->regist($account,$password))
			{	
				$this->apiReturn();

			}else
			{
				$this->apiReturn($user->getError(), false);
			}
		}
		else
		{
			$this->apiReturn($user->getError(), false);
		}
	}

	public function changeinfo()
	{
		$job_id=(int)I('param.job_id','');
		$name=I('param.name','');
		$telphone=I('param.telphone','');
		$email=I('param.email','');
		$user=D('User');
		if($user->change_info($job_id,$name,$telphone,$email))
		{
			$this->apiReturn();
		}
		else 
		{
			$this->apiReturn($this->user->getError(), false);
		}
	}

	public function changepass()
	{
		$oldpass=I('param.oldpass','');
		$newpass=I('param.newpass','');
		$user=D('User');
		if($user->change_pass($oldpass,$newpass))
		{
			$this->apiReturn();
		}
		else
		{	
			$this->apiReturn($user->getError(), false);
		}
	}

	public function showperson()
	{
		$user=D('User');
		$data=$user->showper();
		$this->apiReturn($data);	
	} 
}
?>
