<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="login" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    用户名： <input type="text" name="username"><br>
    密码： <input type="text" name="password"><br>
     <input type="submit" value="登录"><br>

</form>
</body>
</html>