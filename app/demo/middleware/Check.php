<?php
/**
 * Created by PhpStorm.
 * User: 757208466
 * Date: 2020/3/15
 * Time: 12:04
 */
namespace app\demo\middleware;

class Check
{
    public function handle($request , \Closure $next){
        $request->type = "demo-lhy";
        return $next($request);
    }

    /**
     * @function   end 中间件结束调度
     *
     * @param \think\Response $response
     * @author admin
     *
     * @date 2020/3/15
     */
    public function end(\think\Response $response){

    }
}