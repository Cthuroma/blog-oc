<!-- Page Header -->
<header class="masthead" style="background-image: url('<?= htmlspecialchars(ASSETS.'img/home-bg.jpg', ENT_COMPAT, 'utf-8'); ?>')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1>Owen Jolivet</h1>
                    <span class="subheading">Developer::orderBy('skill', 'DESC')->first();</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- About Section -->
<section class="success">
    <div class="container">
        <?php if($data['notification'] === 'loggedout') { ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                You were logged out.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <?php if($data['notification'] === 'logged') { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                You were successfully logged in.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>About</h2>
                <hr class="star-light">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-lg-offset-2">
                <p>I'm a young passionate dev. I'm currently working for KeyProd and sole developer of the KeyStream device.</p>
            </div>
            <div class="col-lg-4">
                <p>Welcome to this little blog, entirely developed in vanilla PHP, without any Composer library. This application is using an MVC Object architecture.</p>
            </div>
            <div class="col-lg-4">
                <p>This blog will most likely never be hosted anywhere on the net. So you're probably not reading this, but at least it's there.</p>
            </div>
            <div class="col-lg-12 text-center">
                <a href="<?= htmlspecialchars(STORAGE.'app/jolivet_resume.pdf', ENT_COMPAT, 'utf-8'); ?>" class="btn btn-outline-primary" download="jolivet_resume.pdf">
                    <i class="fa fa-download"></i> Download Resume
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2>Contact Me</h2>
                <hr class="star-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <form id="contactForm" method="post" action="/post-contact?csrf=<?= $data['csrf'] ?>">
                    <div class="row control-group">
                        <div class="form-group col-12 floating-label-form-group controls">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Name" id="name" name="name">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-12 floating-label-form-group controls">
                            <label>Email Address</label>
                            <input type="email" class="form-control" placeholder="Email Address" id="email" name="email">
                        </div>
                    </div>
                    <div class="row control-group">
                        <div class="form-group col-12 floating-label-form-group controls">
                            <label>Message</label>
                            <textarea rows="5" class="form-control" placeholder="Message" id="message" name="message"></textarea>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-xs-12">
                            <button type="submit" class="btn btn-success btn-lg">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
