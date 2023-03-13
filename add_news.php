<?php
// Подключение к базе данных
require_once 'config/connect.php';
require_once 'app.php';
if (!$_SESSION['user']) {
    header('Location: login_admin.php');
}
$app = new App;

$app->html("Новости", $connect, content($connect));

function content($connect)
{
    ob_start(); ?>
    <div class="col-xl-12 col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="basic-form">
                    <form action="vendor_news/add_news.php" method="post" enctype="multipart/form-data">
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
                            <!-- <div class="card-body custom-ekeditor">
                                                <div id="ckeditor"></div> -->
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
                                    <input type="file" name="news_image" class="form-file-input form-control" accept="image/png, image/gif, image/jpeg">
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
                        <?php
                        if ($_SESSION['message']) {
                        ?>
                            <div class="alert alert-warning solid alert-square "><strong>Error! </strong><?= $_SESSION['message'] ?></div>
                        <?php
                        }
                        unset($_SESSION['message']);
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php return ob_get_clean();
}
