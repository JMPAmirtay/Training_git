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
                            <div class="dashboard_bar">Курс Валют</div>
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
                                <h4 class="card-title">Курс валют Нац Банка</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Код</th>
                                                <th>Наименование</th>
                                                <th>Дата</th>
                                                <th>Числовое значение</th>
                                                <th>Курс</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $url = "http://www.nationalbank.kz/rss/rates_all.xml";
                                            $dataObj = simplexml_load_file($url);
                                            $currencyNames = array(
                                                "AUD" => "Австралийский доллар",
                                                "AZN" => "Азербайджанский манат",
                                                "AMD" => "Армянский драм",
                                                "BYN" => "Белорусский рубль",
                                                "BRL" => "Бразильский реал",
                                                "HUF" => "Венгерский форинт",
                                                "HKD" => "Гонконгский доллар",
                                                "GEL" => "Грузинский лари",
                                                "DKK" => "Датская крона",
                                                "AED" => "Дирхам ОАЭ",
                                                "USD" => "Доллар США",
                                                "EUR" => "Евро",
                                                "INR" => "Индийская рупия",
                                                "IRR" => "Иранский риал",
                                                "CAD" => "Канадский доллар",
                                                "CNY" => "Китайский юань",
                                                "KWD" => "Кувейтский динар",
                                                "KGS" => "Киргизский сом",
                                                "MYR" => "Малайзийский ринггит",
                                                "MXN" => "Мексиканское песо",
                                                "MDL" => "Молдавский лей",
                                                "NOK" => "Норвежская крона",
                                                "PLN" => "Польский злотый",
                                                "SAR" => "Саудовский риял",
                                                "RUB" => "Российский рубль",
                                                "XDR" => "СДР (специальные права заимствования)",
                                                "SGD" => "Сингапурский доллар",
                                                "TJS" => "Таджикский сомони",
                                                "THB" => "Тайский бат",
                                                "TRY" => "Турецкая лира",
                                                "UZS" => "Узбекский сум",
                                                "UAH" => "Украинская гривна",
                                                "GBP" => "Фунт стерлингов",
                                                "CZK" => "Чешская крона",
                                                "SEK" => "Шведская крона",
                                                "CHF" => "Швейцарский франк",
                                                "ZAR" => "Южноафриканский рэнд",
                                                "KRW" => "Южнокорейская вона",
                                                "JPY" => "Японская иена"
                                            );
                                            if ($dataObj) {
                                                foreach ($dataObj->channel->item as $item) {
                                            ?>
                                                    <tr>
                                                        <td><?= $item->title ?></td>
                                                        <td><?= $currencyNames["$item->title"] ?></td>
                                                        <td><?= $item->pubDate ?></td>
                                                        <td><?= $item->quant ?></td>
                                                        <td><?= $item->description ?></td>
                                                        <?php
                                                        if ($item->index == "DOWN") {
                                                            $status = "success";
                                                        } else {
                                                            $status = "danger";
                                                        }
                                                        ?>
                                                        <td><span class="badge badge-<?= $status ?> badge-xl"><?= $item->change ?></span></td>
                                                    </tr>
                                            <?php
                                                }
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