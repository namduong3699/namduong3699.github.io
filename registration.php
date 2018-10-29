<?php ob_start();session_start(); ?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Đăng ký tài khoản</title>
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
   <!--  <script>
        function checkEmptyInput(id) {
            var item = document.getElementById(id);
            if (item.value == "") {

            }
        }
    </script> -->
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
                            <label>Tên đăng nhập</label>
                            <input type="text" class="form-control" placeholder="Tài khoản" name="user" onblur="checkInput(this.id)">
                        </div>
                        <div class="form-group">
                            <label>Mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Mật khẩu" name="pass" onblur="checkInput(this.id)">
                        </div>
                        <div class="form-group">
                            <label>Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" placeholder="Nhập lại mật khẩu" name="rePass" onblur="checkInput(this.id)">
                        </div>
                        <div class="form-group">
                            <label>Họ và tên</label>
                            <input type="text" class="form-control" placeholder="Họ và tên" name="fullName" onblur="checkInput(this.id)">
                        </div>
                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="SĐT" name="phoneNumber" onblur="checkInput(this.id)">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" onblur="checkInput(this.id)">
                        </div>
                        <div class="form-group">
                            <label>Ngày sinh</label>
                            <input type="date" class="form-control" placeholder="Ngày sinh" name="dateOfBirth" onblur="checkInput(this.id)">
                        </div>
                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" class="form-control" placeholder="Địa chỉ" name="address" onblur="checkInput(this.id)">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="status"> Nhớ mật khẩu
                            </label>
                            <label class="pull-right">
                                <a href="https://www.facebook.com/Duong.Nam.3699">Quên mật khẩu?</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login">Đăng ký</button>
                        <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><!-- <i class="ti-facebook"></i> -->Sign in with facebook</button>
                            </div>
                        </div>
                        <div class="register-link m-t-15 text-center" style="margin-top: 25px;">
                            <p><a href="https://www.facebook.com/Duong.Nam.3699"> Liên hệ Nam</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 

    include("connection.php");

    //$login = $_POST['login'];

    if (isset($_POST['login'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $rePass = $_POST['rePass'];
        $fullName = $_POST['fullName'];
        $phoneNumber = $_POST['phoneNumber'];
        $email = $_POST['email'];
        $dateOfBirth = $_POST['dateOfBirth'];
        $address = $_POST['address'];
        $status = $_POST['status'];
        if (!$user || !$pass || !$rePass || !$pass || !$phoneNumber || !$email || !$dateOfBirth || !$address) {
            echo "<script> alert('Bạn chưa nhập đầy đủ thông tin');  </script>";
        }
        $sqlSelect = "SELECT username FROM `user` WHERE username = '".$user."'";
        $result = mysqli_query($conn, $sqlSelect);
        if (mysqli_num_rows($result) > 0) {
            echo "<script> alert('Tên đăng nhập này đã có người sử dụng');  </script>";
        } else if ($pass != $rePass) {
            echo "<script> alert('Mật khẩu không trùng khớp');  </script>";
        } else {
            $sqlInsert = "INSERT INTO `user` (username, password, fullName, phone, email, birthday, address, status) VALUE ('$user', '$pass', '$fullName', '$phoneNumber', '$email', 'dateOfBirth', '$address', '$status')";
            $result = mysqli_query($conn, $sqlInsert);
            $_SESSION['username'] = $user;
            header("location:index.php");
        }
    }
?>



<script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/plugins.js"></script>
<script src="assets/js/main.js"></script>