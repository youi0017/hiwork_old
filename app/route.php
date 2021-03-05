<?php 
$route->get('/', function(){
    return view()
        ->assign('uri', $_SERVER['REQUEST_URI'])
        ->assign('date', date('Y-m-d'))
        ->display('sample/index.phtml');
});



