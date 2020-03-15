<?php

namespace app\demo\controller;


use app\BaseController;
use think\exception\HttpException;

class Index extends BaseController
{
    public function index()
    {

        throw  new HttpException(400,'找不到该数据');
    }


    public function hello(){
        dump($this->request->type);
    }

}
