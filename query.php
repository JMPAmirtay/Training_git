<?php
// Подключение к базе данных
require_once 'config/connect.php';

$LastNewsID = $_POST['id'];
$news = mysqli_query($connect, "SELECT * FROM `news`");
// $news = mysqli_query($connect, "SELECT * FROM `news` WHERE `id` = '$id'");
$news = mysqli_fetch_all($news);
$arr = [
    'января',
    'февраля',
    'марта',
    'апреля',
    'мая',
    'июня',
    'июля',
    'августа',
    'сентября',
    'октября',
    'ноября',
    'декабря'
];

$listIdNews = $LastNewsID;

for (; $listIdNews < count($news) and $listIdNews < $LastNewsID + 2; $listIdNews++) {
    $arqument = $news[$listIdNews];
    $id = $arqument[0];
    $title = $arqument[1];
    $description = $arqument[2];
    $date = strtotime($arqument[4]);
    $date = date("d", $date) . ' ' . $arr[date("n", $date) - 1] . ' ' . date("Y", $date);
    $image = $arqument[6];
    $views = $arqument[9];
    $status = $arqument[11];
    if ($status == "published") {
        $status_color = "success";
        $status_name = "Опубликован";
    } elseif ($status == "draft") {
        $status_color = "warning";
        $status_name = "Черновик";
    } elseif ($status == "archived") {
        $status_color = "danger";
        $status_name = "Архивирован";
    }
?>
    <tr>
        <td><?= $title ?></td>
        <td><?= $date ?></td>
        <td><span class="badge light badge-<?= $status_color ?>"><?= $status_name ?></span></td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn btn-<?= $status_color ?> light sharp" data-bs-toggle="dropdown">
                    <svg width="20px" height="20px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24" />
                            <circle fill="#000000" cx="5" cy="12" r="2" />
                            <circle fill="#000000" cx="12" cy="12" r="2" />
                            <circle fill="#000000" cx="19" cy="12" r="2" />
                        </g>
                    </svg>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="update_news.php?id=<?= $id ?>">Редактировать</a>
                    <a class="dropdown-item" href="vendor_news/delete_news.php?id=<?= $id ?>">Удалить</a>
                </div>
            </div>
        </td>
    </tr>
<?php
}
?>