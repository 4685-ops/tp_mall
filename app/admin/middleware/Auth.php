<?php
/**
 * Created by PhpStorm.
 * User: 757208466
 * Date: 2020/3/22
 * Time: 15:07
 */

/**
 * 开启强制跳转类型
 */
declare (strict_types=1);

namespace app\admin\middleware;

class Auth
{
    public function handle($request, \Closure $next)
    {

        //前置中间件
        if (empty(session(config("admin.session_admin"))) && !preg_match("/login/", $request->pathinfo())) {
            return redirect((string)url('login/index'));
        }

        $response = $next($request);
        //后置中间件
        //if (empty(session(config("admin.session_admin"))) && $request->controller() != "Login") {
        //    return redirect((string)url('login/index'));
        //}
        return $response;

    }

    /**
     * @function   end 中间件结束调度
     *
     * @param \think\Response $response
     * @author admin
     *
     * @date 2020/3/15
     */
    public function end(\think\Response $response)
    {

    }
}