<?php 
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller
{	
	/**
	 * @return 
	 * 加载登录页（ajax）登录
	 * 0--登录失败
	 * 1--登录成功
	 */
	public function login()
	{	
		$account = (int)I('post.account','');
		$password= I('post.password','');
		$password=md5($password);
		$user=D('User');
		if($user->log_in($account,$password))
		{
			echo "登录成功";
			//ajaxReturn(1,"登录成功");
		}else 
		{
			echo '登录失败';
			//ajaxReturn(0,"登录失败");
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
			if($user->regist($account,$password));
			{	
				echo "注册成功";
				//ajaxReturn(1,"注册成功");
			}
		}else
		{
			echo "注册失败";
			//ajaxReturn(0,"注册失败");
		}

		//ajaxReturn(0,"注册失败");
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
			echo "修改信息成功";
			//ajaxReturn(1,"修改信息成功");
		}else 
		{
			echo '修改信息失败';
			//ajaxReturn(0,"修改信息失败");
		}
	}
	public function changepass()
	{
		$oldpass=I('param.oldpass','');
		$newpass=I('param.newpass','');
		$user=D('User');
		if($user->change_pass($oldpass,$newpass))
		{
			echo "修改密码成功";
			//ajaxReturn(1,"修改信息成功");
		}else
		{	
			echo "修改密码失败";
			//ajaxReturn(1,"修改信息失败");
		}
	}
	public function showperson()
	{
		$user=D('User');
		$data=$user->showper();
		print_r($data);
		return $data;
	} 
}
?>
