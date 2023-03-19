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
            <h4 class="text-center mb-4">Войдите в свою учетную запись</h4>
            <form action="vendor_register/signin.php" method="post">
                <div class="mb-3">
                    <label class="mb-1"><strong>Логин</strong></label>
                    <input type="text" class="form-control" name="login" placeholder="Введите свой логин">
                </div>
                <div class="mb-3">
                    <label class="mb-1"><strong>Пароль</strong></label>
                    <input type="password" class="form-control" name="password" placeholder="Пароль">
                </div>
                <div class="row d-flex justify-content-between mt-4 mb-2">
                    <div class="mb-3">
                        <div class="form-check custom-checkbox ms-1">
                            <input type="checkbox" class="form-check-input" id="basic_checkbox_1">
                            <label class="form-check-label" for="basic_checkbox_1">Сохранить вход</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <a href="page_forgot_password.php">Забыли пароль?</a>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Войти</button>
                </div>
            </form>
            <div class="new-account mt-3">
                <p>У вас нет аккаунта? <a class="text-primary" href="./page_register.php">Регистрация</a></p>
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