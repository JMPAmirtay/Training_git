<?php
session_start();
if (!$_SESSION['status']) {
    header('Location: /');
}
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- PAGE TITLE HERE -->
    <title>Login Admin Template</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />
    <link href="./css/style.css" rel="stylesheet">

</head>

<body class="vh-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <form action="vendor_register/change_password.php" method="post">
                                        <div class="mb-3">
                                            <input type="password" class="form-control" name="password" placeholder="Введите новый пароль">
                                        </div>
                                        <div class="mb-3">
                                            <input type="password" class="form-control" name="password_confirm" placeholder="Повторите новый пароль">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Отправить</button>
                                        </div>
                                    </form>
                                    <?php
                                    if ($_SESSION['message']) {
                                    ?>
                                        <div class="alert alert-warning solid alert-square "><?= $_SESSION['message'] ?></div>
                                    <?php
                                    }
                                    unset($_SESSION['message']);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/custom.min.js"></script>
    <script src="./js/dlabnav-init.js"></script>

</body>

</html>