<?php
/**
 * Created by PhpStorm.
 * User: 757208466
 * Date: 2020/3/15
 * Time: 21:46
 */

namespace app\admin\controller;

use think\captcha\facade\Captcha;
class verify
{
    public function index(){

        /**
         * 修改验证码配置 在 config/captcha.php文件中
         */
        return Captcha::create("admin_verify");
    }
}