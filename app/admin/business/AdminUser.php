<?php
/**
 * Created by PhpStorm.
 * User:
 * Date: 2020/3/75720846622
 * Time: 16:55
 */

namespace app\admin\business;

use \app\common\model\mysql\AdminUser as AdminUserModel;

class AdminUser
{
    public $adminUserObject = null;

    public function __construct()
    {
        $this->adminUserObject = new  AdminUserModel();
    }

    public function login($data)
    {
        // 如果数据是 不能用toArray方法
        $adminUser = $this->getAdminUserByUsername($data['username']);

        if ($adminUser['password'] != md5($data['password'] . "_singwa_abc")) {
            //return show(config("status.error"), "密码错误");
            throw new \think\Exception("密码错误");
        }
z
        $updateData = [
            "last_login_time" => time(),
            "last_login_ip" => request()->ip(),
            "update_time" => time()
        ];

        $res = $this->adminUserObject->updateById($adminUser['id'], $updateData);
        if (empty($res)) {
            //return show(config("status.error"), "登录失败");
            throw new \think\Exception("登录失败");
        }

        //记录session
        session(config("admin.session_admin"), $adminUser);
        return true;
    }

    public function getAdminUserByUsername($username)
    {
        $adminUser = $this->adminUserObject->getAdminUserByUsername($username);

        if (empty($adminUser) || $adminUser->status != config("status.mysql.table_normal")) {
            return [];
        }
        // 如果数据是 不能用toArray方法
        $adminUser = $adminUser->toArray();

        return $adminUser;
    }

}