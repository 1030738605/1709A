<?php
use yii\widgets\LinkPager;
?>
<h3>添加新的留言板</h3>
<h5>给你的留言板添加个标题</h5>
<?= \yii\helpers\Html::textInput('title');?>
<h5>给你的留言板添加内容</h5>
<?= \yii\helpers\Html::textarea('content')?>
<br>
<button onclick="func()">添加</button>
<br>
<br><br><br><br><br>
<h3>留言板</h3>
<?php foreach($data as $v) :?>
<div class="div" style="border:1px solid #cedbeb;width:300px;">
    <div calss="title">标题： <?= \yii\helpers\Html::encode("{$v->title}")?>    创建时间： <?= \yii\helpers\Html::encode("{$v->create_time}")?>
    <button onclick="del(<?= \yii\helpers\Html::encode("{$v->id}")?>)" style="float:right">删除</button>
    </div>
    内容：<div class="content"> <?= \yii\helpers\Html::encode("{$v->content}")?> </div>
</div>

<?php endforeach;?>
<?php
echo LinkPager::widget([
    'pagination' => $pagination,
]);
?>

<script src="/js/jq.js"></script>
<script>


    function func() {
            var title = $('[name=title]').val();
        var content = $('[name=content]').val();
        $.post('index.php?r=index/ajax',{title:title,content:content},function (r) {
            if(r.error){
                alert(r.data);
            }else{
                window.history.go(0);
            }
         },'json')
    }

    function del(id){
        $.post('index.php?r=index/del',{id:id},function (r) {
            if(r.error){
                alert(r.data);
            }else{
                window.history.go(0);
            }
        })
    }


</script>



