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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class IndexController extends Controller{

    /**
     * @return  User
     */
    protected $model;

    public function __construct(){
        $this -> model = new User();
    }

    public function index(){
        $data = $this -> model -> get()->toArray();
        return view('user.index',['data'=>$data]);
    }

    public function del(){
        if($this -> model ->where('id',Request::get('id'))-> delete()){
            return redirect('index');
        }else{
            return $this -> error('删除失败');
        }
    }

    public function update(){
        $data = $this -> model -> find(Request::get('id'));
//        $data = $this -> model -> where('id',Request::get('id'))->first();
        if($data){
            return view('user.update',['data'=>$data]);
        }else{
            return $this -> error('数据预查询失败');
        }
    }

    public function save(){
        $data = Request::all();
        $data['password'] = md5($data['password']);
        unset($data['_token']);
        $result = $this -> model -> where('id',Request::get('id'))-> update($data);
        if($result){
            return redirect('index');
        }else{
           return  $this -> error('修改失败');
        }

    }

    public function add(){
        return view('user.add');
    }


    public function addsave(){
        $data = Request::all();
        unset($data['_token']);
        $data['password'] = md5($data['password']);
        if($this -> model -> insert($data)){
            return redirect('index');
        }else{
            return  $this -> error('添加失败');
        }
    }

    public function error($data){
        return ( json_encode($data,JSON_UNESCAPED_UNICODE));
    }




}

