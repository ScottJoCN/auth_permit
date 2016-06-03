<?php
/*
	公共控制器
*/

namespace Home\Controller;
use Think\Controller;
class BaseController extends Controller{
	protected $Table; //要操作的数据对象

	public function _initialize(){
		
	}

	public  function index(){
		/*if(!isset($_SESSION['username'])){
			$this->redirect('Login/index');
		}*/
	}
	//添加操作
    public function add(){
		$this->display();
	}

	//编辑操作
	public function edit(){
		
		$this->display();	
		
	}
	//删除操作
	public function delete(){
		
	}
	public function msg($messager,$url){
		echo "<script>
            alert('$messager ');
            location.href = '$url ';
        </script>";
	}
}
?>