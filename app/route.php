<?php 
const CTL_SPACE = '\app\sample\controllers';

//= 基础路由 =============================
//解析到成员方法
$route->get('/', CTL_SPACE.'\Index@index');


//解析到静态方法
$route->get('/cs[\.html]', function(){

	$str ='abg46';
	var_dump($str[-1]);exit;
	$r = db()->R('select * from t_cs1');

	var_dump($r);exit;
	return '测试页面'.$_SERVER['REQUEST_URI'];
});


// 绑定数据
$route->get('/user/{id:\d{2,5}}', function($id){
    var_dump('当前用户: id='.$id);
});

// 视图
$route->get('/view/{id:\d{2,5}}', function($id){
    // error('456aaa');
    return view()->assign('id', $id)->display('view/sample_view3.html');

});









//= 中间件 =============================
// 中间件+闭包 示例：模似车辆限行cheliangxianxing
$route->get('/clxx/{code}/{hour}', [
    'middleware'=>[
        '\app\sample\middleware\MyBeforeMiddleware',
        '\app\sample\middleware\MyBeforeMiddleware2',
        '\app\sample\middleware\MyAfterMiddleware',
    ],
    // $ctlSapce('Index@index')
    function($request, $code, $hour){
        $r = '最终调用方法：';
        $r .= var_export([$request, $code, $hour], true);
        return $r.'<br/>';
    }
]);


// 中间件+控制器成员方法 示例：模似车输限行
$route->get('/clxx2/{code:\d+}/{hour:\d{1,2}}', [
    'middleware'=>[
        '\app\sample\middleware\MyBeforeMiddleware',
        '\app\sample\middleware\MyBeforeMiddleware2',
        '\app\sample\middleware\MyAfterMiddleware',
    ],
    CTL_SPACE.'\Index@cheliangxianxing'
]);







//= 功能页 =========================
// 输出日志
$route->get('/log', function(){
    logger()->notice('微信返回信息', [date('Y-m-d H:i:s')]);
    return 'log页面';
});