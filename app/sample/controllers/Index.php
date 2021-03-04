<?php namespace app\sample\controllers;

/* 主控制器 */

class Index
{
    public function index()
    {
        // error('this is index');
        return '2121,欢迎来到 HiWork, 您所看到是【'.\env('APP_NAME').'项目】的主页面';
    }

    public static function show()
    {
        return '2121,欢迎来到 HiWork, 您所看到是【'.\env('APP_NAME').'项目】的"静态"主页面';
    }

    // 使用中间件：模似车辆限行
    public function cheliangxianxing($req, $code, $hour)
    {
        var_dump("执行路由到控制器@方法，并使用中间件：", $req, $code, $hour);
        
    }

}
