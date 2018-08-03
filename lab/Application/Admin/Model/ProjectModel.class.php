<?php 
namespace Admin\Model;
use Think\Model;
class ProjectModel extends Model
{	
	private $errmsg;
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
	public function add_pro($pno,$name,$photo,$content,$member)
	{
		$id=session('id');
		$check='select  role from user where id ='.$id;
		$check=$this->query($check);
		if($check[0]['role']==1)
	    {
			$data['pno']=$pno;
			$data['name'] = $name;
			$data['photo'] = $photo;
			$data['content'] = $content;
		    $check_pro='select  pno  from project where pno ='.$pno;
		    $check_pro=$this->query($check_pro);
			if($check_pro[0]['pno']!=$pno)
		    {
				if($this->add($data))
				{	
				$i=0;
				$num=count($member);
				for ($i;$i<$num;$i++)
				{
				    $u_id=$member[$i]["u_id"];
				    $duty=$member[$i]["duty"];
					$sql='insert into `member`(`pno`,`u_id`,`duty`) 
					values ('.$pno.','.$u_id.',"'.$duty.'")';
				    $this->execute($sql);
				}
					return true;
				}else
				{
					$this->errmsg='添加项目失失败';
					return false;
				} 
			}
			else 
			{
			$this->errmsg='该项目已存在';
		    return false;
			}
		}
		else
		{
			$this->errmsg='抱歉，您不是管理员';
	    	return false;
		}

	}
	public function change_pro($pno,$name,$photo,$content,$member)
	{	
		$id=session('id');
		$check='select  role from user where id ='.$id;
	    $check=$this->query($check);
		if($check[0]['role']==1)
		{    
			$data['pno']=$pno;
			$data['name'] = $name;
			$data['photo'] = $photo;
			$data['content'] = $content;
			$check_pro='select  pno  from project where pno ='.$pno;
		    $check_pro=$this->query($check_pro);
			$this->where('pno='.$pno)->save($data);
			$sql='delete from member where pno ='.$pno;
			$this->execute($sql);
			$i=0;
			$num=count($member);
			for($i;$i<$num;$i++)
			{
				$u_id=$member[$i]["u_id"];
				$duty=$member[$i]["duty"];
				$sql2='insert into `member`(`pno`,`u_id`,`duty`) 
				values ('.$pno.','.$u_id.',"'.$duty.'")';
				$this->execute($sql2);
			}
			return true;
		}
		else
		{
			$this->errmsg='抱歉，您不是管理员';
		    return false;
		}
	}		
	public function del_pro($pno){
		$id=session('id');
		$check='select  role from user where id ='.$id;
	    $check=$this->query($check);
	    if($check[0][role]==1)
	    {	
			$sql='select pno from project where pno ='.$pno;
			$data=$this->query($sql);
			if($data)
			{
				$sql='delete  from project where pno ='.$pno;	
				$sql2='delete  from member where pno ='.$pno;
				if( ($this->execute($sql))&&($this->execute($sql2)))
				{
					return true;
				}else
				{
				$this->errmsg='删除项目失败';
				return false;
				}	 
			}
			else
			{
				$this->errmsg='该项目不存在,请重新输入';
				return false;
			}
	    }
	  	else 
	    {	
	    	$this->errmsg='抱歉，您不是管理员';
	    	return false;
	    }	
	}	
	public function getError()
	{
		return $this->errmsg;
	}

	}
?>