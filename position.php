<?php
// Подключение к базе данных
require_once 'config/connect.php';
$position_id = $_GET['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- PAGE TITLE HERE -->
    <title>Admin Template</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png" />

    <link href="./vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet" />
    <link rel="stylesheet" href="./vendor/nouislider/nouislider.min.css" />
    <!-- Style css -->
    <link href="./css/style.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar">Сотрудники</div>
                        </div>
                        <ul class="navbar-nav header-right">
                            <li class="nav-item">
                                <div class="input-group search-area">
                                    <input type="text" class="form-control" placeholder="Найти..." />
                                    <span class="input-group-text">
                                        <a href="javascript:void(0)">
                                            <i class="flaticon-381-search-2"></i>
                                        </a>
                                    </span>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a href="add_news.php" class="btn btn-primary d-sm-inline-block d-none">Добавить</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <?php
        require_once("sidebar.php")
        ?>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Сотрудники</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Ф.И.О</th>
                                                <th>Должность</th>
                                                <th>Факультет</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $name = mysqli_query($connect, "SELECT executive.faculty,executive.name,position.name FROM executive INNER JOIN position ON executive.specialist = position.id");
                                            $name= mysqli_fetch_all($name);
                                            $position = mysqli_query($connect, "SELECT faculty.name, executive.id FROM executive INNER JOIN faculty ON executive.faculty = faculty.id");
                                            $position= mysqli_fetch_all($position);
                                            foreach ($name as $name){
                                            ?>
                                            <tr>
                                                <td><?=$name[1] ?></td>
                                                <td><?=$name[2] ?></td> 
                                                <?php
                                                $position = mysqli_query($connect, "SELECT `name` FROM `faculty` WHERE `id` = '$name[0]'");
                                                $position = mysqli_fetch_assoc($position);
                                                ?>
                                                <td><?= $position['name'] ?></td>
                                             </tr>                                           
                                            <?php                                          
                                             }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>

    <!-- Apex Chart -->
    <script src="./vendor/apexchart/apexchart.js"></script>
    <script src="./vendor/nouislider/nouislider.min.js"></script>
    <script src="./vendor/wnumb/wNumb.js"></script>

    <!-- Dashboard 1 -->
    <script src="./js/custom.min.js"></script>
    <script src="./js/dlabnav-init.js"></script>
</body>

</html>