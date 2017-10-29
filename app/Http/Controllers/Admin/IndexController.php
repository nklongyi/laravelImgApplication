<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{

    public function index(){
        return view('admin.index');
    }

    public function add(){
        //生成一个item，并将状态设置为“未完成”

        //获取对应的主题id

        return view('admin.add');
    }
}
