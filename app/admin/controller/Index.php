<?php
/**
 * Created by PhpStorm.
 * User: 757208466
 * Date: 2020/3/21
 * Time: 18:45
 */

namespace app\admin\controller;

use app\admin\controller\AdminBase;
use think\facade\View;

class Index extends AdminBase
{
    public function index()
    {
        return View::fetch();
    }

    public function welcome(){
        return View::fetch();
    }
}