<?php
require_once 'app.php';
if ($_SESSION['user']) {
    header('Location: /');
}
$app = new outTemplate(content());

function content()
{
    ob_start(); ?>
    <div class="col-xl-12">
        <div class="auth-form">
            <h4 class="text-center mb-4">Зарегистрируйте свою учетную запись</h4>
            <form action="vendor_register/signup.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="mb-1"><strong>Логин</strong></label>
                    <input type="text" class="form-control" name="login" placeholder="Логин">
                </div>
                <div class="mb-3">
                    <label class="mb-1"><strong>Email</strong></label>
                    <input type="email" class="form-control" name="email" placeholder="hello@example.com">
                </div>
                <div class="mb-3">
                    <label class="mb-1"><strong>Аватар</strong></label>
                    <input type="file" class="form-control" name="avatar" accept="image/png, image/gif, image/jpeg">
                </div>
                <div class="mb-3">
                    <label class="mb-1"><strong>Пароль</strong></label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="mb-3">
                    <label class="mb-1"><strong>Повторите пароль</strong></label>
                    <input type="password" class="form-control" name="password_confirm" placeholder="Password">
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary btn-block">Зарегестрироваться</button>
                </div>
            </form>
            <div class="new-account mt-3">
                <p>У вас уже есть учетная запись? <a class="text-primary" href="login_admin.php">Авторизация</a></p>
            </div>
            <?php
            if ($_SESSION['message']) {
            ?>
                <div class="alert alert-warning solid alert-square "><strong>Error! </strong><?= $_SESSION['message'] ?></div>
            <?php
            }
            unset($_SESSION['message']);
            ?>
        </div>
    </div>
<?php return ob_get_clean();
}
?>