<?php 
namespace Admin\Model;
use Think\Model;
class FileModel extends Model{
	private $errmsg;
	protected $tablename='file';
	public function up($name,$url,$time)
	{	
		$data['id']=null;
		$data['name']=$name;
		$data['url']=$url;
		$data['time']=$time;
		$data['f_id']=session('account');
		if($this->add($data))
		{	
			return ture;	
		}
		$this->errmsg='上传失败';
		return false;
	}
		public function getError()
	{
		return $this->errmsg;
	}
}
 ?>
