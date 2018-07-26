<?php 
namespace Admin\Model;
use Admin\Common\ApiController;
class UserModel extends Model
{	
	private $errmsg; //错误信息
	protected $tablename='user';
	public function log_in($account,$password)		//校验密码
	{	
	   	$a ='select id,password from user where account='.$account;
		$data = $this -> query($a);	
		if($password===($data[0]['password']))
	    {	
	    	session ('id',$data[0][id]);
	    	return ture;
		}
			$this->errmsg= '用户名或密码错误';
	    	return false;
	}
	public function check($account)  //检查该账户是否被注册过
	{	
	    $check='select * from user where account='.$account;
	    $check=$this->query($check);
	    if($check)
	    {	
	    	$this->errmsg='该账号已被注册';
	    	return false;
	    }	
			return true;
	}
	public function regist($account,$password)   //添加信息至数据库
	{	
		$data['account'] = $account;
		$data['password'] = $password;
		$data['role']=0;
		$data['job_id']=0;
		$data['telphone']=' ';
		$data['email']=' ';
		$data['name']=' ';
		if($this->add($data))
		{
			$a ='select id from user where account='.$account;
			$data2 = $this -> query($a);	
			session ('id',$data2[0][id]);
			return true;
		} 	
			$this->errmsg='session设置失败';
			return false;
	}
	public function change_info($job_id,$name,$telphone,$email)
	{	
		$data['id']=session('id');
		//echo $data['id'];
		$data['job_id'] = $job_id;
		$data['name'] = $name;
		$data['telphone'] = $telphone;
		$data['email'] = $email;
		if($this->save($data))
		{
			return true;
		} 
			$this->errmsg='修改信息失败';
			return false;
	}
	public function change_pass($oldpass,$newpass)
	{	
		$oldpass=md5($oldpass);
		$newpass=md5($newpass);
		$now_id=session('id');
		$a ='select password from user where id='.$now_id;
		$data = $this -> query($a);	
		if($oldpass===($data[0]['password']))
	    {	
	    	$data2['id']=session('id');
	    	$data2['password'] = $newpass;
	    	$this->save($data2);
	    	return true;
		}else
		{	
			$this->errmsg='原密码错误';
			return false;
		}
	}
	public function showper()
		{	
			$sql = '
			SELECT `name`, `telphone`,`job_name`,`email`
			FROM `user`,`job`
			where job.`id` = user.`job_id`';
			$showper=$this->query($sql);
			return  $showper;
		}
	public function getError()
	{
		return $this->errmsg;
	}
}
?>