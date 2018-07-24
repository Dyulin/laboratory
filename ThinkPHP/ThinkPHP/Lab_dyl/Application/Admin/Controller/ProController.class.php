<?php 
namespace Admin\Controller;
use  Think\Controller;
class ProController extends Controller
{
	public function showlist()
	{
		$prolist=D('Project');
		$data2=$prolist->list();
		//dump($data2);
		return $data2;
	}
	public function proshow()
	{
		$pno=(int)I('param.pno');
		$pro=D('Project');
		$projects=$pro->proshow($pno);
		print_r($projects);
		//echo $projects[0]['name'];
		return $projects;
	}
	public function promember()
	{
		$pno=(int)I('param.pno');
		$pro=D('Project');
		$member=$pro->promember($pno);
		print_r($member);
		//echo $projects[0]['name'];
		return $member;
	}
}
?>
