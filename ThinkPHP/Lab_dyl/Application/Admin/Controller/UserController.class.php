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
			$account = (int)I('param.account','');
			$password= I('param.password','');
			$password = md5(password);
			/*$a=2016214356;
			$b='123456';*/
			$user=D('User');
			if($user->log_in($account,$password))
				{
					session('account',$account);
					ajaxReturn(1,"登录成功");
			    }
			 		ajaxReturn(0,"登录失败");
 		      
 	    }
 	/*public function register()
		{	
			//$account = (int)I('param.account','');
			//$password= I('param.password','');
			$account=2013 ;
			$password='1234567';
			//$password = md5(password);
			$user=D('User');
			$data2=array(
	    	'id'=>null,
	    	'role'=>0,
			'account'=>$account,
			'job_id'=>' ',
			'name'=>' ',
			'telphone'=>' ',
			'email'=>' ',
			'password'=>$password,
			);
			if($user->check($account))
				{
					if($user->add($data2));
					{
						ajaxReturn(1,"注册成功");
						session('account',$account);
					}
					ajaxReturn(0,"注册失败");
			    }
			 		ajaxReturn(0,"注册失败");
		}*/
	public function register()
	{
		$account=201345;
		$password='1234567';
		$user=D('User');
		if($user->check($account))
				{
					if($user->regist($account,$password));
					{
						session('account',$account);
						ajaxReturn(1,"注册成功");
					}
					ajaxReturn(0,"注册失败");
			    }
			 		ajaxReturn(0,"注册失败");
}	  
}
?>	
