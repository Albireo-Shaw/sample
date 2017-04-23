<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class SessionsController extends Controller
{
    //登录页面控制器
    public function create() {
        return view('sessions.create');
    }

    //验证用户数据
    public function store(Request $request) {
        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($credentials, $request->has('remember'))) {
            session()->flash('success', '欢迎回来！');
            return redirect()->route('users.show', [Auth::User()]);
        } else {
            session()->flash('danger', '很抱歉，密码错误！');
            return redirect()->back();
        }
    }

    //退出
    public function destory() {
        Auth::logout();
        session()->flash('success', '您已成功退出');
        return redirect('login');
    }
}
