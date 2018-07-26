<?php 
namespace Admin\Model;
use Think\Model;
class ProjectModel extends Model
{	
	protected $tablename='project';
	public function list()
	{	
		$sql = '
		SELECT `pno`, `photo`
		FROM `project`
		ORDER BY `id` DESC';
		$projects=$this->query($sql);
		return  $projects;
	}
	public function proshow($pno)
	{	
		$sql = '
		SELECT `name`, `photo`,`content`
		FROM `project`
		where `pno`=%d';
		$projects=$this->query($sql,$pno);
		$arr['name']=$projects[0]['name'];
		$arr['photo']=$projects[0]['photo'];
		$arr['content']=$projects[0]['content'];
		return  $arr;
	}
	public function promember($pno)
	{	
		$sql = '
		SELECT `u_id`, `duty`
		FROM `member`
		where `pno`=%d
		order by `u_id` DESC';
		$member=$this->query($sql,$pno);
		return  $member;
	}
}
?>