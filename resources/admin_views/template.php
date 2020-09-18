<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?= $data['pageTitle'] ?></title>
    <link href="<?= htmlspecialchars(ASSETS.'css/admin.css', ENT_COMPAT, 'utf-8'); ?>" rel="stylesheet" />
    <link href="<?= htmlspecialchars(FRONT_VENDOR.'bootstrap/css/bootstrap.min.css', ENT_COMPAT, 'utf-8'); ?>" rel="stylesheet">
    <link href="<?= htmlspecialchars(FRONT_VENDOR.'fontawesome-free/css/all.min.css', ENT_COMPAT, 'utf-8'); ?>" rel="stylesheet" type="text/css">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="/admin-home">Blog-OC Admin</a>
    <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/">Go back to the blog</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/logout">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="/admin-home">
                        Home
                    </a>
                    <div class="sb-sidenav-menu-heading">Users</div>
                    <a class="nav-link" href="/admin-roles">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-lock"></i></div>
                        Manage Roles
                    </a>
                    <div class="sb-sidenav-menu-heading">Posts</div>
                    <a class="nav-link" href="/admin-newpost">
                        <div class="sb-nav-link-icon"><i class="fas fa-feather-alt"></i></div>
                        New Post
                    </a>
                    <a class="nav-link" href="/admin-posts">
                        <div class="sb-nav-link-icon"><i class="fas fa-newspaper"></i></div>
                        Posts List
                    </a>
                    <div class="sb-sidenav-menu-heading">Comments</div>
                    <a class="nav-link" href="/admin-validate">
                        <div class="sb-nav-link-icon"><i class="fas fa-comment-medical"></i></div>
                        To validate
                    </a>
                    <a class="nav-link" href="/admin-comlist">
                        <div class="sb-nav-link-icon"><i class="fas fa-comments"></i></div>
                        Comments list
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>
                <?= $data['loggedUser']->getName() ?>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <?= $pageContent ?>
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Owen Jolivet 2020</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
<!-- Bootstrap core JavaScript -->
<script src="<?= htmlspecialchars(FRONT_VENDOR.'/jquery/jquery.min.js', ENT_COMPAT, 'utf-8'); ?>"></script>
<script src="<?= htmlspecialchars(FRONT_VENDOR.'bootstrap/js/bootstrap.bundle.min.js', ENT_COMPAT, 'utf-8'); ?>"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?= htmlspecialchars(ASSETS.'js/admin.js', ENT_COMPAT, 'utf-8'); ?>"></script>
</body>
</html>
