<form action="user.addsave" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}"><br>
    <p>用户名： <input type="text" name="username" ></p>
    <p> 密码： <input type="text" name="password" ></p>
    <p>生日： <input type="text" name="birthday" ></p>
    <p>年龄： <input type="text" name="age" ></p>
    <input type="submit" value="添加">
</form>