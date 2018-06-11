<form action="user.save" method="post">
    <input type="hidden" name="id" value="{{$data['id']}}"><br>
    <input type="hidden" name="_token" value="{{csrf_token()}}"><br>
    用户名： <input type="text" name="username" value="{{$data['username']}}"><br>
    密码： <input type="text" name='password' ><br>
    生日： <input type="date" name="birthday" value="{{$data['birth']}}"><br>
    <input type="submit">


</form>