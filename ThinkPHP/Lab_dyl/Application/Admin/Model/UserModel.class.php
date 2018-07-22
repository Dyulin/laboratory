<?php 
namespace Admin\Model;
use Think\Model;
class UserModel extends Model
{
		protected $tablename='user';
	    public function log_in($account,$password)
	    {	     
	      	$a = 'select password from user where account='.$account;
	      	$data = $this -> query($a);	
			if($password===$data[0]['password'])
	       {	
	      		return ture;
		   }else
				   	{	
	      				return false;
	      	        }
	    }
	    public function check($account)
	    {	
	    	$check='select * from user where account='.$account;
	    	$check=$this->query($check);
	    	if($check){
	    		return false;
	    	}
	    	return true;
		}
		public function regist($account,$password)
		{
			$add = "insert into user values(null,0,
	     	%d,' ',' ',' ',' ','%s')";  
	     	$data2 = $this -> query($add, $account, $password);
		}
}
?>