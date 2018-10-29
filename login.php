<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/flag-icon.min.css">
    <link rel="stylesheet" href="css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="scss/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">
    <?php 
    session_start();
    $_SESSION['username'] = "";
    include("function.php");
    $login = false;
    if (isset($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        //$sqlUser = "SELECT * FROM `user` WHERE username='".$user."'";
        $sqlUser = "SELECT `password` FROM `user` WHERE username='".$user."'";
        $result = mysqli_query($conn, $sqlUser) or die("Lỗi truy vấn ".$sqlUser);
        $row = mysqli_fetch_assoc($result);
        if (isset($row)) {
            if ($pass == $row['password']) {
                echo "xin chào";
                $login = true;
            } 
        } 

    } 
    if ($login) {
        $_SESSION['username'] = $user;
        $sqlSelect = "SELECT cart FROM `user` WHERE username = '".$user."'";
        $result = mysqli_query($conn, $sqlSelect);
        $result = mysqli_fetch_assoc($result);
        $json = $result['cart'];
        $_SESSION['cart'] = json_decode($json, true);
        header("location:index.php");
    }

    ?>

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="images/icons/logo.png" alt="" width="30%" height="auto">
                    </a>
                </div>
                <div class="login-form">
                    <form method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Tài khoản" name="user">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="pass">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Nhớ mật khẩu
                            </label>
                            <label class="pull-right">
                                <a href="https://www.facebook.com/Duong.Nam.3699">Quên mật khẩu?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login">Đăng nhập</button>
                        <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><!-- <i class="ti-facebook"></i> -->Sign in with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><!-- <i class="ti-twitter"></i> -->Sign in with twitter</button>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center">
                            <p>Không có tài khoản? <a href="registration.php"> Đăng ký</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>
