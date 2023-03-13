<?php
// Подключение к базе данных
require_once 'config/connect.php';
require_once 'app.php';
if (!$_SESSION['user']) {
    header('Location: login_admin.php');
}
$app = new inTemplate("Факультеты", $connect, content($connect));

function content($connect)
{
    $faculty_page = $_GET['id'];
    $facultyinfo_id = $_GET['facultyinfo_id'];
    $bd = $_GET['bd'];
?>
    <div class="col-xl-6 col-lg-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title"></h4>
            </div>
            <div class="card-body">
                <div class="basic-form">
                    <form action="vendorfaculty/update.php" method="post">
                        <?php
                        $faculty = mysqli_query($connect, "SELECT * FROM `$bd` WHERE `id` = '$faculty_page'");
                        $faculty = mysqli_fetch_assoc($faculty);

                        ?>
                        <input type="hidden" name="bd" value="<?= $bd ?>">
                        <input type="hidden" name="facultyinfo_id" value="<?= $facultyinfo_id ?>">
                        <input type="hidden" name="faculty_page" value="<?= $faculty_page ?>">
                        <div class="mb-3 row">
                            <label for="name">Заголовок:</label>
                            <textarea class="form-control" rows="4" id="name" name="name"><?= $faculty['name'] ?></textarea>
                        </div>
                        <div class="mb-3 row">
                            <label for="text">Текст:</label>
                            <textarea class="form-control" rows="4" id="text" name="text"></textarea>
                        </div>
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
<?php return ob_get_clean();
}
?>