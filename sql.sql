-- 后台管理员表
CREATE TABLE `mall_admin_user` (
  `id` int(10) NOT NULL COMMENT 'id',
  `username` varchar(100) NOT NULL COMMENT '用户名',
  `password` char(32) NOT NULL COMMENT '密码',
  `status` tinyint(1) NOT NULL COMMENT '1正常  0待审核 99 已删除',
  `create_time` int(10) NOT NULL COMMENT '创建时间',
  `update_time` int(10) NOT NULL COMMENT '更新时间',
  `last_login_ip` varchar(100) NOT NULL COMMENT '最后登录ip',
  `operate_user` varchar(100) NOT NULL COMMENT '操作人',
  PRIMARY KEY (`id`,`username`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

