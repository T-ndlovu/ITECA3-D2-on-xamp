<? require_once 'includes/login_view.inc.php';?>
<?= template_header('login') ?>

<div class="login-form">
        <h2>Login</h2>

        <form action="includes/login.inc.php" method="post" class="login">
            <div class="form-field">
                <input type="text" placeholder="Email Address" name="email" required class="form-control" />
            </div>
            <div class="form-field">
                <input type="password" placeholder="Password" name="pwd" required class="form-control" />
            </div>
            <div class="pass-link"><a href="index.php?page=forgot-password">Forgot password?</a></div>
            <button type="submit" class="btn-primary">Submit</button>
            <div class="register-link">
                <?php if (!isset($_SESSION['user_id'])) { ?>
                    <a href="index.php?page=signup">Dont Have Account?</a>
                <?php } ?>

            </div>
        </form>

        <?php ?>
        <?php
        output_username();
        check_login_errors();
        ?>

    </div>
    <?= template_footer() ?>