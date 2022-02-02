<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('sql', function (Request $request) {
    $builder = new \BigShark\SQLToBuilder\BuilderClass('SELECT *  FROM users WHERE role_id=1 AND group_id=2');
    $result = $builder->convert();
    return view('form',['sql'=>'','result'=>$result]);
});

Route::post('sql', function (Request $request) {
    $builder = new \BigShark\SQLToBuilder\BuilderClass($request->sql);
    $result = $builder->convert();
    return view('form',['sql'=>(string)$request->sql, 'result'=>'\\'.(string)$result]);
});
