<?php
namespace Admin\Common;
use Think\Controller;
class ApiController extends Controller {
		public function __construct(){
		parent::__construct();

		date_default_timezone_set('PRC');
		header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Origin:http://localhost');
        header('Access-Control-Allow-Headers:token, Origin, X-Requested-With, Content-Type, Accept');
        header('Access-Control-Allow-Methods:PUT,POST,GET,DELETE,OPTIONS');
        header('X-Powered-By: 3.2.1');

		
	}
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
	protected function 	get_content()
	{
		$arr=json_decode(file_get_contents('php://input'), true);

	}
	protected function add_record($account,$content)
	{	
		$time=date("Y/m/d").' '.date("h:i:sa");
		$newrecord=D('Record');
		$newrecord->addrecord($account,$content,$time);
	}
}
?>
