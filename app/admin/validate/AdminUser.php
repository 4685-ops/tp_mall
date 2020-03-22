<?php
/**
 * Created by PhpStorm.
 * User: 757208466
 * Date: 2020/3/22
 * Time: 16:14
 */

namespace app\admin\validate;


use think\Validate;

class AdminUser extends Validate
{
    protected $rule = [
        'username' => 'require',
        'password' => 'require',
        'captcha' => 'require|checkCaptcha',
    ];

    protected $message = [
        'username' => '用户名必须',
        'password' => '密码必须',
        'captcha' => '验证码必须',
    ];

    /**
     * @function   checkCaptcha 自定义验证判断函数
     *
     * @param $value
     * @param $rule
     * @param array $data
     * @author admin
     *
     * @date 2020/3/22
     */
    protected function checkCaptcha($value, $rule, $data = [])
    {
        if (!captcha_check($value)) {
            return '您输入的验证码不正确';
        }
        return true;
    }
}