<?php
/**
 * Created by PhpStorm.
 * User: peaunt
 * Date: 2018/6/11
 * Time: 10:40
 */

namespace backend\controllers;


use common\models\Yonghu;
use yii\web\Controller;
use yii\web\Request;

class LoginController extends Controller
{


    public function actionIndex(){
        $model = new Yonghu();
        return $this -> render('index',['model'=>$model]);
    }

    public function actionLogin(){
        var_dump($this);die;
        $model = new Yonghu();
        dump($model);
        $data = Request::all();
        var_dump($data);die;
        if($model -> actionLog()){
            return $this ->redirect('index.php?r=aa/aa');
        }else{
            return $this -> model -> error();
        }
    }
}