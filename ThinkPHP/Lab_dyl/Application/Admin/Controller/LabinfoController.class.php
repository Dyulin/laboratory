<?php 
namespace Admin\Controller;
use Think\Controller;
class LabinfoController extends Controller
{	
	/**
	 * @return 
	 * 加载登录页（ajax）登录
	 * 0--登录失败
	 * 1--登录成功
	 */
	public function login()
		{	
			if(IS_AJAX)
			  {
				$work_id = (int)I('param.work_id','');
				$password= I('param.password','');
				$password = md5(password);
				/*$a=2016214356;
				$b='123456';*/
				$x=D('User');
				if($x->log_in($work_id,$password))
				{
					session('work_id',$work_id);
					$this->ajaxReturn(1);
				}
				$this->ajaxReturn(0);
 		      }
 	    }

}
 ?>