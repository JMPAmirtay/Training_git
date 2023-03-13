<?php
// Подключение к базе данных
require_once 'config/connect.php';
require_once 'app.php';
if (!$_SESSION['user']) {
    header('Location: login_admin.php');
}
$app = new inTemplate("Новости", $connect, content($connect));
function content($connect)
{
    $news_id = $_GET['id'];

    $news = mysqli_query($connect, "SELECT * FROM `news` WHERE `id` = '$news_id'");

    $news = mysqli_fetch_assoc($news);
    ob_start(); ?>
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <form action="vendor_news/update_news.php" method="post">
                        <input type="hidden" name="id" value="<?= $news['id'] ?>">
                        <div class="mb-3 row">
                            <label for="title">Заголовок:</label>
                            <textarea class="form-control" rows="4" id="title" name="title"><?= $news['Title'] ?></textarea>
                        </div>
                        <div class="mb-3 row">
                            <label for="description">Описание:</label>
                            <textarea class="form-control" rows="4" id="description" name="description"><?= $news['Description'] ?></textarea>
                        </div>
                        <div class="mb-3 row">
                            <label for="text">Текст:</label>
                            <textarea class="form-control" rows="4" id="text" name="text"><?= $news['Text'] ?></textarea>
                        </div>
                        <div class="mb-3 row">
                            <label for="pubdate">Дата публикации:</label>
                            <input type="date" class="datepicker-default form-control" id="pubdate" name="pubdate" value="<?= $news['Publication Date'] ?>">
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
                            <textarea class="form-control" rows="4" id="tags" name="tags"><?= $news['Tags'] ?></textarea>
                        </div>
                        <div class="mb-3 row">
                            <label for="status">Статус:</label>
                            <select class="nice-select form-control wide" id="status" name="status">
                                <option value="draft" <?php if ($news['Status'] == "draft") echo "selected"; ?>>Черновик</option>
                                <option value="published" <?php if ($news['Status'] == "published") echo "selected"; ?>>Опубликован</option>
                                <option value="archived" <?php if ($news['Status'] == "archived") echo "selected"; ?>>Архивирован</option>
                            </select>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Редактировать</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php return ob_get_clean();
}
