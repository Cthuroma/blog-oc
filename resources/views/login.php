<header class="masthead" style="background-image: url('<?= htmlspecialchars(ASSETS.'img/home-bg.jpg', ENT_COMPAT, 'utf-8'); ?>'); height: 250px;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading" style="padding: 100px 0 0 0">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<link rel="stylesheet" href="<?= htmlspecialchars(ASSETS . 'fonts/material-icon/css/material-design-iconic-font.min.css', ENT_COMPAT, 'utf-8') ?>">
<link rel="stylesheet" href="<?= htmlspecialchars( ASSETS . 'css/auth.css', ENT_COMPAT, 'utf-8') ?>">
<div class="sign-in">
    <div class="container">
        <?php
        if($data['notification'] === 'validatedmail'){ ?>
            <div class="alert alert-success" role="alert">
                Your email has been successfully validated.
            </div>
        <?php }
        if($data['notification'] === 'registered') { ?>
            <div class="alert alert-success" role="alert">
                A validation mail has been sent, please check your inbox.
            </div>
        <?php }
        if($data['notification'] === 'error') { ?>
            <div class="alert alert-danger" role="alert">
                Invalid credentials.
            </div>
        <?php } ?>
        <div class="signin-content">
            <div class="signin-image">
                <figure><img src="<?= htmlspecialchars(ASSETS .'img/login.jpg', ENT_COMPAT, 'utf-8') ?>" alt="sing up image"></figure>
                <a href="register" class="signup-image-link">Create an account</a>
            </div>
            <div class="signin-form">
                <form method="POST" action="post-login?csrf=<?= $data['csrf'] ?>" class="register-form" id="login-form">
                    <div class="form-group">
                        <label for="mail"><i class="zmdi zmdi-email"></i></label>
                        <input type="text" name="mail" id="mail" placeholder="Your Email"/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Password"/>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="<?= htmlspecialchars(FRONT_VENDOR.'/jquery/jquery.min.js', ENT_COMPAT, 'utf-8'); ?>"></script>
<script src="<?= htmlspecialchars(ASSETS.'js/auth.js', ENT_COMPAT, 'utf-8'); ?>"></script>
</body>
</html>
