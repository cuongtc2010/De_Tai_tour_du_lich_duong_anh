<!DOCTYPE html>
<!--[if IE 9 ]><html class="ie9"><![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HỆ THỐNG QUẢN LÝ WEBSITE TOUR DUONG ANH</title>

    <!-- Vendor CSS -->
    <link href="templates/css/login/style.css" rel="stylesheet">
    <link href="templates/css/login/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="templates/js/login/bootstrap.min.js"></script>
    <script src="templates/js/login/jquery.min.js"></script>
</head>
<body style ="background: url(../templates/images/hinhnen1.jpg); background-size: cover; background-repeat: no-repeat; background-attachment:  fixed">
    
    <!------ Include the above in your HEAD tag ---------->

    <!-- This is a very simple parallax effect achieved by simple CSS 3 multiple backgrounds, made by http://twitter.com/msurguy -->
    <div class="container"> 
        <form class="lcb-form" action="index.php?ctl=Account&act=doLogin" method="post">
        <div class="row vertical-offset-100">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Đăng nhập hệ thống</h3>
                    </div>
                    <div class="panel-body">
                        <form accept-charset="UTF-8" role="form">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nhập tài khoản" name="username" type="text">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Nhập mật khẩu" name="password" type="password" value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Ghi nhớ đăng nhập"> Remember You
                                    </label>
                                </div>
                                <input class="btn btn-lg btn-success btn-block" type="submit" value="Đăng nhập" style="background-color: #4fa8b1;border-color: #5cabb3;">
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</body>
</html>
