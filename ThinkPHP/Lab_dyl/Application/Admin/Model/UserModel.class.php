<?php 
namespace Admin\Model;
use Think\Model;
class UserModel extends Model
{
	protected $tablename='user';
	  public function log_in($work_id,$password)
	    {
	        /*$data = $this -> field('password')
	      				->where('work_id=%d',$work_id)
	      				->find();*/
	      
	      	$a = 'select work_id,password from user where work_id="'.$work_id.'"';
	      	$data = $this -> query($a);	
	   
	      	
	      	if($password===$data[0]['password'])
	      	{	echo '登录成功';
	      		return ture;
			}else
	      	{	echo '登录失败';
	      		return false;
	      	}
	      	
		} 

	
	 
 }
?>