<?php
// Подключение к базе данных
require_once 'config/connect.php';
require_once 'app.php';
if (!$_SESSION['user']) {
    header('Location: login_admin.php');
}
$app = new inTemplate("Курс Валют", $connect, content($connect));

function content($connect)
{
    ob_start(); ?>
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

<?php return ob_get_clean();
}
