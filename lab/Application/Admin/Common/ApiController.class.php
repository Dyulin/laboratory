<?php
namespace Admin\Common;
use Think\Controller;
class ApiController extends Controller {
	protected function apiReturn($data = array(), bool $correct = true)
	{
		$result = array(
			'code'    => 0,
			'data'    => $data
		);
		if( ! $correct){
			$result = array(
			'code'    => 1,
			'message' => $data
			);
		}
		$result = html_escape($result);
		$this->ajaxReturn($result);
	}
}
?>
