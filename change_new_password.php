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
            <form action="vendor_register/change_password.php" method="post">
                <div class="mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Введите новый пароль">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="password_confirm" placeholder="Повторите новый пароль">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Отправить</button>
                </div>
            </form>
            <?php
            if ($_SESSION['message']) {
            ?>
                <div class="alert alert-warning solid alert-square "><?= $_SESSION['message'] ?></div>
            <?php
            }
            unset($_SESSION['message']);
            ?>
        </div>
    </div>
<?php return ob_get_clean();
}
?>