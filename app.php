<?php
session_start();

class outTemplate
{
    function __construct($content)
    { ?>
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
                                    <? echo $content ?>
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
    <?php
    }
}


class inTemplate
{
    function head()
    { ?>

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
    <?php
    }
    function navheader()
    { ?>
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
    <?php
    }
    function header($header_name)
    { ?>
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="dashboard_bar"><?= $header_name ?></div>
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
    <?php
    }
    function sidebar($connect)
    { ?>
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <img src="images/profile/pic1.jpg" width="20" alt="" />
                            <div class="header-info ms-3">
                                <span class="font-w600 ">Hi,<b><?= $_SESSION['user']['username'] ?></b></span>
                                <small class="text-end font-w400"><?= $_SESSION['user']['email'] ?></small>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a href="vendor_register/logout.php" class="dropdown-item ai-icon">
                                <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span class="ms-2">Выйти</span>
                            </a>
                        </div>
                    </li>
                    <li>
                        <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-025-dashboard"></i>
                            <span class="nav-text">Редактировать</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="index.php">Новости</a></li>
                            <li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Факультеты</a>
                                <ul aria-expanded="false">
                                    <?php
                                    $facultys = mysqli_query($connect, "SELECT * FROM `faculty`");
                                    $facultys = mysqli_fetch_all($facultys);
                                    foreach ($facultys as $faculty) {
                                        $name = $faculty[1];
                                        $id = $faculty[0];
                                        echo "<li><a href= 'faculty.php?id=$id' >$name</a></li>";
                                    }
                                    ?>
                                </ul>
                            </li>
                            <li><a href="nbrk.php">Курс Валют</a></li>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
    <?php
    }
    function script()
    { ?>
        <!--**********************************
            Scripts
        ***********************************-->

        <!-- Скрипт для ckeditor -->
        <script src="build/ckeditor.js"></script>
        <!-- Скрипт для растягивания textarea -->
        <script>
            var tx = document.getElementsByTagName('textarea');
            for (var i = 0; i < tx.length; i++) {
                tx[i].setAttribute('style', 'height:' + (tx[i].scrollHeight) + 'px;overflow-y:hidden;');
                tx[i].addEventListener("input", OnInput, false);
            }

            function OnInput() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            }
        </script>

        <!-- Пагинация -->
        <script>
            $("document").ready(function() {
                $("#getNews").on("submit", function() {
                    let dataForm = $(this).serialize()
                    $.ajax({
                        url: '/query.php',
                        method: 'post',
                        dataType: 'html',
                        data: dataForm,
                        success: function(data) {
                            $(document).ready(function() {
                                $("table").append(data);

                                let id = document.getElementById('LastNewsId').value;
                                document.getElementById('LastNewsId').value = String(Number(id) + 2);

                                console.log(document.getElementById('LastNewsId').value);
                            })
                        }
                    });
                })
            })
        </script>
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
    <?php
    }

    function card_body($content)
    { ?>
        <div class="content-body">
            <div class="container-fluid">
                <div class="row">
                    <? echo $content ?>
                </div>
            </div>
        </div>
    <?php
    }

    function main_wrapper($header_name, $connect, $content)
    { ?>

        <body>
            <!--**********************************
                Main wrapper start
            ***********************************-->
            <div id="main-wrapper">
                <?php
                $this->navheader();
                $this->header($header_name);
                $this->sidebar($connect);
                $this->card_body($content);
                ?>
            </div>
            <!--**********************************
                Main wrapper end
            ***********************************-->
        <?php
    }

    function __construct($header_name, $connect, $content)
    { ?>
            <!DOCTYPE html>
            <html lang="en">
            <?php
            $this->head();
            $this->main_wrapper($header_name, $connect, $content);
            $this->script();
            ?>

            </html>
    <?php
    }
}
