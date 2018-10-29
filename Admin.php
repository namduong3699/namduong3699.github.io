<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login</title>
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
    $login = false;
    if (isset($_GET['login'])){
        $user = $_GET['user'];
        $pass = $_GET['pass'];
        include("function.php");
        //$conn = connection("codecat");
        $sqlUser = "SELECT * FROM `user` WHERE username='$user';";
        $result = mysqli_query($conn, $sqlUser) or die("Lỗi truy vấn ".$sqlUser);
        $row = mysqli_fetch_assoc($result);
        if (isset($result)) {
            if ($pass == $row['password'] && $_GET['user'] != "") {
                echo "xin chào";
                $login = true;
            }
        } else echo "vào đây làm gì bạn eii";
    
    } 
    if ($login) header("location:admin/index.php");
    else include("Modules/adminLogin.php"); 

    ?>
</body>
</html>
