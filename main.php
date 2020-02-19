<!DOCTYPE html>
<html lang="ko">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Choigyuwon site</title>
    <style>
        h1 {font-style : normal; font-size : 40px; color : snow;}
        html {text-align: center; background-image: url("login.PNG"); background-repeat : no-repeat;
            min-height: 100%;  background-position: center;
            background-size: cover;}
        p {font-style : revert; color : white;}
        #login-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background: #000000;
        }
        #login-form h1 {
            margin: 0 0 10px 0;
        }
        #login-form input{
            box-sizing: border-box;
            width: 100%;
            margin: 10px;
            padding : 10px;
        }
        #login-form input[type=button]{
            border:1px solid brown;
            border-radius: 6px;
            background: #fffafa;
        }
    </style>
</head>
<body>

<h1><span>choigyuwon site home</span></h1>
<form method = "post" id="login-form" onsubmit="return login()">
    <h2><span style = color:white>Main</span></h2>
    <input type="button" onclick="location.href='login.html' " value="Login">
	<input type="button" onclick="location.href='join.html' " value="Sign Up">
</form>
<p><span style=color:white>email gw2988@naver.com or Gangneung-Wonju National University Computer</span></p>

</body>
</html>

