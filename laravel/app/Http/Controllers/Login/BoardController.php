<?php
/**
 * Created by PhpStorm.
 * User: peaunt
 * Date: 2018/6/11
 * Time: 14:20
 */

namespace App\Http\Controllers\Login;


use App\Board;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;

class BoardController extends Controller
{
    public function index(){
        $model = new Board();
        $data = $model -> paginate(2);
        return view('user.board',['data'=>$data]);
    }

    public function add(){
        $model = new Board();
        $data = Request::all();
        $data['create_time'] = time();
        $data['update_time'] = time();
        unset($data['_token']);
        if($model ->insert($data)){
            return json_encode([
                'error'=>0,
                'msg'=>'添加成功'
            ]);
        }else{
            return json_encode([
                'error'=>1,
                'msg'=>'添加失败'
            ]);
        }
    }

    public function del(){
        $model = new Board();
        $id = Request::get('id');
        if($model ->where('id',$id)->delete()){
            return json_encode([
                'error'=>0,
                'msg'=>'删除成功'
            ]);
        }else{
            return json_encode([
                'error'=>1,
                'msg'=>'删除失败'
            ]);
        }
    }
}