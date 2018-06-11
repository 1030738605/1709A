<?php
/**
 * Created by PhpStorm.
 * User: peaunt
 * Date: 2018/6/10
 * Time: 14:10
 */

namespace App\Http\Controllers\Login;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){
        return view('index');
    }

    public function login(Request $data){
        $model = new User();
        if($this -> vali($data)) {
            $user = $model->where('username', $data['username'])->first();
            if ($user) {
                if($user['password'] == md5($data['password'])){
                    session('user',$user->toArray());
                    return redirect('index');
                }else{
                   return  $this -> error('密码错误');
                }
            } else {
                return $this->error('用户名不存在');
            }
        }

    }

    public function vali($data){
        $vali = Validator::make ($data->all(),[
            'username'=>'required',
            'password'=>'required'
        ]);
        if($vali -> fails()){
           return  $this -> error($vali->errors());
        }
        return true;
    }
    public function error($data){
        return ( json_encode($data,JSON_UNESCAPED_UNICODE));
    }

}

