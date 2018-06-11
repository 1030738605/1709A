<style>
.board {
    border: 1px solid red;
    width:400px;
    margin:30px;
}
    .title{
        border: 1px solid red;
        height:40px;
        width:400px;
    }
    .content{
        border: 1px solid red;
        width:400px;
        height:100px;
    }
    button  {
        float:right;
    }
    ul li{
        float:left;
        margin:5px;
        list-style: none;
    }

</style>

<script src="/js/jq.js"></script>
<div>
    <form  onsubmit="return false" id="form-id">
        请添加你的标题： <input type="text" name="title"> <br>
        请填写的的内容： <textarea name="content" cols="30" rows="10"></textarea><br>
        <input type="button" value="提交" onclick="add()">
        {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
    </form>
</div>
<br><br><br>




<div class="container">
    @foreach ($data as $v)

        <div class="board">
            <div class="title">标题 ：{{ $v->title }} 创建时间： {{$v->create_time}}    <button onclick="del({{$v->id}})">删除</button></div>
            <div class="content"> <p>内容：</p>{{$v->content}}</div>
        </div>
    @endforeach
</div>

{!! $data->links() !!}

<script>
    function add() {
        $.get('board.add',{title:$('[name=title]').val(),content:$('[name=content]').val()},function (r) {
            if(r.error){
                alert('添加失败');
            }else{
                window.history.go(0);
            }
        },'json')
    }

    function del(id) {
        $.get('board.del',{id:id},function (r) {
            if(r.error){
                alert('删除失败');
            }else{
                window.history.go(0);
            }
        },'json')
    }


</script>