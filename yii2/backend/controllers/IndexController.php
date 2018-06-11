<?php
/**
 * Created by PhpStorm.
 * User: peaunt
 * Date: 2018/6/7
 * Time: 19:26
 */

namespace backend\controllers;

use common\models\Board;
use common\models\User;
use yii\web\Controller;

class IndexController extends Controller
{
    public function actionIndex(){
        $request = \Yii::$app -> request;
        if($request -> isGet){
            $model  = new User();
            return $this -> render('index',['model'=>$model]);
        }else{
            $data = User::find()->where(['username'=>$request->post('User')['username'],'password'=>md5($request->post('User')['password'])])->one();
            if($data){
                \Yii::$app->session->set('User',$data);
                return $this -> redirect('index.php?r=index/lst');
            }else{
                \Yii::$app->getSession()->setFlash('error','用户或者密码不存在');
                return $this -> redirect('index.php?r=index/index');
            }
        }
    }

    public function actionLst(){
        $model = new Board();
        $data = Board::find()->all();
        return $this -> render('lst',['model'=>$model,'data'=>$data]);
    }

    public function actionAjax(){
        $data = \Yii::$app->request->post();
        $data['create_time'] = time();
        $data['update_time'] = time();
        if(\Yii::$app->db->createCommand()->insert('board',$data)->execute()){
            return json_encode(['error'=>0,'data'=>'添加成功']);
        }else{
            return json_encode(['error'=>1,"data"=>'添加失败']);
        }
    }

    public function actionDel(){
        $id = \Yii::$app->request->post('id');
        if(\Yii::$app->db->createCommand()->delete('board','id='.$id)->execute()){
            return json_encode(['error'=>0,'data'=>'删除成功']);
        }else{
            return json_encode(['error'=>1,"data"=>'删除失败']);
        }
    }

    public function actionGetindex()
    {
        $data = Order::find();
        $page = new Pagination(['totalCount'=>$data->count(), 'pageSize'=>10]);
        $model = $data->offset($page->offset)->limit($page->limit)->asArray()->all();
        var_dump($model);die;
    }














}