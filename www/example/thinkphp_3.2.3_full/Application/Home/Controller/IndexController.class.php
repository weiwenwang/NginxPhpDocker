<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        echo "模块: " .MODULE_NAME . ". 控制器: " . CONTROLLER_NAME . ". 方法: " . ACTION_NAME;
    }

}