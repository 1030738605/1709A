<a href="user.add">添加</a>
<a href="board.board">留言板</a>
<table border="1" cellspacing="0" cellpadding="10">
    <tr>
        <td>ID</td>
        <td>用户名</td>
        <td>生日</td>
        <td>年龄</td>
        <td>创建时间</td>
        <td>修改时间</td>
        <td>操作</td>
    </tr>

    @foreach($data as $v)
        <tr>
            <td>{{$v['id']}}</td>
            <td>{{$v['username']}}</td>
            <td>{{$v['birthday']}}</td>
            <td>{{$v['age']}}</td>
            <td>{{$v['created_at']}}</td>
            <td>{{$v['updated_at']}}</td>
            <td><a href="user.del?id={{$v['id']}}">删除</a> || <a href="user.update?id={{$v['id']}}">修改</a></td>
        </tr>

    @endforeach

</table>
