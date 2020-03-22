<?php
/**
 * Created by PhpStorm.
 * User: 757208466
 * Date: 2020/3/22
 * Time: 14:52
 */

namespace app\admin\controller;


class Logout extends AdminBase
{
    public function index()
    {

        session(config("admin.session_admin"), null);

        return redirect(url("login/index"));
    }
}