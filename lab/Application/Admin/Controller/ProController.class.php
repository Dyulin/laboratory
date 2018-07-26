<?php 
namespace Admin\Controller;
use Admin\Common\ApiController;
class ProController extends ApiController
{
	public function showlist()
	{
		$prolist=D('Project');
		$data2=$prolist->list();
		$this->apiReturn($data2);
	}
	public function proshow()
	{
		$pno=(int)I('param.pno');
		$pro=D('Project');
		$projects=$pro->proshow($pno);
		$member=$pro->promember($pno);
		$array = array($projects,$member);
		$this->apiReturn($array);
	}
}
?>
