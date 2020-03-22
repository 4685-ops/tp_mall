<?php
/**
 * Created by PhpStorm.
 * User: 757208466
 * Date: 2020/3/21
 * Time: 20:19
 */

namespace app\common\model\mysql;


use think\Model;

class AdminUser extends Model
{
    /**
     * @function   getAdminUserByUsername 根据用户名获取管理员数据
     *
     * @param $username
     * @return array|bool|null|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     * @author admin
     *
     * @date 2020/3/21
     */
    public function getAdminUserByUsername($username)
    {
        if (empty($username)) {
            return false;
        }

        $where = [
            'username' => trim($username)
        ];

        $result = $this->where($where)->find();

        return $result;
    }

    /**
     * @function   updateById   根据主键id更新数据表的数据
     *
     * @param $id
     * @param $data
     * @return bool
     * @author admin
     *
     * @date 2020/3/22
     */
    public function updateById($id, $data)
    {
        $id = intval($id);
        if (empty($id) || empty($data) || !is_array($data)) {
            return false;
        }

        $where = [
            "id" => $id
        ];

        return $this->where($where)->save($data);
    }
}