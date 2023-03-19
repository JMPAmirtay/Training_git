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
            <h4 class="text-center mb-4">Забыли пароль</h4>
            <form action="vendor_register/forgot_password.php" method="POST">
                <div class="mb-3">
                    <label><strong>Почта</strong></label>
                    <input type="email" name="email" class="form-control" placeholder="hello@example.com">
                </div>
                <?php
                if ($_SESSION['message']) {
                ?>
                    <div class="alert alert-warning solid alert-square "><strong>Error! </strong><?= $_SESSION['message'] ?></div>
                <?php
                }
                unset($_SESSION['message']);
                ?>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-block">Восстановить</button>
                </div>
            </form>
        </div>
    </div>
<?php return ob_get_clean();
}
?>