<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $data['pageTitle'] ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?= htmlspecialchars(FRONT_VENDOR.'bootstrap/css/bootstrap.min.css', ENT_COMPAT, 'utf-8'); ?>" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="<?= htmlspecialchars(FRONT_VENDOR.'fontawesome-free/css/all.min.css', ENT_COMPAT, 'utf-8'); ?>" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="<?= htmlspecialchars(ASSETS.'css/clean-blog.min.css', ENT_COMPAT, 'utf-8'); ?>" rel="stylesheet">

</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/">Blog-OC</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/posts">Posts</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/#contact">Contact</a>
                </li>
                <?php if(!$data['loggedUser']){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/login">Login</a>
                </li>
                <?php }else{?>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout?csrf=<?= $data['csrf'] ?>">Logout</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

<?= $pageContent ?>

<hr>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://twitter.com/cthuroma">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.linkedin.com/in/owen-jolivet-aa44a3184">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/Cthuroma">
                <span class="fa-stack fa-lg">
                  <i class="fas fa-circle fa-stack-2x"></i>
                  <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                </span>
                        </a>
                    </li>
                </ul>
                <p class="copyright text-muted">Copyright &copy; Blog-OC 2020</p>
                <?php if($data['loggedUser'] && ($data['loggedUser']->isAdmin() || $data['loggedUser']->isOwner())){ ?>
                    <p class="copyright"><a href="/admin-home">Admin Access</a></p>
                <?php }?>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?= htmlspecialchars(FRONT_VENDOR.'/jquery/jquery.min.js', ENT_COMPAT, 'utf-8'); ?>"></script>
<script src="<?= htmlspecialchars(FRONT_VENDOR.'bootstrap/js/bootstrap.bundle.min.js', ENT_COMPAT, 'utf-8'); ?>"></script>

<!-- Custom scripts for this template -->
<script src="<?= htmlspecialchars(ASSETS.'js/clean-blog.min.js', ENT_COMPAT, 'utf-8'); ?>"></script>


</body>

</html>
