<header class="masthead" style="background-image: url('<?= htmlspecialchars(ASSETS.'img/home-bg.jpg', ENT_COMPAT, 'utf-8'); ?>'); height: 250px;">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading" style="padding: 100px 0 0 0">
                    <h1>Register</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<link rel="stylesheet" href="<?= htmlspecialchars(ASSETS . 'fonts/material-icon/css/material-design-iconic-font.min.css', ENT_COMPAT, 'utf-8') ?>">
<!-- Main css -->
<link rel="stylesheet" href="<?= htmlspecialchars( ASSETS . 'css/auth.css', ENT_COMPAT, 'utf-8') ?>">
<section class="signup">
    <div class="container">
        <?php
        if($data['notification'] === 'mail'){ ?>
        <div class="alert alert-danger" role="alert">
            This email is already registered.
        </div>
        <?php }
        if($data['notification'] === 'pass') { ?>
        <div class="alert alert-danger" role="alert">
            The two passwords do not match.
        </div>
        <?php } ?>
        <div class="signup-content">
            <div class="signup-form">
                <form method="POST" action="post-register" class="register-form" id="register-form">
                    <div class="form-group">
                        <label for="name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                        <input type="text" name="name" id="name" placeholder="Your Name"/>
                    </div>
                    <div class="form-group">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email"/>
                    </div>
                    <div class="form-group">
                        <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                        <input type="password" name="pass" id="pass" placeholder="Password"/>
                    </div>
                    <div class="form-group">
                        <label for="re-pass"><i class="zmdi zmdi-lock-outline"></i></label>
                        <input type="password" name="re_pass" id="re_pass" placeholder="Repeat your password"/>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                    </div>
                </form>
            </div>
            <div class="signup-image">
                <figure><img src="<?= htmlspecialchars(ASSETS .'img/register.jpg', ENT_COMPAT, 'utf-8') ?>" alt="sing up image"></figure>
                <a href="login" class="signup-image-link">I am already member</a>
            </div>
        </div>
    </div>
</section>
<script src="<?= htmlspecialchars(FRONT_VENDOR.'/jquery/jquery.min.js', ENT_COMPAT, 'utf-8'); ?>"></script>
<script src="<?= htmlspecialchars(ASSETS.'js/auth.js', ENT_COMPAT, 'utf-8'); ?>"></script>
</body>
</html>
