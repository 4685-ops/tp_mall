<?php
/**
 * Created by PhpStorm.
 * User: 757208466
 * Date: 2020/3/15
 * Time: 19:47
 */

namespace app\admin\controller;

use app\admin\controller\AdminBase;
use app\common\model\mysql\AdminUser;
use think\facade\View;

class Login extends AdminBase
{
    public function initialize()
    {
        if ($this->isLogin()) {
            return $this->redirect(url('index/index'));
        }
    }

    public function index()
    {
        return View::fetch();
    }

    public function md5()
    {
        echo md5('123456_singwa_abc');
    }

    public function check()
    {
        if (!$this->request->isPost()) {
            return show(config("status.error"), "请求方式错误");
        }

        $username = $this->request->param("username", "", "trim");
        $password = $this->request->param("password", "", "trim");
        $captcha = $this->request->param("captcha", "", "trim");

        //if (empty($username) || empty($password) || empty($captcha)) {
        //   return show(config("status.error"), "参数不能为空");
        //}
        $data = [
            'username' => $username,
            'password' => $password,
            'captcha' => $captcha,
        ];
        $validate = new \app\admin\validate\AdminUser();

        if (!$validate->check($data)) {
            return show(config("status.error"), $validate->getError());
        }
        //tp6 默认session是关闭的 放到了validate里面
        //if (!captcha_check($captcha)) {
        //    return show(config("status.error"), "验证码不正确");
        //}
        try {
            $adminUserObj = new \app\admin\business\AdminUser();
            $result = $adminUserObj->login($data);
        } catch (\Exception $e) {
            return show(config("status.error"), $validate->getError());
        }
        if ($result) {
            return show(config("status.success"), '登录成功');
        }

        return show(config("status.error"), $validate->getError());
    }
}