<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Contracts\Session\Session as SessionSession;

use Illuminate\Support\Facades\DB;
// use DB;
use Illuminate\Support\Facades\Session;
// use Session;

class LoginController extends Controller
{
    public function index(){
        return view('login');
        // return view('index');
    }
    public function welcome(){
        return view('index');
        // return view('login');
    }
    public function logout(){
        session::forget('sAccount');
        return redirect('/');
        // return view('login');
    }
    public function checkId(Request $request){  
        $user = DB::table('member')->where('mid','=',$request['usrAccount'])->first();
        if($user!=null){
            if($user->passwd==$request['usrPassword']){
                $dt=date("F j,Y,g:i a");
                Session::put('sLogintime',$dt);
                Session::put('mname',$user->mname);
                Session::put('sAccount',$user->mid);
                return redirect('index');
            }else{
                return redirect()->back()->withInput()->withErrors(['密碼錯誤，請重新輸入']);
            }
        }else{
            return redirect()->back()->withInput()->withErrors(['帳號錯誤，請重新輸入']);
        }
    }
}
