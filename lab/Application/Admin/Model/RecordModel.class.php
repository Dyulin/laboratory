<?php 
namespace Admin\Model;
use Think\Model;
class RecordModel extends Model
{	
	private $errmsg;
	protected $tablename='record';
	public function addrecord($account,$content,$time)
	{	
		$data['id']=null;
		$data['u_id']=$account;
		$data['content']=$content;
		$data['time']=$time;
		if($this->add($data))
		{	
			return ture;	
		}	
	}
	public function recshow()
	{	
		$sql = '
		SELECT `u_id`,`content`, `time`
		FROM `record`';
		$arr=$this->query($sql);
		return  $arr;
	}	
}
?>
