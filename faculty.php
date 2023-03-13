<?php
// Подключение к базе данных
require_once 'config/connect.php';
require_once 'app.php';
if (!$_SESSION['user']) {
    header('Location: login_admin.php');
}
$facultyinfo_id = $_GET['id'];
$app = new inTemplate("Факультеты", $connect, content($connect, $facultyinfo_id));

function content($connect, $facultyinfo_id)
{
    ob_start(); ?>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">О факультете</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>Имя страницы</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $faculty_pages = mysqli_query($connect, "SELECT * FROM `faculty_main` WHERE `fk_faculty` = '$facultyinfo_id'");
                            $faculty_pages = mysqli_fetch_all($faculty_pages);
                            foreach ($faculty_pages as $faculty_page) {
                            ?>
                                <tr>
                                    <td><?= $faculty_page[1] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
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
                                                <a class="dropdown-item" href="update_faculty.php?id=<?= $faculty_page[0] ?>&facultyinfo_id=<?= $facultyinfo_id ?>&bd=faculty_main">Редактировать</a>
                                                <a class="dropdown-item" href="vendorfaculty/delete.php?id=<?= $faculty_page[0] ?>&facultyinfo_id=<?= $facultyinfo_id ?>&bd=faculty_main">Удалить</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <form action="vendorfaculty/add.php" method="post">

                                    <td>
                                        <div class="mb-2 mx-sm-3">
                                            <input type="hidden" name="bd" value="faculty_main">
                                            <input type="hidden" name="id" value="<?= $facultyinfo_id ?>">
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Введите новые данные">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-rounded btn-success">Добавить</button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Кафедры</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>Имя страницы</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $faculty_pages = mysqli_query($connect, "SELECT * FROM `department` WHERE `fk_faculty` = '$facultyinfo_id'");
                            $faculty_pages = mysqli_fetch_all($faculty_pages);
                            foreach ($faculty_pages as $faculty_page) {
                            ?>
                                <tr>
                                    <td><?= $faculty_page[1] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
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
                                                <a class="dropdown-item" href="update_faculty.php?id=<?= $faculty_page[0] ?>&facultyinfo_id=<?= $facultyinfo_id ?>&bd=department">Редактировать</a>
                                                <a class="dropdown-item" href="vendorfaculty/delete.php?id=<?= $faculty_page[0] ?>&facultyinfo_id=<?= $facultyinfo_id ?>&bd=department">Удалить</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <form action="vendorfaculty/add.php" method="post">

                                    <td>
                                        <div class="mb-2 mx-sm-3">
                                            <input type="hidden" name="bd" value="department">
                                            <input type="hidden" name="id" value="<?= $facultyinfo_id ?>">
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Введите новые данные">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-rounded btn-success">Добавить</button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Специальности</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-responsive-md">
                        <thead>
                            <tr>
                                <th><strong>Имя страницы</strong></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $faculty_pages = mysqli_query($connect, "SELECT * FROM `specialties` WHERE `fk_faculty` = '$facultyinfo_id'");
                            $faculty_pages = mysqli_fetch_all($faculty_pages);
                            foreach ($faculty_pages as $faculty_page) {
                            ?>
                                <tr>
                                    <td><?= $faculty_page[1] ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button type="button" class="btn btn-success light sharp" data-bs-toggle="dropdown">
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
                                                <a class="dropdown-item" href="update_faculty.php?id=<?= $faculty_page[0] ?>&facultyinfo_id=<?= $facultyinfo_id ?>&bd=specialties">Редактировать</a>
                                                <a class="dropdown-item" href="vendorfaculty/delete.php?id=<?= $faculty_page[0] ?>&facultyinfo_id=<?= $facultyinfo_id ?>&bd=specialties">Удалить</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <form action="vendorfaculty/add.php" method="post">

                                    <td>
                                        <div class="mb-2 mx-sm-3">
                                            <input type="hidden" name="bd" value="specialties">
                                            <input type="hidden" name="id" value="<?= $facultyinfo_id ?>">
                                            <input name="name" id="name" type="text" class="form-control" placeholder="Введите новые данные">
                                        </div>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-rounded btn-success">Добавить</button>
                                    </td>
                                </form>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php return ob_get_clean();
}
