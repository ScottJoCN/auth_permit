<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
       $this->display();
    }
    
    public function dologin(){
        $username = trim(I('post.uname'));
        $password = trim(I('post.password'));
        $code = I('post.verifyCode');
        // echo md5($password);
        if(empty($username) || empty($password)){
            $this->msg("用户名或密码不能为空!",U('Login/index'));
        }

        $verify = new \Think\Verify();
        if(!$verify->check($code)){
            $this->msg("验证码错误!",U('Login/index'));
        }
        $User = M('admin');
        $condition = array();
        $condition['uname'] =array('eq',$username);
        $authInfo =$User->where($condition)->find();
        if(!$authInfo){
            $this->msg("用户名不存在!",U('Login/index'));
        }else{
            if($authInfo['password'] != md5($password)) {
                $this->msg("密码错误!",U('Login/index'));
            }

            session('username',$authInfo['uname']);
            session('id',$authInfo['id']);
            session('lasttime',$tauthInfo['last_time_time']);
            //保存登录信息
            $data = array();
            $data['id'] =   $authInfo['id'];
            $data['last_login_time'] =   time();
            $data['last_login_ip']    =    get_client_ip();
            $User->save($data);
            $this->assign('jumpUrl',U('Index/index'));
            $this->success("登陆成功!");
        }


    }
    public function verify(){
        $config = array('fontSize'    =>30,    // 验证码字体大小    
                        'length'      =>4,     // 验证码位数    
                        'useCurve'    =>false,
                        );
        $Verify = new \Think\Verify($config);
        $Verify->entry();
    }
    public function msg($messager,$url){
        echo "<script>
            alert('$messager ');
            location.href = '$url ';
        </script>";
    }
    public function logout(){
        if(isset($_SESSION['username'])){
            session_destroy();
            $this->assign('jumpUrl',U('Login/index'));
            $this->success("用户退出登录状态成功");
        }else {
            $this->assign('jumpUrl',U('Login/index'));
            $this->error("用户并未登录");
        }
    }
}