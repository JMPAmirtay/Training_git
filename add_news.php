<?php
// Подключение к базе данных
require_once 'config/connect.php';
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
        <?php
        require_once("news_header.php")
        ?>
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
                    <div class="col-xl-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="basic-form">
                                    <form action="vendor_news/add_news.php" method="post">
                                        <input type="hidden" name="id" value="<?= $news['id'] ?>">
                                        <div class="mb-3 row">
                                            <label for="title">Заголовок:</label>
                                            <textarea class="form-control" rows="4" id="title" name="title"></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description">Описание:</label>
                                            <textarea class="form-control" rows="4" id="description" name="description"></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="text">Текст:</label>
                                            <textarea class="form-control" rows="4" id="text" name="text"></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="pubdate">Дата публикации:</label>
                                            <input type="date" class="datepicker-default form-control" id="pubdate" name="pubdate">
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="author">Автор:</label>
                                            <select class="default-select  form-control wide">
                                                <?php
                                                $redactors = mysqli_query($connect, "SELECT * FROM `redactors`");
                                                $redactors = mysqli_fetch_all($redactors);
                                                foreach ($redactors as $redactor) {
                                                ?>
                                                    <option><?= $redactor[1] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="image">Изображение:</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">Upload</span>
                                                <div class="form-file">
                                                    <input type="file" class="form-file-input form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="tags">Теги:</label>
                                            <textarea class="form-control" rows="4" id="tags" name="tags"></textarea>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="status">Статус:</label>
                                            <select class="nice-select form-control wide" id="status" name="status">
                                                <option value="draft">Черновик</option>
                                                <option value="published">Опубликован</option>
                                                <option value="archived">Архивирован</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-primary">Добавить</button>
                                            </div>
                                        </div>
                                    </form>
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